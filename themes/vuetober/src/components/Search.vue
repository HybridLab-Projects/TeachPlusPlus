<template>
  <div>
    <b-row class="mt-3">
      <b-col class="d-flex align-items-center">
        <b-img
          class="pb-3 w-50"
          :src="require(`@/assets/img/Logo.svg`)"
          alt=""
        />
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <b-input-group class="mt-2 mb-5">
          <b-input-group-prepend
            is-text
            class="border-0 searchbar"
          >
            <b-icon-search class="border-0" />
          </b-input-group-prepend>
          <b-form-input
            class="border-0 bg-search"
            type="text"
            name="Učiteľ"
            placeholder="Vyhľadaj"
            v-model="searchTeacher"
          />
        </b-input-group>
      </b-col>
    </b-row>
    <b-row>
      <b-col class="p-0 teachers">
        <h6 class="text-secondary ml-4 mb-4 font-weight-bold">
          Zoznam učiteľov
        </h6>
        <b-list-group class="search">
          <b-list-group-item
            v-for="teacher in teachers"
            :key="teacher.id"
            class="d-flex align-items-center test2 p-3"
            @click="selectTeacher(teacher)"
            :class="{ active: teacher.id === selectedTeacher.id}"
          >
            <h6 class="mr-auto my-auto ml-4 teacher-name font-weight-bold">
              {{ teacher.name }} {{ teacher.surname }}
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
    <b-row>
      <b-col>
        <p class="footer-text text-center text-muted mt-5">
          &copy; 2020 Všetky práva vyhradené <strong>TEACH++</strong>
        </p>
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
    };
  },
  computed: {
    ...mapGetters({
      getTeachers: 'getTeachers',
      selectedTeacher: 'getSelectedTeacher',
    }),
    teachers() {
      return this.getTeachers(this.searchTeacher.toLowerCase());
    },
  },
  methods: {
    selectTeacher({ id }) {
      this.$store.dispatch('selectTeacher', id).then(() => {
        this.$router.push(`/teachers/${id}`).catch(() => {});
      });
    },
  },
};
</script>

<style lang="scss" scoped>
$purpleColor: #5352f6;
$bgColor:  #f3f5f8;
$darkerbgColor: #D7D7E8;

::-webkit-scrollbar {
  width: 10px;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

.teacher-name {
  font-size: 0.875rem;
}

input.form-control[type=text]:focus:not([readonly]) {
  border-bottom: 1px solid $purpleColor;
  box-shadow: 0 1px 0 0 $purpleColor;
  border-radius: 1px;
}

.bg-search {
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

.footer-text {
  font-size: 0.875rem;
}

.search {
  height: calc(100vh - 20rem);
  overflow-y: scroll;
  overflow-x: none;
  padding-right: 10px;
}

.searchbar {
  border: none;
}
</style>
