<template>
  <b-container
    fluid
    class="px-0"
  >
    <b-navbar
      toggleable="lg"
      type="dark"
      variant="info"
    >
      <b-navbar-brand to="/">
        Teach++
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav class="ml-auto">
          <b-nav-item to="register">
            Registrácia
          </b-nav-item>

          <b-nav-item
            to="login"
          >
            Prihlásenie
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

</style>
