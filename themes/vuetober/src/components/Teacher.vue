<template>
  <div>
    <b-row class="mt-3">
      <b-col class="d-flex justify-content-end align-items-center">
        <p class="pr-5 my-auto text-secondary">
          Odhlasemie z aplikacie
        </p>
        <b-button
          variant="danger"
          class="py-3 px-4"
        >
          Pridat feedback
        </b-button>
      </b-col>
    </b-row>
    <div v-if="selectedTeacher">
      <b-row class="mt-5">
        <b-col class="d-flex align-items-center">
          <img
            class="mb-4"
            :src="require(`@/assets/img/teacher.png`)"
            alt=""
          >
          <div class="my-auto">
            <h6 class="text-secondary">
              <strong>SPŠE HALOVA</strong>
            </h6>
            <h1>{{ selectedTeacher.name }} {{ selectedTeacher.surname }}</h1>
            <p class="text-secodnary">
              Predmety
            </p>
          </div>
        </b-col>
      </b-row>
      <b-row class="mt-5">
        <b-col>
          <b-tabs
            content-class="mt-3"
          >
            <b-tab
              title="Najnovšie feedbacky"
              active
            >
              <b-list-group>
                <b-list-group-item
                  v-for="feedback in selectedTeacher.feedbacks"
                  :key="feedback.id"
                  class="d-flex align-items-center"
                >
                  {{ feedback.content }}
                </b-list-group-item>
              </b-list-group>
            </b-tab>
            <b-tab title="Zoradiť podľa počtu hlasov">
              <b-badge variant="danger">
                Danger
              </b-badge>
            </b-tab>
          </b-tabs>
        </b-col>
      </b-row>
    </div>
  </div>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
  name: 'Teacher',
  computed: {
    ...mapGetters({
      selectedTeacher: 'getSelectedTeacher',
    }),
  },
};
</script>

<style lang="scss" scoped>

</style>
