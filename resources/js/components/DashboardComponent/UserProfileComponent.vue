<template>
<div v-if="user">
    <div class="row">
        <div class="col">
            <form>
                <loading :active.sync="isLoading"
                    :can-cancel="false"
                    :is-full-page="false"></loading>
                <div class="form-group row">
                    <label for="name" class="pr-3">Name:</label>
                    <span v-if="editData">
                        <input type="text" class="form-control" name="name" id="name" ref="name" :value="user.name" />
                    </span>
                    <span v-else>
                        {{user.name}}
                    </span>
                </div>
                <div class="form-group row">
                    <label for="username" class="pr-3">Username: </label>
                    <span v-if="editData">
                        <input type="text" class="form-control" name="name" id="name" ref="username" :value="user.username" />
                    </span>
                    <span v-else>
                        {{user.username}}
                    </span>
                </div>
                <div class="form-group row">
                    <label for="email" class="pr-3">E-mail: </label>
                    <span v-if="editData">
                        <input type="email" class="form-control" name="name" id="name" ref="email" :value="user.email" />
                    </span>
                    <span v-else>
                        {{user.email}}
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <p class="text-danger">{{error}}</p>
    </div>
    <div class="row">
        <button class="btn btn-primary" v-if="!editData" v-on:click="edit">Modifica</button>
        <button class="btn btn-danger" v-if="editData" v-on:click="cancel">Annulla</button> <button class="btn btn-primary" v-if="editData" v-on:click="save">Salva</button>
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
            editData: false,
            error: '',
            isLoading: false
        }
    },
    components:{
        Loading
    },
    mounted(){
        this.user = this.$attrs.data.original.user;
    },
    methods:{
        edit(){
            this.editData = !this.editData;
        },
        cancel(){
            this.editData = !this.editData;
        },
        save(){
            this.error = '';
            this.isLoading = true;
            const user = {name: this.$refs.name.value, username: this.$refs.username.value, email: this.$refs.email.value};
            this.updateData(user);
        },
        async updateData(user){
            window.axios.put('/api/v1/user/'+this.user.id, {
                name: user.name,
                username: user.username,
                email: user.email,
            }).then((response)=>{
                this.user = response.data.user;
                this.isLoading = false;
                this.editData = !this.editData;
            }).catch((error) => {
                this.error = error;
                this.isLoading = false;
                });
        }
    }
}
</script>
