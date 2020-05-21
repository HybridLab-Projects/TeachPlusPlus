<template>
  <div class="pl-xl-5 test">
    <b-row class="mt-3">
      <b-col
        class="d-flex justify-content-between justify-content-md-end
      align-items-center mb-3 mb-xl-0"
      >
        <b-button
          variant="danger"
          class="py-xl-3 px-xl-5 py-2"
          to="/feedback"
        >
          <b-icon-bookmark-plus />
          Pridať feedback
        </b-button>
        <b-link
          class="pl-3 pl-xl-5 my-auto text-muted font-weight-bold"
          @click="logout"
        >
          <b-icon-box-arrow-right
            font-scale="1.5"
            shift-v="-2"
          />
          Odhlásiť sa
        </b-link>
      </b-col>
    </b-row>
    <div
      v-if="selectedTeacher.id"
    >
      <b-row class="mt-5">
        <b-col class="d-flex align-items-center">
          <b-avatar
            class="mb-4 avatar-teacher"
            :src="require(`@/assets/img/teacher.png`)"
            variant="light"
            size="5rem"
          />
          <div class="my-auto ml-4">
            <p class="text-muted font-weight-bold">
              SPŠE Hálova
            </p>
            <h1 class="font-weight-bold text-wrap">
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
            <b-button
              class="mt-3 bg-info d-xl-none d-block"
              v-b-toggle.sidebar-search
            >
              <b-icon-person /> Zobraziť učiteľov
            </b-button>
          </div>
        </b-col>
      </b-row>
      <b-row
        class="mt-5"
        id="tooltip"
      >
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
                  class=""
                >
                  <b-list-group class="feedbacks">
                    <FeedbackItem
                      v-for="feedback in sortedByDate"
                      :feedback="feedback"
                      :key="feedback.id"
                      :user="user"
                    />
                  </b-list-group>
                </b-col>
              </b-row>
            </b-tab>
            <b-tab
              title="Počet hlasov"
            >
              <b-row>
                <b-col
                  class=""
                >
                  <b-list-group class="feedbacks">
                    <FeedbackItem
                      v-for="feedback in sortedByLikes"
                      :feedback="feedback"
                      :key="feedback.id"
                      :user="user"
                    />
                  </b-list-group>
                </b-col>
              </b-row>
            </b-tab>
          </b-tabs>
        </b-col>
      </b-row>
    </div>
    <div v-else>
      <b-row>
        <b-col class="d-flex align-items-center">
          <b-avatar
            class="mb-4 avatar-user"
            :src="`https://avatars.dicebear.com/v2/avataaars/${user.username}.svg?options[mood][]=happy`"
            variant="light"
            size="5rem"
          />
          <div class="my-auto ml-4">
            <p class="text-muted font-weight-bold">
              SPŠE Hálova
            </p>
            <h1 class="font-weight-bold">
              Vitaj {{ user.username }}
            </h1>
            <div class="d-flex align-items-center">
              <p class="text-muted my-auto mr-3">
                Vyber si učiteľa, ktorého feedbacky chceš prezerať!
              </p>
            </div>
            <b-button
              class="mt-3 bg-info d-xl-none d-block"
              v-b-toggle.sidebar-search
            >
              <b-icon-person /> Zobraziť učiteľov
            </b-button>
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
import FeedbackItem from '@/components/FeedbackItem.vue';

export default {
  name: 'Teacher',
  components: {
    FeedbackItem,
  },
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

.test {
  background-color: #f8f5f3;
}

.name {
  min-width: 800px;
}


.feedbacks {
  height: calc(100vh - 390px);
  overflow-y: scroll;
  overflow-x: none;
  padding-right: 10px;

}

.footer-text {
  font-size: 0.875rem;
  border-top: 1px #D7D7E8 solid;
}

.avatar-teacher, .avatar-user {
  min-width: 80px;
}
</style>
