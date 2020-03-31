<template>
  <div>
    <b-row>
      <b-col class="d-flex justify-content-end align-items-center">
        <p class="pr-5 my-auto">
          Odhlasemie z aplikacie
        </p>
        <b-button to="feedback">
          Pridat feedback
        </b-button>
      </b-col>
    </b-row>
    <b-row class="mt-5">
      <b-col class="d-flex align-items-center">
        <img
          src="https://via.placeholder.com/150/"
          class="mr-5"
        >
        <div class="my-auto">
          <h5>SPSE HALOVA</h5>
          <h1>Emilia Jancuskova</h1>
          <p>Predmety</p>
        </div>
      </b-col>
    </b-row>
    <b-row class="mt-5">
      <b-col>
        <b-tabs
          content-class="mt-3"
        >
          <b-tab
            title="First"
            active
          >
            <p>I'm the first tab</p>
          </b-tab>
          <b-tab title="Second">
            <p>I'm the second tab</p>
          </b-tab>
          <b-tab
            title="Disabled"
            disabled
          >
            <p>I'm a disabled tab!</p>
          </b-tab>
        </b-tabs>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: 'Teacher',
};
</script>

<style lang="scss" scoped>

</style>
