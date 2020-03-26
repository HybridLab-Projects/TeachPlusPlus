<template>
  <b-container fluid>
    <b-row>
      <b-col
        cols="3"
      >
        <Search />
      </b-col>
      <b-col class="bg">
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
  .bg {
    background-color: #F4F5F8;
    height: 100vh;
  }
</style>
