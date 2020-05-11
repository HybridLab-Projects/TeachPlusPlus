<template>
  <b-container
    fluid
  >
    <b-row class="vh-100">
      <b-col
        cols="3"
        xl="0"
        class="bg-all text-white d-none d-xl-block"
      >
        <FeedbackHelp />
      </b-col>
      <b-col
        cols="12"
        xl="9"
      >
        <FeedbackHelpSidebar class="d-inline d-xl-none fixed-top" />
        <div class="mt-4">
          <b-link
            :to="`/teachers/${this.getSelectedTeacher.id}`"
            class="d-flex justify-content-end mt-3"
          >
            <p class="text-muted my-auto mr-2 font-weight-bold">
              Vrátiť sa späť
            </p>
            <b-icon-x-circle-fill
              variant="secondary"
              font-scale="1.5"
            />
          </b-link>

          <div class="d-flex align-items-center">
            <div class="ml-0 ml-xl-5 mb-3 w-100">
              <b-row class="mt-3 mt-xl-0">
                <b-col
                  cols="0"
                  sm="2"
                  class="my-auto d-none d-sm-block"
                >
                  <b-icon-plus-circle-fill
                    font-scale="4"
                    shift-h="2.5"
                    variant="primary"
                  />
                </b-col>
                <b-col
                  cols="12"
                  sm="10"
                >
                  <h6 class="text-muted font-weight-bold text-center text-sm-left">
                    SPŠE Hálova
                  </h6>
                  <h1 class="font-weight-bold text-center text-sm-left">
                    Pridať feedback
                  </h1>
                  <p class="text-muted text-center text-sm-left">
                    Vyberte si učiteľa a predmet, ktorý vyučuje
                  </p>
                </b-col>
              </b-row>
              <ValidationObserver
                v-slot="{ passes }"
              >
                <b-form
                  class="mt-4"
                  @submit.enter.prevent="passes(createFeedback)"
                >
                  <div class="d-flex flex-wrap">
                    <BSelectWithValidation
                      rules="required"
                      name="Meno učiteľa"
                      class="flex-fill mx-3"
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
                      class="flex-fill mx-3 my-auto"
                      v-model="feedback.subjectId"
                      :disabled="feedback.teacherId === ''"
                      rules="required"
                      name="Názov predmetu"
                    >
                      <b-form-select-option :value="''">
                        Názov predmetu
                      </b-form-select-option>
                      <b-form-select-option
                        v-for="subject in getSelectedTeacher.subjects"
                        :key="subject.id"
                        :value="subject.id"
                      >
                        {{ subject.subject_name }}
                      </b-form-select-option>
                    </BSelectWithValidation>
                    <b-button
                      variant="danger"
                      type="submit"
                      class="px-3 flex-fill mx-3"
                    >
                      Odoslať feedback
                    </b-button>
                  </div>
                  <hr>

                  <BTextAreaWithValidation
                    id="textarea-rows"
                    placeholder="Feedback"
                    rows="8"
                    class="textfield mx-3"
                    v-model="feedback.feedback"
                    name="Feedback"
                    rules="required"
                  />
                </b-form>
              </ValidationObserver>
            </div>
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
import FeedbackHelp from '@/components/FeedbackHelp.vue';
import FeedbackHelpSidebar from '@/components/FeedbackHelpSidebar.vue';

export default {
  name: 'CreateFeedback',
  components: {
    BSelectWithValidation,
    BTextAreaWithValidation,
    ValidationObserver,
    FeedbackHelp,
    FeedbackHelpSidebar,
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
  },
  mounted() {
    this.feedback.teacherId = this.getSelectedTeacher.id || '';
  },
  watch: {
    // eslint-disable-next-line func-names
    'feedback.teacherId': function (newId) {
      this.$store.dispatch('selectTeacher', newId);
      this.feedback.subjectId = '';
    },
  },

};
</script>

<style lang="scss" scoped>
.bg-all {
  background-color: #5352f6;
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
