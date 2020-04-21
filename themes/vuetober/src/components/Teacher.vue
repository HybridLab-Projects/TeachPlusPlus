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
          to="/feedback"
        >
          Pridať feedback
        </b-button>
      </b-col>
    </b-row>
    <div
      class=""
      v-if="selectedTeacher.id"
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
                      v-for="feedback in sortedByDate"
                      :key="feedback.id"
                      class="d-flex flex-column align-items-end mb-4 border-0 shadow"
                    >
                      <div class="d-flex align-items-center w-100">
                        <img
                          class="mr-4 rounded-circle user-avatar"
                          :src="`https://avatars.dicebear.com/v2/avataaars/${feedback.author.email}.svg?options[mood][]=happy`"
                          alt=""
                        >
                        <div class="p-2 mr-auto">
                          <div class="text-break">
                            <p class="text-secondary mb-1 font-weight-light time">
                              {{ toTime(feedback.created_at) }} -
                              {{ feedback.subject.subject_name }}
                            </p>
                            <h6 class="font-weight-bold">
                              {{ feedback.author.username }}
                            </h6>
                            <div>
                              {{ feedback.feedback }}
                            </div>
                          </div>
                        </div>
                        <p class="font-weight-bold my-0 pr-2 pl-5">
                          {{ feedback.likes.length }}
                        </p>
                        <b-link @click="likeFeedback(feedback)">
                          <b-icon-heart
                            variant="danger"
                            v-if="!feedback.likes.some((f) => +f.user_id === +user.id)"
                          />
                          <b-icon-heart-fill
                            variant="danger"
                            v-else
                          />
                        </b-link>
                      </div>
                      <div class="d-flex">
                        <img
                          v-for="like in feedback.likes"
                          :key="like.id"
                          class="rounded-circle like-avatar ml-1"
                          :src="`https://avatars.dicebear.com/v2/avataaars/${like.user.email}.svg?options[mood][]=happy`"
                          alt=""
                        >
                      </div>
                    </b-list-group-item>
                  </b-list-group>
                </b-col>
              </b-row>
            </b-tab>
            <b-tab
              title="Zoradiť podľa počtu hlasov"
            >
              <b-row>
                <b-col
                  class="pr-5 feeder"
                >
                  <b-list-group class="feedbacks">
                    <b-list-group-item
                      v-for="feedback in sortedByLikes"
                      :key="feedback.id"
                      class="d-flex flex-column align-items-end mb-4 border-0 shadow"
                    >
                      <div class="d-flex align-items-center w-100">
                        <img
                          class="mr-4 rounded-circle user-avatar"
                          :src="`https://avatars.dicebear.com/v2/avataaars/${feedback.author.email}.svg?options[mood][]=happy`"
                          alt=""
                        >
                        <div class="p-2 mr-auto">
                          <div class="text-break">
                            <p class="text-secondary mb-1 font-weight-light time">
                              {{ toTime(feedback.created_at) }} -
                              {{ feedback.subject.subject_name }}
                            </p>
                            <h6 class="font-weight-bold">
                              {{ feedback.author.username }}
                            </h6>
                            <div>
                              {{ feedback.feedback }}
                            </div>
                          </div>
                        </div>
                        <p class="font-weight-bold my-0 pr-2 pl-5">
                          {{ feedback.likes.length }}
                        </p>
                        <b-link @click="likeFeedback(feedback)">
                          <b-icon-heart
                            variant="danger"
                            v-if="!feedback.likes.some((f) => +f.user_id === +user.id)"
                          />
                          <b-icon-heart-fill
                            variant="danger"
                            v-else
                          />
                        </b-link>
                      </div>
                      <div class="d-flex">
                        <img
                          v-for="like in feedback.likes"
                          :key="like.id"
                          class="rounded-circle like-avatar ml-1"
                          :src="`https://avatars.dicebear.com/v2/avataaars/${like.user.email}.svg?options[mood][]=happy`"
                          alt=""
                        >
                      </div>
                    </b-list-group-item>
                  </b-list-group>
                </b-col>
              </b-row>
            </b-tab>
          </b-tabs>
        </b-col>
      </b-row>
    </div>
    <div v-else>
      <b-row class="">
        <b-col class="d-flex align-items-center">
          <img
            class="mb-4 user-avatar rounded-circle"
            :src="`https://avatars.dicebear.com/v2/avataaars/${user.email}.svg?options[mood][]=happy`"
            alt=""
          >
          <div class="my-auto ml-4">
            <p class="text-muted font-weight-bold">
              SPŠE Hálova
            </p>
            <h1 class="font-weight-bold">
              Vitaj {{ user.name }} {{ user.surname }}
            </h1>
            <div class="d-flex align-items-center">
              <p class="text-muted my-auto mr-3">
                Vyber si učiteľa, ktorého feedbacky chceš prezerať!
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
    </div>
    <!--
    <b-row>
      <b-col>
        <p class="footer-text text-right text-muted pt-4">
          Sledujte nás na sociálnych sieťach
        </p>
      </b-col>
    </b-row>
-->
  </div>
</template>

<script>

import { mapGetters } from 'vuex';
import Moment from 'moment';

export default {
  name: 'Teacher',
  computed: {
    ...mapGetters({
      selectedTeacher: 'getSelectedTeacher',
      user: 'getUser',
    }),
    sortedByLikes() {
      return this.selectedTeacher.feedbacks.concat()
        .sort((a, b) => b.likes.length - a.likes.length
          || Moment(b.created_at).diff(Moment(a.created_at)));
    },
    sortedByDate() {
      return this.selectedTeacher.feedbacks.concat()
        .sort((a, b) => Moment(b.created_at).diff(Moment(a.created_at)));
    },
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
    likeFeedback(feedback) {
      this.$store.dispatch('like', feedback);
    },
    toTime(time) {
      Moment.locale('sk');
      return Moment(Moment.utc(time)).local().format('DD. MMMM YYYY, H:mm');
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

.time {
  font-size: 0.75em;
}

.feeder {
  overflow: auto;
}

.icon-btn {
  background-color: white;
  border: none;
}

.feedbacks {
  height: calc(100vh - 365px);
  overflow-y: scroll;
  overflow-x: none;
  padding-right: 10px;
}

.footer-text {
  font-size: 0.875rem;
  border-top: 1px #D7D7E8 solid;
}

.user-avatar {
  width: 64px;
}

.like-avatar {
  width: 32px;
}

</style>
