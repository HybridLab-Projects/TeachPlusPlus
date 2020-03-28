<template>
  <div class="col-md-12">
    <b-row class="mt-3">
      <b-col class="d-flex align-items-center">
        <img
          class="mb-4"
          :src="require(`@/assets/img/Logo.svg`)"
          alt=""
        >
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <div class="md-form active-pink active-pink-2 mb-3 mt-0">
          <b-form-input
            class="mt-3 mb-5 test"
            type="text"
            name="Učiteľ"
            placeholder="Search"
            v-model="searchTeacher"
          />
        </div>
      </b-col>
    </b-row>
    <b-row>
      <b-col class="p-0">
        <h6 class="text-secondary ml-4 mb-4">
          <strong>Zoznam ucitelov</strong>
        </h6>
        <b-list-group>
          <b-list-group-item
            v-for="teacher in teachers"
            :key="teacher.id"
            class="d-flex align-items-center test2 p-3"
            @click="selectTeacher(teacher)"
            :class="{ active: teacher.id === isActive || false }"
          >
            <h6 class="mr-auto my-auto ml-4 teacher-name">
              <strong>{{ teacher.name }} {{ teacher.surname }}</strong>
            </h6>
            <b-badge
              variant="warning"
              class="my-auto ml-2"
              v-for="subject in teacher.subjects"
              :key="subject.id"
            >
              {{ subject.short }}
            </b-badge>
          </b-list-group-item>
        </b-list-group>
      </b-col>
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
      isActive: -1,
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
  methods: {
    selectTeacher(teacher) {
      this.$store.dispatch('selectTeacher', teacher);
      this.isActive = teacher.id;
    },
  },
};
</script>

<style lang="scss" scoped>
  $purpleColor: #5352f6;
  $bgColor:  #f3f5f8;
  $darkerbgColor: #D7D7E8;

  .teacher-name {
    font-size: 0.875rem;
  }

  .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
    border-bottom: 1px solid $purpleColor;
    box-shadow: 0 1px 0 0 $purpleColor;
    border-radius: 1px;
  }

  .test {
    border: none;
    box-shadow: none;
    background-color: $bgColor;
  }

  .test2 {
    border: none;
    border-bottom: 1px solid $darkerbgColor;
  }

  .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    z-index: 2;
    color: $purpleColor;
    background-color: $darkerbgColor;
    border-color: $darkerbgColor;
  }
</style>
