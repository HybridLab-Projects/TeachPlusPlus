<template>
  <div class="container_uvodstr">
    <b-container>
      <div class="container_info">
        <h1
          class="uvodstr_nadpis"
        >
          Čo je to Teach++
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
  </div>
</template>

<script>
export default {
  name: 'StartingPage',
};
</script>

<style lang="scss" scoped>
  .container {
    margin-left: 50px;
  }

  .container_uvodstr {
    display: table-cell;
    vertical-align: middle;
    width: 100vw;
  }

  .container_info {
    width: 40vw;
  }

  .uvodstr_nadpis {
    margin-bottom: 30px;
  }

  .login_button {
    color: #ffffff;
    border-color: #f23e6e;
  }
</style>
