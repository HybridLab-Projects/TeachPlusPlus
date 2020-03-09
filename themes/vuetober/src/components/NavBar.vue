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
        <b-navbar-nav
          class="ml-auto"
        >
          <b-nav-item
            to="register"
            v-if="!isLoggedIn"
          >
            Registrácia
          </b-nav-item>

          <b-nav-item
            to="login"
            v-if="!isLoggedIn"
          >
            Prihlásenie
          </b-nav-item>
          <b-nav-item
            @click="logout"
            v-if="isLoggedIn"
          >
            Odhlásiť
          </b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </b-container>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
  name: 'NavBar',
  computed: {
    ...mapGetters([
      'isLoggedIn',
    ]),
  },
  methods: {
    logout() {
      this.$store.dispatch('logout')
        .then(() => this.$router.push('/'))
        .catch((err) => console.log(err.response.data.error));
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
