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
             <button class="btn-primary" @click="editCard(item)">Edit</button>
            <button class="btn-danger" @click="deleteCard(item.id)">Delete</button>
        </b-card>

        <b-modal id="editQuestionModal" title="Edit Question" >
                <b-row>
                    <b-col >
                        <b-form-group label="Question" label-for="question" id="question-form-input">
                            <b-form-input id="question" v-model="flashcard.Question" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col >
                        <b-form-group label="Answer" label-for="answer" id="answer-form-input">
                            <b-form-input id="answer" v-model="flashcard.Answer" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <template v-slot:modal-footer>
                    <b-button variant="primary" size="md" class="float-right" @click="submitCard">Edit
                    </b-button>
                    <b-button
                        variant="danger"
                        size="md"
                        class="float-right"
                        @click="show=false">
                        Close
                    </b-button>
                </template>
            </b-modal>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                check:false,
                items: [
                    
                ],
                flashcard:{
                    Question:'',
                    Answer:''
                },
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
            editCard(item){
                this.flashcard = item;
                this.$bvModal.show("editQuestionModal");
            },
            submitCard(){
                 let self = this
                  axios.put('/flashcard/'+this.flashcard.id, this.flashcard)
                    .then(response=>{
                        this.getInformation();
                        this.$bvModal.hide("editQuestionModal");
                    })  
                    .catch(err=>{
                    })
            },
            deleteCard(id){
                let result = confirm("Are you sure you want to delete the question?");
                if (result){
                     axios.delete('/flashcard/'+id)
                    .then(response=>{
                        this.getInformation();
                    })  
                    .catch(err=>{
                    })
                }
            },
        },

    }
</script>
