<template>
  <b-container fluid>
    <h1>PROTECTED</h1>
    <b-row>
      <b-col cols="5">
        <Search />
      </b-col>
      <b-col>
        <h1>Test</h1>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import Search from '@/components/Search.vue';

export default {
  name: 'Teachers',
  components: { Search },
  created() {
    this.$store.dispatch('fetchTeachers');
  },
};
</script>

<style lang="scss" scoped>

</style>
