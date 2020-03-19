<template>
  <div id="app">
    <NavBar />
    <router-view />
  </div>
</template>

<script>
import NavBar from '@/components/NavBar.vue';

export default {
  components: {
    NavBar,
  },
};
</script>

<style lang="scss">
* {
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap');
  font-family: 'Inter', sans-serif;
}
</style>
