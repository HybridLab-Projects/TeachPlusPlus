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
              Napoveda
            </h6>
          </div>
          <p class="mb-5 pb-3">
            Ak si sa rozhodol napisat feedback na konkretneho ucitela,
            v klude sa mozes inspirovat touto sablonou.
          </p>
        </div>
        <hr class="border-white">
        <div class="pl-3">
          <p class="mt-5 pt-5">
            Mily pan ucitel,<br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Magni temporibus provident mollitia exercitationem in
            voluptatum ut assumenda iste consequuntur cum.
          </p>
        </div>
      </b-col>
      <b-col cols="9">
        <div class="d-flex justify-content-end m-3">
          <p class="text-secondary mr-3 py-auto">
            <strong class="pt-5">
              Nechcem dat feedback
            </strong>
          </p>
          <img
            :src="require(`@/assets/img/Cross.png`)"
            alt=""
          >
        </div>
        <b-col class="d-flex align-items-center">
          <img
            :src="require(`@/assets/img/feedplus.png`)"
            alt=""
          >
          <div class="ml-5 mb-3 col-md-9">
            <h5 class="text-secondary">
              <strong>SPSE Halova</strong>
            </h5>
            <h1><strong>Pridat feedback</strong></h1>
            <p class="text-secondary">
              Pridajte si ucitela a predmet, ktory vyucuje
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
                class="px-4 py-2"
              >
                Odoslat feedback
              </b-button>
            </b-form>
          </div>
        </b-col>
        <hr>

        <b-form>
          <b-form-textarea
            id="textarea-rows"
            placeholder="Tall textarea"
            rows="8"
          />
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: 'Feedback',
};
</script>

<style lang="scss" scoped>
$purpleColor: #5352f6;
.bg-all {
  background-color: $purpleColor;
}

.form1 {
  width: 30%;
}
</style>
