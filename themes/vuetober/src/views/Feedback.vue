<template>
  <b-container
    fluid
  >
    <b-row class="vh-100">
      <b-col
        cols="3"
        class="bg-primary text-white"
      >
        <h6>Napoveda</h6>
        <p>
          Ak si sa rozhodol napisat feedback na konkretneho ucitela,
          v klude sa mozes inspirovat touto sablonou.
        </p>
        <hr class="border-white">

        <p>
          Mily pan ucitel,<br>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Magni temporibus provident mollitia exercitationem in
          voluptatum ut assumenda iste consequuntur cum.
        </p>
      </b-col>
      <b-col>
        <div class="d-flex justify-content-end">
          <p>
            Nechcem dat feedback
          </p>
          <b-icon-x-circle-fill />
        </div>

        <b-icon-plus />
        <div>
          <h6>SPSE Halova</h6>
          <h1>Pridat feedback</h1>
          <p>Vyberte si ucitela a predmet, ktory vyucuje</p>
          <b-form inline>
            <b-form-select
              class="mb-2 mr-2 w-25"
              :options="[{ text: 'Choose...', value: null }, 'One', 'Two', 'Three']"
              :value="null"
            />
            <b-form-select
              class="mb-2 mr-2 w-25"
              :options="[{ text: 'Choose...', value: null }, 'One', 'Two', 'Three']"
              :value="null"
            />

            <b-button
              variant="danger"
              class="px-3 py-2"
              @click.prevent="createFeedback"
            >
              Odoslat feedback
            </b-button>
          </b-form>
          <hr>

          <b-form>
            <b-form-textarea
              id="textarea-rows"
              placeholder="Tall textarea"
              rows="8"
              v-model="feedback"
            />
          </b-form>
        </div>
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

</style>
