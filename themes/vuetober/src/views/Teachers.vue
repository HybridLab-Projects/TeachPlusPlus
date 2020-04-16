<template>
  <b-container fluid>
    <b-row>
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
  mounted() {
    this.$store.dispatch('fetchTeachers').then(() => {
      if (this.id) {
        this.$store.dispatch('selectTeacher', this.id);
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
