<template>
<div v-if="user">
    <div>
        <div class="mx-3">
            <!-- <form> -->
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
                    <label for="username" class="my-2">Username:</label>
                    <span v-if="editData">
                        <input type="text" class="form-control" name="name" id="name" ref="username" :value="user.username" />
                    </span>
                    <span id="linkToCopy" v-else>
                        <a :href="this.$attrs.link+user.username" target="_blank" rel="noopener noreferrer" ref="linkToCopy">
                            {{' '+this.$attrs.link}}{{user.username}}
                        </a> <button class="btn btn-primary" @click="copyToClipboard"><svg class="w-6 h-6" width="30px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"></path></svg></button> <span class="text-primary">{{msg}}</span>
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
            <!-- </form> -->
        </div>
    </div>
    <div class="row">
        <p class="text-danger">{{error}}</p>
    </div>
    <div>
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
            isLoading: false,
            msg: ''
        }
    },
    components:{
        Loading
    },
    mounted(){
        this.user = this.$attrs.data.original.user;
    },
    methods:{
        copyToClipboard(){
            const el = document.createElement('textarea');
            el.value = this.$refs.linkToCopy;
            el.setAttribute('readonly', '');
            el.style.position = 'absolute';
            el.style.left = '-9999px';
            document.body.appendChild(el);
            const selected =  document.getSelection().rangeCount > 0  ? document.getSelection().getRangeAt(0) : false;
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            if (selected) {
                document.getSelection().removeAllRanges();
                document.getSelection().addRange(selected);
            }
            this.msg=" Copied!"
            setInterval(() => {
                this.msg = '';
            }, 3000);
        },
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
                document.getElementById('navbarUsername').innerText = this.user.username;
            }).catch((error) => {
                this.error = error;
                this.isLoading = false;
            });
        }
    }
}
</script>
