<template>
  <b-container
    fluid
    class="px-0"
  >
    <b-navbar
      toggleable="lg"
      type="danger"
      variant="light"
      fixed="top"
    >
      <b-navbar-brand
        to="/"
        class="brand"
      >
        <img
          :src="require(`@/assets/img/Logo.svg`)"
          alt=""
        >
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav
          class="ml-auto"
        >
          <p
            class="my-auto text-muted mr-3"
          >
            Ešte nemáš účet?
          </p>
          <b-nav-item
            to="register"
            v-if="!isLoggedIn"
          >
            <b-button
              variant="outline-primary font-weight-bold px-3"
              class="registracia_btn"
            >
              Registruj sa
            </b-button>
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
  .brand {
    color: #000;
  }

  .navbar-toggler-icon {
    color: black;
  }
</style>
