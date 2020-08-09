<template>
    <div class="pull-right">
            <b-button  v-b-modal.createPostCardModal variant="primary">Create New Flashcard</b-button>
            
            <b-modal id="createPostCardModal" title="Create New Flashcard Deck">
                <b-row>
                    <b-col >
                        <b-form-group label="Question" label-for="question" id="question-form-input">
                            <b-form-input id="question" v-model="flashcard.question" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col >
                        <b-form-group label="Answer" label-for="answer" id="answer-form-input">
                            <b-form-input id="answer" v-model="flashcard.answer" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <template v-slot:modal-footer>
                    <b-button variant="primary" size="md" class="float-right" @click="createCard">Create
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
                flashcard:{
                    question:'',
                    answer:'',
                    setID:this.set.id
                }
            }
        },
        mounted() {
        },
        props: ['set'],
        methods: {
            createCard(){
                axios.post('/flashcard/', this.flashcard)
                this.$bvModal.hide("createPostCardModal")
                window.location.reload()

            }
        },

    }
</script>
