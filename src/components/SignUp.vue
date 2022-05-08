<template>
    <form>
        <fieldset class="field">
            <legend>User Sign Up</legend>
            <label>First Name: <input type="text" v-model="signUpForm.firstName"></label>
            <label>Last Name: <input type="text" v-model="signUpForm.lastName"></label>
            <label>Email: <input type="text" v-model="signUpForm.email"></label>
            <label>Username: <input type="text" v-model="signUpForm.username"></label>
            <label>Password: <input type="password" v-model="signUpForm.password"></label>
        </fieldset>
        <button type="submit" @click.prevent="userSignUp()">Sign Up</button>
    </form>
</template>

<script>
import store from '@/store/index.js'
export default {
    name: 'signUp',
    data(){
       return{
           signUpForm: {
               firstName: "",
               lastName: "",
               email: "",
               username: "",
               password: ""
           }
       }
   },
   methods: {
       userSignUp: function(){
           const formData = new FormData();
           var vm = this;
           formData.append("firstName", this.signUpForm.firstName);
           formData.append("lastName", this.signUpForm.lastName);
           formData.append("email", this.signUpForm.email);
           formData.append("username", this.signUpForm.username);
           formData.append("password", this.signUpForm.password);

           fetch("http://localhost/finals/myportfolio/src/php/addUser.php", {
               method: "post",
               body: formData
           }).then(response => response.json()).then(function(data){
               if(data.status == "success"){
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
                   })
                   
                   vm.signUpForm.firstName = "";
                   vm.signUpForm.lastName = "";
                   vm.signUpForm.email = "";
                   vm.signUpForm.username = "";
                   vm.signUpForm.password = "";
               }else{
                   console.log(data)
               }
           })
       }
   }
}
</script>

<style scoped>


form{
    background: rgb(209, 172, 103);
    padding-top: 5rem;
}
.field{
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
    border: none;
}
legend{
    color: black;
    margin-bottom: 2rem;
    font-weight: bold;
    font-size: 1.5em;
    margin-left: 0.5rem;
}
label{
    text-align: left;
    margin-left: 30rem;
    color: black;
}
input{
    border: 00.2rem solid blue;
    margin-left: 2rem;
}
.field label:nth-child(4) input{
    margin-left: 4.3rem;
    border: 0.3 dashed orange;
}
.field label:nth-child(5) input{
    margin-left: 2.2rem;
    border: 0.3 dashed orange;
}
.field label:nth-child(6) input{
    margin-left: 2.4rem;
    border: 0.3 dashed orange;
}

button{
    width: 8rem;
    height: 2rem;
    background: black;
    color: white;
    font-size: 1em;
    text-transform: uppercase;
    border-radius: 0.5rem;
    margin-bottom: 2rem;
    margin-left: 1rem;
    margin-top: 1rem;
}
</style>