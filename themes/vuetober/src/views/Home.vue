<template>
  <b-container
    fluid
    class="px-0 pl-5"
  >
    <div class="cont-color pl-5">
      <div class="content-container pl-5">
        <h1 class="display-4 mb-4 text-white">
          Čo je to <strong>Teach++</strong>
        </h1>
        <p class="text-white">
          Loorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus erat.
          Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
          Nunc pretium tincidunt lacus, at consectetur ex.
        </p>
        <b-button
          class="shadow font-weight-bold px-5 py-3 mt-3"
          size="lg"
          variant="danger"
          to="/login"
        >
          Prihlásiť sa
        </b-button>
      </div>
      <div class="cont" />
    </div>
  </b-container>
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style lang="scss" scoped>

.cont {
  top: 0;
  background: url('~@/assets/img/Group.svg') no-repeat;
  background-position: 75% 100%;
  height: 98vh;
  width: 95vw;
  position: absolute;
  z-index: -1;
}

.cont-color {
  height: 80vh;
  width: 97.5vw;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 0px 10rem;
  position: absolute;
  z-index: -10;
}

.content-container {
  padding-top: 15rem;
  max-width: 500px;
  min-width: 430px;
  position: absolute;
  z-index: 100;
}
</style>
