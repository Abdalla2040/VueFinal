<template>
  <div class="background">
    <div >
      <h1>Welcome to my Portfolio</h1>
      <div class="info">
         
          <img src="@/assets/specialist.jpg" alt="specialist">
         
          <div class="container">
          <h3>Build with VueJS</h3>
          <p>This Portfolio is build with VueJS. Explore and check out all the pages to learn more!</p>
          </div>
      </div>
      
      <div>
        <button type="submit" @click="toProjects()">Go to Projects</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  methods: {
    toProjects(){
      this.$router.push("projectList");
    }
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
div {
}
.background {
  width: 100%;
  height: 50rem;
  background: url('@/assets/N39Vsv.jpg')
}
.homebg {
  display: block;
  margin: 0;
  padding: 0;

  width: 100%;
}
img {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  width: 60%;
  /* margin-top: 15rem;
  margin-right: 35rem; */
  border: 00.5rem solid black;
}
h1 {
  margin: 0;
  padding: 0;
  background: rgb(26, 26, 15);
}
button{
  width: 10rem;
  padding: 1rem;
  border-radius: 0.5rem;
  margin-left: 45rem;
  background: rgb(30, 240, 240);
  border: none;
  font-size: 1em;
  font-weight: bold;
}

.container p{
   text-align: left;
    color: rgb(169, 8, 198);
    background: white;
    padding: 2rem;
    align-items: center;
    margin-top: 5rem;
    width: 80%;
    margin-right: auto;
    margin-left: auto;
}
.info{
    text-align: center;
    height: 30rem;
    display: flex;
    justify-content: space-evenly;
    margin-top: 10rem;

  }
  h3{
    margin-top: 5rem;
    color: white;
    font-size: 2rem;
  }
</style>
