<template>
    <div>
        <div >
            <Login>
                <AuthHeader />
            </Login>
        </div>
    </div>
   <!-- v-if="!this.auth" -->
</template>

<script>
import Login from '@/components/LogIns.vue';
import AuthHeader from '@/components/AuthHeader.vue';
import store from '@/store/index.js';
export default {
    name: 'LoginViews',
    components: {
    Login,
    AuthHeader,
    // signUp
   
    
  },
  computed: {
      auth: function(){
          return store.state.auth;
      }
  }
}
</script>