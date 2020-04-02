<template>
  <b-container fluid>
    <b-row>
      <b-col
        cols="3"
        class="searchbg"
      >
        <Search />
      </b-col>
      <b-col class="teacherbg">
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
  .searchbg {
    background-color: #fff;
    height: 100vh;
  }

  .teacherbg {
    background-color: #f8f5f3;
    height: 100vh;
  }
</style>
