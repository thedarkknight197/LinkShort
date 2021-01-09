<template>
  <div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLink">Aggiungi link</button>
        <div class="modal fade" id="addLink" tabindex="-1" aria-labelledby="addLink" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <label for="title">Titolo:</label>
                    <input type="text" class="form-control" id="title" name="title" v-model="link.title" placeholder="Add Title ...">
                    <label for="link">Link:</label>
                    <input type="text" class="form-control" id="link" name="link" v-model="link.link" placeholder="Add Link ...">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                <button type="button" class="btn btn-primary" @click='saveLink'>Salva</button>
                </div>
            </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            error: null,
            link: {
                title: '',
                link:'',
                user_id: null
            }
        }
    },
    methods:{
        saveLink(){
            window.axios.post('/api/v1/link/add').then((response)=>{

            }).catch((e)=>{this.error = e});
        }
    }
}
</script>

<style>

</style>
