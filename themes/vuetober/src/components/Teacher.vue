<template>
  <div class="pl-5 test">
    <b-row class="mt-3">
      <b-col class="d-flex justify-content-end align-items-center">
        <b-link
          class="pr-5 my-auto text-muted font-weight-bold"
          @click="logout"
        >
          Odhlásenie z aplikácie
          <b-icon-box-arrow-right
            font-scale="1.5"
            shift-v="-2"
          />
        </b-link>
        <b-button
          variant="danger"
          class="py-3 px-5"
          to="feedback"
        >
          Pridať feedback
        </b-button>
      </b-col>
    </b-row>
    <div
      class="cont-all"
      v-if="selectedTeacher"
    >
      <b-row class="mt-5">
        <b-col class="d-flex align-items-center">
          <img
            class="mb-4"
            :src="require(`@/assets/img/teacher.png`)"
            alt=""
          >
          <div class="my-auto ml-4">
            <p class="text-muted font-weight-bold">
              SPŠE Hálova
            </p>
            <h1 class="font-weight-bold">
              {{ selectedTeacher.name }} {{ selectedTeacher.surname }}
            </h1>
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
            content-class="mt-4"
            class="tabbs"
          >
            <b-tab
              title="Najnovšie feedbacky"
              active
            >
              <b-row>
                <b-col
                  class="pr-5 feeder"
                >
                  <b-list-group class="feedbacks">
                    <b-list-group-item
                      v-for="feedback in selectedTeacher.feedbacks"
                      :key="feedback.id"
                      class="d-flex align-items-center mb-4 border-0 shadow"
                    >
                      <img
                        class="mr-4"
                        :src="require(`@/assets/img/user.svg`)"
                        alt=""
                      >
                      <div class="p-2 mr-auto">
                        <div class="text-break">
                          <p class="text-secondary mb-0 font-weight-light">
                            5 minutes ago
                          </p> <h5 class="font-weight-bold">
                            Maros
                          </h5>
                          {{ feedback.feedback }}
                        </div>
                      </div>
                      <p class="font-weight-bold my-0 pr-2 pl-5">
                        {{ feedback.likes.length }}
                      </p>
                      <b-link @click="like(feedback)">
                        <b-icon-heart
                          variant="danger"
                          v-if="!feedback.likes.some((f) => +f.user_id === +user.id)"
                        />
                        <b-icon-heart-fill
                          variant="danger"
                          v-else
                        />
                      </b-link>
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
      user: 'getUser',
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
    like(feedback) {
      this.$store.dispatch('like', feedback);
    },
  },
};
</script>
<style lang="scss" scoped>
/* width */
::-webkit-scrollbar {
  width: 10px;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

.feeder {
  overflow: auto;
}

.icon-btn {
  background-color: white;
  border: none;
}

.feedback {
  height: calc(100vh - 365px);
  overflow-y: scroll;
  overflow-x: none;
  padding-right: 10px;
}
</style>
