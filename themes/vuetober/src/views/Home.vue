<template>
  <b-container
    fluid
    class="alll px-0 pl-5"
  >
    <div class="row cont_color">
      <div class="col-md-5 pl-5">
        <div class="content_container pl-5">
          <h1 class="display-4 mb-4 text-white">
            Čo je to, <strong>Teach++</strong>
          </h1>
          <p class="text-white">
            <strong>
              Loorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus erat.
              Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
              Nunc pretium tincidunt lacus, at consectetur ex.
            </strong>
          </p>
          <b-button
            class="shadow font-weight-bold px-5 py-3 mt-3"
            size="lg"
            variant="danger"
          >
            Prihlásiť sa
          </b-button>
        </div>
      </div>
      <div class="col-md-7 justify-content-center">
        <img
          class="cont_img_pic"
          :src="require(`@/assets/img/Group.svg`)"
          alt
        >
      </div>
    </div>
  </b-container>
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style lang="scss" scoped>
.cont_color {
  height: 80vh;
  width: 97.5vw;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 0px 10rem;
  position: absolute;
  z-index: -10;
}

.content_container {
  padding-top: 15rem;
  max-width: 500px;
  min-width: 430px;
  position: absolute;
  z-index: 100;
}

.cont_img_pic {
  height: 80vh;
  transform: translateX(0%) translateY(20%);
}
</style>
