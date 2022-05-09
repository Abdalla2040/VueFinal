<template>
  <div class="about">
    <h1>About Me</h1>
    <div class="info">
      <img src="@/assets/software.jpg" alt="">
      <div class="inside">
        <h2>My Background</h2>
         <p>My name is Abdullahi Mohamed and I'm a recent graduate. I have some experience with programming language such as PHP, C#, Java, Python, JavaScript as well as VueJs. 
      This website is created with VueJs, so that's that.
      I'm trying to be a web developer, even though clearly I need more practice in that department.
    </p>
        </div>
      
    </div>
   
  </div>
</template>

<style scoped>
div{
  margin-right: auto;
  margin-left: auto;
  background: rebeccapurple;

}
  .about {
    background: rgb(182, 182, 136);
    width: 100%;
    height: 100%;
  }
  h1 {
    background: rgb(152, 152, 222);
    color: white;
    padding: 0;
    margin: 0;
  }
  .info{
    text-align: center;
    height: 30rem;
    border: 0.1rem solid orange;
    display: flex;
    justify-content: space-evenly;

  }
  
  .inside p{
    text-align: left;
    color: white;
    align-items: center;
    margin-top: 5rem;
    width: 80%;
    margin-right: auto;
    margin-left: auto;
  }
  img{
    width: 100%;
  }

</style>
