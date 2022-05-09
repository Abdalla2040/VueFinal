<template>
  <div id="app">
    
      <nav >
          <img class="logo" src="@/assets/mylogo.png" alt="logo">
        <ul>
          <li><router-link to="/">Home</router-link></li>
          
          <li><router-link to="/login">Login</router-link></li>
          <li><router-link to="/signUp">Register</router-link></li>
          <span  v-if="auth"><li><router-link to="/addProjects">Add Projects</router-link></li></span>
          <li><router-link to="/projectList">Projects</router-link></li>
          <li><router-link to="/about">About</router-link></li>

        </ul>
      </nav>
      <router-view/>
      <footerCom/>
  </div>
</template>

<script>
import store from '@/store/index.js'
import footerCom from '@/components/FooterPage.vue'
export default {
  name: 'FooterView',
    computed: {
      auth: function(){
        return store.state.auth;
      }
    },
    components: {
    footerCom
  }, 
}
</script>

<style>
body{
  box-sizing: border-box;
  margin: 0;
  border: 0;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #f80c0c;
  padding: 0;
  margin: 0;
  width: 90%;
  height: 100%;
  margin-left: auto;
  margin-right: auto;
  
  
}


nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: rgb(176, 66, 66);
  height: 10rem;
}
nav ul{
  list-style: none;
  display: flex;
  gap: 0.5rem;
  
}
nav ul li{
  flex-direction: row;
  
}

nav a {
  font-weight: bold;
  color: white;
  flex-direction: column;
  width: 0.5rem;
  text-decoration: none;
}
a {
  margin-right: 2rem;
  background: rgb(154, 124, 124);
  text-transform: uppercase;
  border-radius: 0.5rem;
  padding: 0.75rem;
  
}
nav a.router-link-exact-active {
  color: green;
}

a.router-link{
  background: #f80c0c;
  border: 0.2 solid blue;
}
.logo{
  margin-left: 1rem;
  height: 8rem;
}

</style>
