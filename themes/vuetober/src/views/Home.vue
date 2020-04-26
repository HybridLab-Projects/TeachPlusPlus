<template>
  <b-container
    fluid
    class="alll px-0 pl-5"
  >
    <b-row class="cont-color">
      <b-col
        cols="5"
        class="pl-5 justify-container-center"
      >
        <div
          class="content-container pl-5"
        >
          <h2
            class="display-4 header mb-4 text-white"
          >
            Čo je to, <strong>Teach++</strong>
          </h2>
          <p class="text-white popis">
            <strong>
              Zanechaj učiteľovi spätnú väzbu, vďaka ktorej bude hodina pre obe strany príjemnejšia!
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
      </b-col>
      <b-col
        cols="7"
        class="justify-content-center"
      >
        <img
          class="cont-img-pic"
          :src="require(`@/assets/img/Group.svg`)"
          alt
        >
      </b-col>
    </b-row>
    <b-row class="footer">
      <b-col>
        <p class="footer-text text-center text-muted mt-5">
          &copy; 2020 Všetky práva vyhradené <strong>TEACH++</strong>
        </p>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
export default {
  name: 'Home',
};
</script>

<style lang="scss" scoped>
.cont-color {
  height: 80vh auto;
  width: 95vw;
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  border-radius: 0px 0px 100px 10rem;
  position: absolute;
  z-index: -10;
}

.content-container {
  width: auto;
  padding-top: 10rem;
  padding-left: 0px;
  max-width: 550px;
  min-width: 430px;
  position: absolute;
  z-index: 100;
}

@media screen and (max-width: 1000px) {
  .content-container {
    padding-top: 5rem;
  }
}

@media screen and (max-width: 800px) {
  .content-container {
    .header {
      font-size: 3rem;
    }
  }
}

@media screen and (max-width: 700px) {
  .content-container {
    .header {
      font-size: 2rem;
    }

    .popis {
      width: 75%;
      font-size: 1rem;
      margin: 0;
    }
  }
}

.cont-img-pic {
  height: auto;
  width: 100%;
  transform: translateX(0%) translateY(20%);
}

.footer {
  position: absolute;
  top: 90vh;
}

.footer-text {
  font-size: 0.875rem;
}

.alll {
  overflow-x: none;
}
</style>
