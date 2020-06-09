<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
    <PlantCard/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue';
import PlantCard from '@/components/plant-card/PlantCard';

export default {
  name: 'Home',
  components: {
    HelloWorld,
    PlantCard
  }
}
</script>
