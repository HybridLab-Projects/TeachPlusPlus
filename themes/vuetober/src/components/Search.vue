<template>
  <div>
    <b-row>
      <b-col class="d-flex align-items-center">
        <h6 class="my-auto">
          Teach++
        </h6>
      </b-col>
    </b-row>
    <b-row>
      <b-form-input
        class="my-3"
        type="text"
        name="Učiteľ"
        placeholder="Meno učiteľa"
        v-model="searchTeacher"
      />
      <b-list-group>
        <b-list-group-item
          v-for="teacher in teachers"
          :key="teacher.id"
          class="d-flex align-items-center"
        >
          <h5 class="mr-auto my-auto">
            {{ teacher.name }} {{ teacher.surname }}
          </h5>
          <h6
            class="my-auto ml-2"
            v-for="subject in teacher.subjects"
            :key="subject.id"
          >
            {{ subject.short }}
          </h6>
          <h6 class="my-auto ml-2">
            >
          </h6>
        </b-list-group-item>
      </b-list-group>
    </b-row>
  </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'Search',
  data() {
    return {
      searchTeacher: '',
    };
  },
  computed: {
    ...mapGetters([
      'getTeachers',
    ]),
    teachers() {
      return this.getTeachers(this.searchTeacher);
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
