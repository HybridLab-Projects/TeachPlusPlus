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
          src="https://placekitten.com/g/30/30"
          class="d-inline-block align-top"
          alt="Kitten"
        > Teach++
      </b-navbar-brand>

      <b-navbar-toggle target="nav-collapse" />

      <b-collapse
        id="nav-collapse"
        is-nav
      >
        <b-navbar-nav
          class="ml-auto"
        >
          <p class="registracka_text">
            Ešte nemáš účet?
          </p>
          <b-nav-item
            to="register"
            v-if="!isLoggedIn"
          >
            <b-button
              variant="outline-primary"
              class="registracia_btn"
            >
              Registrácia
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
.brand:hover {
  color: #000;
}

.registracka_text {
  margin: auto;
  color: #6F6E6E;
  font-weight: bolder;
}

.registracia_btn {
  margin: auto;
  color: #f23e6e;
  border-color: #f23e6e;
}

.registracia_btn:hover {
  color: #ffffff;
  background-color: #f23e6e;
}
</style>
