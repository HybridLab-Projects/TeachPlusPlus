<template>
  <b-container fluid>
    <b-row>
      <b-col
        cols="3"
        class="p-0"
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
    background-color: #f3f5f8;
    height: 100vh;
  }
</style>
