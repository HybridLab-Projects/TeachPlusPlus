<template>
  <b-container fluid>
    <b-row class="all">
      <b-col
        cols="3"
        class="searchbg"
      >
        <Search />
      </b-col>
      <b-col
        cols="9"
        class="teacherbg"
      >
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
  props: {
    id: {
      type: String,
      default: '',
    },
  },
  created() {
    this.$store.dispatch('fetchTeachers');
  },
  beforeRouteUpdate(to, from, next) {
    this.$store.dispatch('fetchTeachers').then(() => {
      if (to.params.id) {
        this.$store.dispatch('selectTeacher', to.params.id).then(() => next());
      }
    });
  },
};
</script>
<style lang="scss" scoped>
  .all {
    column-width: 81px;
  }
  .searchbg {
    background-color: #fff;
    height: 100vh;
  }

  .teacherbg {
    background-color: #f8f5f3;
    width: auto;
  }
</style>
