<template>
  <div>
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
          {{ teacher.name }}
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
  </div>
</template>

<script>
export default {
  name: 'Search',
  data() {
    return {
      searchTeacher: '',
      teachers: [
        {
          name: 'Emilia Jancuskova',
          id: 1,
          subjects: [{
            id: 1,
            name: 'math',
            short: 'MAT',
          },
          {
            id: 2,
            name: 'german',
            short: 'NEJ',
          },
          ],
        },
        {
          name: 'Milos',
          id: 2,
          subjects: [{
            id: 1,
            name: 'programming',
            short: 'PRO',
          },
          {
            id: 2,
            name: 'engish',
            short: 'ANJ',
          },
          ],
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>

</style>
