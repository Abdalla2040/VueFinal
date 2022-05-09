<template>
    <div>
        <slot></slot>
    <form v-if="!this.auth">
        <fieldset class="form1 authorization">
        <div class="authform">
          <legend>{{ legend }}</legend>
          <label>Username: <input type="text" v-model="username"></label><br>
          <label>Password: <input type="password" v-model="password"></label><br>
          <button class="logbtn" @click.prevent="login()">Login</button>
        </div>
            
        </fieldset>
    </form> 
    <form v-else>
        <button class="logbtn" @click="logout()">Log Out</button>
    </form>
  </div>
</template>

<script>
import store from "@/store/index.js";
export default {
    name: "Login-form",
    props: {
        legend: {
        type: String,
        default: "Login",
        },
    },
    data() {
        return {
        username: "",
        password: "",
        };
    },
    computed: {
        auth: function () {
        return store.state.auth;
        },
    },
    methods: {
        login: function () {
        const formData = new FormData();
           var vm = this;
        
           formData.append("username", this.username);
           formData.append("password", this.password);

           fetch("http://localhost/finals/myportfolio/src/php/login.php", {
               method: "post",
               body: formData
           }).then(response => response.json()).then(function(data){
               if(data.status == "success"){
                   vm.username = "";
                   vm.password = "";

                   store.commit("setAuth", {
                       auth: data.auth,
                       session: data.session

                   });
                   store.commit("setUser", {
                       id: data.id,
                       firstName: data.firstName,
                       lastName: data.lastName,
                       email: data.email,
                       username: data.username
                   });
                
               }else{
                   console.log(data)
               }
           });
        },
        logout: function () {
        store.state.auth = false;
        store.state.username = "";
        },
    },
}
</script>

<style scoped>

    div{
       margin-top: 0;
        background: rgb(202, 177, 145);
    }
    .form1{
        
        border: none;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
        
    }
    .authform{
        border: 0.1rem solid red;
        height: 12rem;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
    }
    .authform legend{
        margin-top: 2rem;
        margin-bottom: 0.5rem;
        margin-left: 8.5rem;
        font-size: 1.5em;
        text-transform: uppercase;
        color: rgb(184, 23, 23);
        font-weight: bold;
        width: 5rem;
    }
    .authform label{
        display: block;
    }
    .logbtn{
        padding: 0.2rem 1.5rem;
        color: white;
        background-color: black;
        font-size: 1em;

    }
   

</style>