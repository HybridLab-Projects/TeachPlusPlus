<template>
  <b-container
    fluid
    class="px-0"
  >
    <b-navbar
      toggleable="lg"
      type="danger"
      variant="light"
    >
      <b-navbar-brand
        to="/"
        class="brand"
      >
        <img
          :src="require(`@/assets/img/Logo.svg`)"
          alt=""
          class="w-50"
        >
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav
          class="ml-auto"
          v-if="this.$route.path !== '/register'"
        >
          <p
            class="my-auto text-muted mr-3 font-weight-bold"
          >
            Ešte nemáš účet?
          </p>
          <b-nav-item
            to="/register"
          >
            <b-button
              variant="outline-primary"
              class="font-weight-bold px-3 custombtn"
            >
              Registruj sa
            </b-button>
          </b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav
          class="ml-auto action"
          v-else
        >
          <p
            class="my-auto text-muted mr-3 font-weight-bold"
          >
            Máš už účet?
          </p>
          <b-nav-item
            to="/login"
          >
            <b-button
              variant="outline-primary"
              class="font-weight-bold px-3 custombtn"
            >
              Prihlás sa
            </b-button>
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </b-container>
</template>

<script>

export default {
  name: 'NavBar',
};
</script>

<style lang="scss" scoped>
@media screen and (max-width: 1100px) {
  .custombtn {
    margin-right: 9rem;
  }
}

.brand {
  color: #000;
}

.navbar-toggler-icon {
  color: #000;
}
</style>
