<template>
    <div class="row">
        
            <b-card
            :key="item.id"
            v-for="item in items"
            :title="item.name"
            tag="article"
            class="col-sm-4 m-2"
        >
            <b-card-text>
            # of cards: {{item.numberOfCards}}
            </b-card-text>
            <b-card-text>
            {{item.description}}
            </b-card-text>
            
            <b-button  @click="playDeck(item.id)" variant="success">Play</b-button>
            <b-button  @click="playDeck(item.id)" variant="primary">Edit Deck</b-button>
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
        methods: {
            getInformation() {
                let self = this
                  axios.get('/set/')
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
            playDeck(id){

            },
            editDeck(id){
                axios.show("api/set/"+{id})
                .catch(err=>{
                    console.log("Error: could not show deck")
                })
            }
        },

    }
</script>
