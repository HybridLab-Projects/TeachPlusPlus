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
          to="/teachers"
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
          <div class="ml-5 mb-3 w-100">
            <div class="row">
              <div class="col-md-2 my-auto">
                <b-icon-plus-circle-fill
                  font-scale="4"
                  shift-h="2.5"
                  variant="primary"
                />
              </div>
              <div class="col-md-10">
                <h6 class="text-muted font-weight-bold">
                  SPŠE Hálova
                </h6>
                <h1 class="font-weight-bold">
                  Pridať feedback
                </h1>
                <p class="text-muted">
                  Pridajte si učiteľa a predmet, ktorý vyučuje
                </p>
              </div>
            </div>
            <ValidationObserver
              v-slot="{ passes }"
            >
              <b-form
                class="mt-4"
                @submit.enter.prevent="passes(createFeedback)"
              >
                <div class="d-flex">
                  <BSelectWithValidation
                    rules="required"
                    name="Meno učiteľa"
                    class="flex-fill"
                    v-model="feedback.teacherId"
                  >
                    <b-form-select-option
                      :value="''"
                    >
                      Meno učiteľa
                    </b-form-select-option>
                    <b-form-select-option
                      v-for="teacher in getTeachers('')"
                      :key="teacher.id"
                      :value="teacher.id"
                    >
                      {{ teacher.name }}  {{ teacher.surname }}
                    </b-form-select-option>
                  </BSelectWithValidation>
                  <BSelectWithValidation
                    class="mr-2 form1 flex-fill mx-3"
                    v-model="feedback.subjectId"
                    :disabled="feedback.teacherId === ''"
                    rules="required"
                    name="Predmet"
                  >
                    <b-form-select-option :value="''">
                      Predmet
                    </b-form-select-option>
                    <b-form-select-option
                      v-for="subject in subjects"
                      :key="subject.id"
                      :value="subject.id"
                    >
                      {{ subject.subject_name }}
                    </b-form-select-option>
                  </BSelectWithValidation>
                  <b-button
                    variant="danger"
                    type="submit"
                    class="px-3 py-2 flex-fill mx-3"
                  >
                    Odoslať feedback
                  </b-button>
                </div>
                <hr>

                <BTextAreaWithValidation
                  id="textarea-rows"
                  placeholder="Feedback"
                  rows="8"
                  class="textfield"
                  v-model="feedback.feedback"
                  name="Feedback"
                  rules="required"
                />
              </b-form>
            </ValidationObserver>
          </div>
        </div>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import { mapGetters } from 'vuex';
import { ValidationObserver } from 'vee-validate';
import BSelectWithValidation from '@/components/inputs/BSelectWithValidation.vue';
import BTextAreaWithValidation from '@/components/inputs/BTextAreaWithValidation.vue';

export default {
  name: 'Feedback',
  components: {
    BSelectWithValidation,
    BTextAreaWithValidation,
    ValidationObserver,
  },
  data() {
    return {
      feedback: {
        feedback: '',
        teacherId: '',
        subjectId: '',
      },
    };
  },
  created() {
    this.$store.dispatch('fetchTeachers');
  },
  methods: {
    createFeedback() {
      this.$store.dispatch('createFeedback', this.feedback).then(() => {
        this.$router.push(`/teachers/${this.getSelectedTeacher.id}`).catch(() => {});
      });
    },
  },
  computed: {
    ...mapGetters([
      'getTeachers',
      'getSelectedTeacher',
    ]),
    subjects() {
      if (this.getSelectedTeacher.id) {
        return this.getSelectedTeacher.subjects.map((subject) => subject);
      }
      return [];
    },
  },
  mounted() {
    this.feedback.teacherId = this.getSelectedTeacher.id || '';
  },
  watch: {
    // eslint-disable-next-line func-names
    'feedback.teacherId': function (newId) {
      this.$store.dispatch('selectTeacher', newId);
    },
  },

};
</script>

<style lang="scss" scoped>
$purpleColor: #5352f6;

.bg-all {
  background-color: $purpleColor;
}

.form1 {
  background-color: #F4F5F8;
  border-radius: 0px;
  border: none;
}

.textfield {
  border-radius: 0px;
}
</style>
