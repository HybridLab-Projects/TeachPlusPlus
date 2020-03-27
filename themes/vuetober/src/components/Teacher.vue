<template>
  <div>
    <b-row class="mt-3">
      <b-col class="d-flex justify-content-end align-items-center">
        <b-link
          class="pr-5 my-auto text-secondary"
          @click="logout"
        >
          <strong>
            Odhlásenie z aplikácie
            <b-icon-box-arrow-right
              font-scale="1.5"
              shift-v="-2"
            />
          </strong>
        </b-link>
        <b-button
          variant="danger"
          class="py-2 px-3"
        >
          Pridať feedback
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
          <div class="my-auto ml-4">
            <h6 class="text-muted">
              <strong>SPŠE HALOVA</strong>
            </h6>
            <h1>{{ selectedTeacher.name }} {{ selectedTeacher.surname }}</h1>
            <div class="d-flex align-items-center">
              <p class="text-muted my-auto mr-3">
                Predmety
              </p>
              <b-badge
                variant="primary my-auto mr-1"
                v-for="subject in selectedTeacher.subjects"
                :key="subject.id"
              >
                {{ subject.short }}
              </b-badge>
            </div>
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
              <b-row class="mx-auto">
                <b-col class="p-0">
                  <img
                    :src="require(`@/assets/img/user1.png`)"
                    alt=""
                    class="mr-auto"
                  >
                </b-col>
                <b-col
                  cols="10"
                  class="pr-5"
                >
                  <b-list-group>
                    <b-list-group-item
                      v-for="feedback in selectedTeacher.feedbacks"
                      :key="feedback.id"
                      class="d-flex align-items-center mb-5"
                    >
                      <div class="p-2">
                        {{ feedback.content }}
                      </div>
                    </b-list-group-item>
                  </b-list-group>
                </b-col>
              </b-row>
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
  methods: {
    logout() {
      this.$store.dispatch('logout')
        .then(() => this.$router.push('/'))
        .catch((err) => {
          console.log(err.response.data.error);
          this.$router.push('/');
        });
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
