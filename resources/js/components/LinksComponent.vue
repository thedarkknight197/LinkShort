<template>
  <div v-if="user">
      <h1 class="text-center">{{user.username}} <span class="h2 text-muted">{{user.name}}</span></h1>
      <div v-for="link in user.links" v-bind:key="link.id">
          <div class="card my-3">
              <div class="card-header text-center">
                  {{link.title}}
              </div>
              <div class="link-body">
                  <div>
                      <p class="h5 text-center py-3">
                        <a :href="link.link" target="_blank" :title="link.title">{{link.link}}</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div v-else>
      <h1 class="text-center">404 Not Found!</h1>
  </div>
</template>

<script>
export default {
    data(){
        return {
            user: null
        }
    },
    mounted () {
        this.user = this.$attrs.data.original.user;
        this.user.links.reverse();
    }
}
</script>

<style>

</style>
