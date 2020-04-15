<template>
  <b-container
    fluid
  >
    <b-row class="vh-100">
      <b-col
        cols="3"
        class="bg-all text-white"
      >
        <div class="pl-3">
          <div class="pt-5">
            <h6 class="my-5 font-weight-bold">
              Nápoveda
            </h6>
          </div>
          <p class="mb-5 pb-3">
            Ak si sa rozhodol napísať feedback na konkrétneho učiteľa,
            v kľude sa môžeš inšpirovať touto šablónou.
          </p>
        </div>
        <hr class="border-white">
        <div class="pl-3">
          <p class="mt-5 pt-5">
            Milý pán učiteľ,<br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Magni temporibus provident mollitia exercitationem in
            voluptatum ut assumenda iste consequuntur cum.
          </p>
        </div>
      </b-col>
      <b-col
        cols="9"
        class="mt-4"
      >
        <b-link
          to="teachers"
          class="d-flex justify-content-end mt-3"
        >
          <p class="text-muted my-auto mr-2 font-weight-bold">
            Nechcem dať feedback
          </p>
          <b-icon-x-circle-fill
            variant="secondary"
            font-scale="1.5"
          />
        </b-link>

        <div class="d-flex align-items-center">
          <b-icon-plus-circle-fill
            font-scale="5"
            shift-h="2.5"
            variant="primary"
          />
          <div class="ml-5 mb-3 w-100">
            <h6 class="text-muted font-weight-bold">
              SPŠE Hálova
            </h6>
            <h1 class="font-weight-bold">
              Pridať feedback
            </h1>
            <p class="text-muted">
              Pridajte si učiteľa a predmet, ktorý vyučuje
            </p>
            <b-form
              inline
              class="mt-4"
            >
              <b-form-select
                class="mr-2 form1"
                v-model="feedback.teacherId"
              >
                <b-form-select-option :value="0">
                  Meno učiteľa
                </b-form-select-option>
                <b-form-select-option
                  v-for="teacher in getTeachers('')"
                  :key="teacher.id"
                  :value="teacher.id"
                >
                  {{ teacher.name }}  {{ teacher.surname }}
                </b-form-select-option>
              </b-form-select>
              <b-form-select
                class="mr-2 form1"
                v-model="feedback.subjectId"
                :disabled="feedback.teacherId === 0"
              >
                <b-form-select-option :value="0">
                  Predmet
                </b-form-select-option>
                <b-form-select-option
                  v-for="subject in subjects[feedback.teacherId-1]"
                  :key="subject.id"
                  :value="subject.id"
                >
                  {{ subject.subject_name }}
                </b-form-select-option>
              </b-form-select>
              <b-button
                variant="danger"
                class="px-3 py-2"
                @click.prevent="createFeedback"
              >
                Odoslať feedback
              </b-button>
            </b-form>
          </div>
        </div>
        <hr>

        <b-form>
          <b-form-textarea
            id="textarea-rows"
            placeholder="Tall textarea"
            rows="8"
            class="textfield"
            v-model="feedback.feedback"
          />
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
  name: 'Feedback',
  data() {
    return {
      feedback: {
        feedback: '',
        teacherId: '0',
        subjectId: '0',
      },
    };
  },
  created() {
    this.$store.dispatch('fetchTeachers');
  },
  methods: {
    createFeedback() {
      this.$store.dispatch('createFeedback', this.feedback).then(() => {
        this.$router.push('teachers');
      });
    },
  },
  computed: {
    ...mapGetters([
      'getTeachers',
      'getSelectedTeacher',
    ]),
    subjects() {
      return this.getTeachers('').map((teacher) => teacher.subjects);
    },
  },
  mounted() {
    this.feedback.teacherId = this.getSelectedTeacher.id || 0;
  },

};
</script>

<style lang="scss" scoped>
$purpleColor: #5352f6;
.bg-all {
  background-color: $purpleColor;
}

.form1 {
  width: 30%;
  background-color: #F4F5F8;
  border-radius: 0px;
  border: none;
}

.textfield {
  border-radius: 0px;
}
</style>
