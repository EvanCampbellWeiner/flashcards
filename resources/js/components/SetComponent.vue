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
            {{item.description}}
            </b-card-text>
            
            <b-button  v-b-modal.linkModal @click="playDeck(item.id)" variant="success">Play</b-button>
            <b-button  @click="editDeck(item.id)" variant="primary">Edit Deck</b-button>
        </b-card>


        <b-modal id="linkModal" title="Link to Play Deck">
                <div class="row">
                    <div variant="primary" class="col-sm-12">
                    {{link}}
                    </div>
                    <div class="col-sm-12">
                    <ol>
                    <li>Copy the link above</li>
                    <li>Click on extension on the window you wish to use.</li>
                    <li>Paste the link in.</li>
                    <li>Start Playing.</li>
                    </ol>
                    </div>
                </div>
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
                link:'',
            }
        },
        mounted() {
            this.getInformation()
        },
        props: ['user'],
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
                  this.check=true;
                  this.link = "set/json/"+this.user.id+"/"+id;

            },
            editDeck(id){
                window.location.href = 'set/'+ id
            }
        },

    }
</script>
