<template>
  <b-container fluid>
    <b-row>
      <b-col cols="3">
        <Search />
      </b-col>
      <b-col class="test">
        <Teacher />
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import Search from '@/components/Search.vue';
import Teacher from '@/components/Teacher.vue';

export default {
  name: 'Teachers',
  components: {
    Search,
    Teacher,
  },
  created() {
    this.$store.dispatch('fetchTeachers');
  },
};
</script>

<style lang="scss" scoped>
  .test {
    background-color: #F0F0F0;
    height: 100vh;
  }
</style>
