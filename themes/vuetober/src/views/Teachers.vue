<template>
  <b-container fluid>
    <b-row>
      <b-col
        cols="0"
        xl="3"
        class="searchbg d-none d-xl-block"
      >
        <Search
          class="d-none d-xl-block"
        />
      </b-col>
      <b-col
        cols="12"
        xl="9"
        class="teacherbg"
      >
        <SearchSidebar class="d-inline d-xl-none fixed-top" />
        <Teacher />
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import Search from '@/components/Search.vue';
import SearchSidebar from '@/components/SearchSidebar.vue';
import Teacher from '@/components/Teacher.vue';

export default {
  name: 'Teachers',
  components: {
    Search,
    SearchSidebar,
    Teacher,
  },
  props: {
    id: {
      type: String,
      default: '',
    },
  },
  created() {
    this.$store.dispatch('fetchTeachers').then(
      () => this.$store.dispatch('selectTeacher', this.id),
    );
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
.searchbg {
  background-color: #fff;
  height: 100vh;
}

.teacherbg {
  background-color: #f8f5f3;
}
</style>
