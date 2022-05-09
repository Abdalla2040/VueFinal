
<template>
    <div>
        <h3>Projects</h3>
        
            <div  v-for="(project, index) in projects" :key="index">
                <div class="container">
                <p> Project ID: {{project.ID}} </p>
                <p> User ID: {{project.userID}} </p>
                <p> Project Name: {{project.projectName}} </p>
                <p> Project Description: {{project.projectDescription}} </p>
                <div class="hr" v-if="index < projects.length -1"><hr /></div>
                </div>
            </div>
    </div>
</template>


<script>
export default {
   name: 'displayProject',
   created: function(){
       this.getProjects(); 
    },
    data: function(){
       return{
           projects: [],
       }
   },
    methods: {
        getProjects: function(){
            var vm = this;
         fetch("http://localhost/finals/myportfolio/src/php/getProjects.php").then(res => res.json()).then(function(data){
            vm.projects = data.projects;
            console.log(data.projects);
         });
           
        }
        
    }
}
</script>

<style scoped>
div{
    margin-left: auto;
    margin-right: auto;
    background: url('@/assets/black_gold.jpg');
}
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        border: 00.1rem solid black;
        width: 50%;
        background: #eaeaa2;
        margin-bottom: 2rem;
        
    }
    .container p{
        margin: 0.4rem;
        align-items: center;
        box-shadow: 0.1rem 0.2rem #cac0c0;
        color: white;
        background: #020202;
    }
    h3{
        background: #020202;
        color: white;
    }
    .hr{
        margin-bottom: 2rem;
    }
  
</style>


