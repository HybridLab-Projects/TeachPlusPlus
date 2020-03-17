<template>
  <div class="pl-5 cont">
    <b-container
      fluid
      class="cont_all"
    >
      <div class="cont_text">
        <h1 class="display-4 mb-4 text-white">
          Čo je to,
          <strong>Teach++</strong>
        </h1>
        <p class="text-white">
          Loorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lectus erat.
          Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
          Nunc pretium tincidunt lacus, at consectetur ex.
        </p>
        <b-button
          class="login_button shadow font-weight-bold px-5 py-3"
          size="lg"
          variant="danger"
        >
          Prihlásiť sa
        </b-button>
      </div>
    </b-container>
  </div>
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style lang="scss" scoped>

.cont {
  background: url('~@/assets/img/Group.svg') no-repeat right 15rem;
  height: 100vh;
}

.cont_all {
  height: 80vh;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 0px 10rem;
  position: relative;
  z-index: -1;
}

.cont_text {
  min-width: 420px;
  max-width: 500px;
  margin-left: 10rem;
  padding-top: 20rem;
}

// .img_cont {
//   transform: translateX(40%) translateY(15rem);
//   height: 70%;
// }
</style>
