<template>
<div v-if="user">
    <div v-for="link in user.links" v-bind:key="link.id">
        <div v-if="linkToEdit != link.id">
            <loading :active.sync="isLoading"
                :can-cancel="false"
                :is-full-page="false"></loading>
            <div class="card my-3">
                <div class="card-header">{{link.title}}
                    <span class="edit-btn">
                        <button class=" btn btn-dark" @click="editLink(link.id)">Modifica</button>
                        <button class=" btn btn-danger" @click="deleteLink(link.id)">Cancella</button>
                    </span>
                </div>
                <div class="card-body">
                    <a :href="link.link" target="_blank" rel="noopener noreferrer">{{link.link}}</a>
                </div>
            </div>
        </div>
        <div v-else>
            <div>
                <loading :active.sync="isLoading"
                        :can-cancel="false"
                        :is-full-page="false"></loading>
                <p>Edit Link:</p>
                <label for="title">Titolo:</label>
                <input type="text" class="form-control" id="title" name="title" ref="title" :value="link.title">
                <label for="link">Link:</label>
                <input type="text" class="form-control" id="link" name="link" ref="link" :value="link.link">
                <p class="text-center text-danger">{{error}}</p>
                <div class="my-3">
                    <button class="btn btn-danger" @click="cancelEdit">Annulla</button>
                    <button class="btn btn-primary" @click="saveLink(link.id)">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>

// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';

export default {
    data(){
        return {
            user: null,
            linkToEdit: null,
            error: '',
            isLoading: false
        }
    },
    components: {
        Loading
    },
    mounted(){
        this.user = this.$attrs.data.original.user;
    },
    methods: {
        editLink(id){
            this.linkToEdit = id;
        },
        deleteLink(id){
            this.isLoading = true;
            window.axios.delete('/api/v1/link/'+id).then((data)=>{
                this.getUser(this.user.username);
            }).catch(e => this.error = e);
        },
        cancelEdit(){
            this.linkToEdit = null;
        },
        saveLink(id){
            this.isLoading = true
            this.e = '';
            console.log();
            window.axios.put('/api/v1/link/'+id, {title: this.$refs.title[0].value, link: this.$refs.link[0].value}).then((response)=>{
                this.getUser(this.user.username);
            }).catch(e => this.error = e);
        },
        getUser(username){
            window.axios.get('/api/v1/user/username/'+username).then(r=>{
                // this.isLoading ? '' : this.isLoading = true;
                this.user = r.data.user;
                this.linkToEdit = null;
                this.isLoading = false;
            }).catch(e => this.error = e);
        }
    }
}
</script>

<style scoped>
.edit-btn{
    position: absolute;
    right: 10px;
    display: block;
    top: 9px;
}
</style>
