<template>
  <b-container fluid>
    <b-row>
      <b-col cols="5">
        <Search />
      </b-col>
      <b-col>
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

</style>
