<template>
  <b-container>
    <h1>LOGIN</h1>
    <ValidationObserver v-slot="{ passes }">
      <b-form @submit.enter.prevent="passes(onLogin)">
        <BTextInputWithValidation
          rules="required"
          type="text"
          label="Používateľské meno"
          name="Používateľské meno"
          v-model="user.username"
          placeholder="Zadaj používateľské meno"
        />

        <BTextInputWithValidation
          rules="required|min:8|upperCase|containsNumber"
          type="password"
          label="Heslo"
          name="Heslo"
          vid="user.password"
          v-model="user.password"
          placeholder="Zadaj heslo"
        />

        <b-button
          type="submit"
          variant="primary"
        >
          Submit
        </b-button>
        <b-alert
          show
          variant="danger"
          v-if="error"
        >
          {{ error }}
        </b-alert>
      </b-form>
    </ValidationObserver>
  </b-container>
</template>

<script>
import BTextInputWithValidation from '@/components/inputs/BTextInputWithValidation.vue';
import { ValidationObserver } from 'vee-validate';

export default {
  name: 'Login',
  components: {
    BTextInputWithValidation,
    ValidationObserver,
  },
  data() {
    return {
      user: {
        username: '',
        password: '',
      },
      error: '',
    };
  },
  methods: {
    onLogin() {
      this.error = '';
      const { user } = this;
      this.$store.dispatch('login', user)
        .then(() => console.log('logged in'))
        .catch((err) => { this.error = err.response.data.error; });
    },
  },
};
</script>

<style lang="scss" scoped>

</style>
