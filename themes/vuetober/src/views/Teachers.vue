<template>
  <b-container fluid>
    <h1>PROTECTED</h1>
    <b-row>
      <b-col class="col-md-3 search_bar">
        <Search />
      </b-col>
      <b-col class="col-md-9 teacher_bar" />
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

.search_bar {
  height: 100vh;
}

.teacher_bar {
  background-color: #D4D3D3;

}

</style>
