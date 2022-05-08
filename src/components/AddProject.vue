<template>
<div>
    <form >
        <fieldset class="field">
            <legend>Add Project</legend>
            <label>Project Name: <input type="text" v-model="projects.projectName"></label>
            <label> Description: <textarea v-model="projects.projectDescription"></textarea></label>
            <button type="submit" @click.prevent="addProjects()">Add Project</button>
        </fieldset>
    </form>
</div>
    
</template>


<script>
import store from '@/store/index.js'
export default {
    name: 'AddProject',
   data(){
       return{
           projects: {
           projectName: "",
           projectDescription: ""
           }
           
       }
   },
   computed: {
       session: function(){
           return store.state.session;
       }
   },
   methods: {
       addProjects(){
           const formData = new FormData();
           var vm = this;
           formData.append("session", this.session);
           formData.append("projectName", this.projects.projectName);
           formData.append("projectDescription", this.projects.projectDescription);
          

           fetch("http://localhost/finals/myportfolio/src/php/addProjects.php", {
               method: "post",
               body: formData
           }).then(response => response.json()).then(function(data){
               if(data.status == "success"){
                   vm.projects.projectName = "";
                   vm.projects.projectDescription = "";
                   vm.$router.push("projectList");
                
               }else{
                   console.log('error')
               }
           });

       },
       clear(){
           store.dispatch("clear");
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
    /* border: 0.2rem solid blue; */
    margin-left: 1rem;
}
.field label input{
   
    /* margin-left: 2rem; */
    /* border: 0.2rem solid rgb(0, 255, 128); */
    width: 20rem;
}
textarea{
    margin-left: 2rem;
    width: 20.2rem;
}


button{
    width: 10rem;
    height: 2rem;
    background: black;
    color: white;
    font-size: 1em;
    text-transform: uppercase;
    border-radius: 0.5rem;
    margin-bottom: 2rem;
    margin-left: 38rem;
    margin-top: 1rem;
}
</style>