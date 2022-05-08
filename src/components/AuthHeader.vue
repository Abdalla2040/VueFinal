<template>
<div>
    <h2>{{ message }}</h2>
    <p v-if="this.auth"> {{ username}} is Authorized</p>
    <p v-else> Not Authorized</p>
</div>
    
</template>

<script>
import store from '@/store/index.js'
export default {
   name: 'AuthHeader',
   props: {
       message: {
           type: String,
           default: "Authorization",
           required: false
       }
   },
   computed: {
       auth: function(){
           return store.state.auth;
       },
       username: function(){
           return store.state.user.username;
       }
   }
}
</script>

<style scoped>

</style>