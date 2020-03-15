<template>
  <b-container fluid>
    <div class="container ml-5">
      <h1
        class="display-4 mb-4"
      >
        Čo je to <strong>Teach++</strong>
      </h1>
      <p>
        Loorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus non lectus erat.
        Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
        Nunc pretium tincidunt lacus, at consectetur ex.
      </p>
      <b-button
        class="login_button"
        variant="danger"
      >
        Prihlás sa!
      </b-button>
    </div>
  </b-container>
</template>

<script>
export default {
  name: 'StartingPage',
};
</script>

<style lang="scss" scoped>
  .container {
    margin-top: 10rem;
    min-width: 420px;
    max-width: 500px;
  }
</style>
