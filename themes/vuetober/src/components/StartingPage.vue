<template>
  <b-container
    fluid
    class="ml-5 cont_all"
  >
    <div class="w-100">
      <img
        class="img_cont"
        :src="require(`@/assets/img/Group.svg`)"
        alt
      >
    </div>
    <div class="cont_text">
      <h1 class="display-4 mb-4 text-white">
        Čo je to,
        <strong>Teach++</strong>
      </h1>
      <p class="text-white">
        Loorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus erat.
        Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam. Nunc pretium tincidunt
        lacus, at consectetur ex.
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
.cont_all {
  height: 80vh;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 0px 150px;
  overflow: hidden;
}

.cont_text {
  position: absolute;
  top: 200px;
  min-width: 420px;
  max-width: 500px;
  margin-left: 150px;
}

.img_cont {
  margin-left: 50%;
  transform: translateX(-10%);
  height: 80vh;
}
</style>
