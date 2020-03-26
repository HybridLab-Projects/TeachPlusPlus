<template>
  <b-container fluid>
    <b-row>
      <b-col class="col-md-3 test1">
        <Search />
      </b-col>
      <b-col class="test2">
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
  .test2 {
    background-color: #F0F0F0;
    height: 100vh;
  }
</style>
