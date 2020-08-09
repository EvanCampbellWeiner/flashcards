<template>
    <div class="row">
        
            <b-card
            :key="item.id"
            v-for="item in items"
            :title="item.name"
            tag="article"
            class="col-sm-5 m-2"
        >
            <b-card-text class="p-1">
                    Question: {{item.Question}} 
            </b-card-text>
            <b-card-text class="p-1">
            Answer: {{item.Answer}}
            </b-card-text>
             <button class="btn-primary">Edit</button>
            <button class="btn-danger">Delete</button>
        </b-card>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                check:false,
                items: [
                    
                ],
            }
        },
        mounted() {
            this.getInformation()
        },
        props: ['set'],
        methods: {
            getInformation() {
                let self = this
                  axios.get('/set/'+this.set.id+'/flashcard')
                    .then(response=>{
                        console.log(response.data)
                        self.items = response.data
                        if (self.items != []){
                            self.check = true
                        }
                    })  
                    .catch(err=>{
                        console.log("Error: could not retrieve data.")
                        check = false
                    })
            },
        },

    }
</script>
