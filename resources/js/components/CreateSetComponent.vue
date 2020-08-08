<template>
    <div class="pull-right">
            <b-button  v-b-modal.createDeckModal variant="primary">Create New Deck</b-button>
            
            <b-modal id="createDeckModal" title="Create New Flashcard Deck">
                <b-row>
                    <b-col >
                        <b-form-group label="Name" label-for="title" id="title-form-input">
                            <b-form-input id="title" v-model="set.title" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <b-col >
                        <b-form-group label="Description" label-for="description" id="description-form-input">
                            <b-form-input id="description" v-model="set.description" trim></b-form-input>
                        </b-form-group>
                    </b-col>
                </b-row>
                <template v-slot:modal-footer>
                    <b-button variant="primary" size="md" class="float-right" @click="createDeck">Create
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
                set:{
                title:'',
                description:'',
                userID:'',
                }
            }
        },
        mounted() {
            this.set.userID = this.user.id
        },
        props: ['user'],
        methods: {
            createDeck(){
                axios.post('/set/', this.set)
                this.$bvModal.hide("createDeckModal")
                window.location.reload()

            }
        },

    }
</script>
