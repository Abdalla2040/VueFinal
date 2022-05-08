
<template>
    <div>
        <h3>Projects</h3>
        
            <div v-for="(project, index) in projects" :key="index">
                <p> this should be name: {{project.name}}</p>
                <p> this shoudl be Description: {{project.Description}}</p>
                <div class="hr" v-if="index < projects.length -1 "><hr /></div>
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
    .list{
        /* width: 50rem; */
    }
</style>


