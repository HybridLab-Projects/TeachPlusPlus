<template>
  <div class="startingpage_style">
    <StartingPage />
  </div>
</template>

<script>
// @ is an alias to /src
import StartingPage from '@/components/StartingPage.vue';

export default {
  name: 'Home',
  components: {
    StartingPage,
  },
};
</script>

<style lang="scss" scoped>
  .startingpage_style {
    display: table;
    height: 100vh;
    background-color: #5e5cfc;
    overflow: hidden;
  }
</style>
