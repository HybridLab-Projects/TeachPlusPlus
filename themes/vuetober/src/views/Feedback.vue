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
        <div class="d-flex justify-content-end mt-3">
          <p class="text-muted my-auto mr-2 font-weight-bold">
            Nechcem dať feedback
          </p>
          <img
            :src="require(`@/assets/img/Cross.png`)"
            alt="x"
          >
        </div>
        <div class="d-flex align-items-center">
          <img
            :src="require(`@/assets/img/feedplus.png`)"
            alt="+"
          >
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
                :options="[{ text: 'Choose...', value: null }, 'One', 'Two', 'Three']"
                :value="null"
              />
              <b-form-select
                class="mr-2 form1"
                :options="[{ text: 'Choose...', value: null }, 'One', 'Two', 'Three']"
                :value="null"
              />
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
            v-model="feedback"
          />
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: 'Feedback',
  data() {
    return {
      teacherId: 2,
      feedback: '',
    };
  },
  methods: {
    createFeedback() {
      const { teacherId, feedback } = this;
      this.$store.dispatch('createFeedback', { teacherId, feedback }).finally(() => {
        this.$router.push('teachers');
      });
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
  width: 30%;
  background-color: #F4F5F8;
  border-radius: 0px;
  border: none;
}

.textfield {
  border-radius: 0px;
}
</style>
