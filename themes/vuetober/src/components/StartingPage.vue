<template>
  <b-container
    fluid
  >
    <div class="w-100">
      <img
        class="img_cont"
        :src="require(`@/assets/img/Group.svg`)"
        alt=""
      >
    </div>
    <div class="cont ml-5">
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
  .cont {
    position: absolute;
    top: 200px;
    min-width: 420px;
    max-width: 500px;
  }

  .img_cont {
    margin-left: 50%;
    transform: translateX(-20%);
    height: 80vh;
  }
</style>
