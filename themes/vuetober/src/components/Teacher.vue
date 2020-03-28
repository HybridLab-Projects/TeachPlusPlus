<template>
  <div class="pl-5">
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
          class="py-3 px-5"
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
            <p class="text-muted">
              <strong>SPSE Hálova</strong>
            </p>
            <h1>
              <strong>{{ selectedTeacher.name }} {{ selectedTeacher.surname }}</strong>
            </h1>
            <div class="d-flex align-items-center">
              <b-row>
                <p class="text-muted my-auto ml-3">
                  Predmety
                </p>
                <b-badge
                  href="#"
                  variant="warning"
                  class="ml-3"
                >
                  Warning
                </b-badge>
                <b-badge
                  href="#"
                  variant="danger"
                  class="mx-3"
                >
                  Danger
                </b-badge>
              </b-row>
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
            content-class="mt-4"
            class="tabbs"
          >
            <b-tab
              title="Najnovšie feedbacky"
              active
            >
              <b-row>
                <b-col
                  cols="12"
                  class="pr-5"
                >
                  <b-list-group>
                    <b-list-group-item
                      v-for="feedback in selectedTeacher.feedbacks"
                      :key="feedback.id"
                      class="d-flex align-items-center mb-5 border-0"
                    >
                      <div class="p-2">
                        {{ feedback.content }}
                      </div>
                    </b-list-group-item>
                  </b-list-group>
                </b-col>
              </b-row>
            </b-tab>
            <b-tab
              title="Zoradiť podľa počtu hlasov"
            >
              <b-badge variant="danger">
                Danger
              </b-badge>
              asdf
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
