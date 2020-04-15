<template>
  <b-container
    fluid
    class="alll px-0 pl-5"
  >
    <div class="row cont-color">
      <div class="col-lg-5 pl-5">
        <div class="content-container pl-5">
          <h2 class="display-4 mb-4 text-white">
            Čo je to, <strong class="display-4">Teach++</strong>
          </h2>
          <p class="text-white">
            <strong>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut soluta voluptatem exceptu
              ri nihil consequuntur, eveniet lau
            </strong>
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
      </div>
      <div class="col-lg-7 justify-content-center">
        <img
          class="cont-img-pic"
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
.cont-color {
  height: 80vh;
  width: 97.5vw;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 0px 10rem;
  position: absolute;
  z-index: -10;
}

.content-container {
  padding-top: 10rem;
  padding-left: 0px;
  max-width: 500px;
  min-width: 430px;
  position: absolute;
  z-index: 100;
}

.cont-img-pic {
  height: 80vh;
  transform: translateX(0%) translateY(20%);
}
</style>
