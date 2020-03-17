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
    overflow: hidden;
    background-color: #5351FB;
    height: 100vh;
  }
</style>
