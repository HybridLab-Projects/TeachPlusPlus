<template>
  <div class="cont_all">
    <img
      class="cont_img"
      :src="require(`@/assets/img/Group.svg`)"
      alt
    >
    <div class="cont_forms text-white">
      <b-container class="text-left">
        <h1 class="mb-5">REGISTER</h1>
        <ValidationObserver
          v-slot="{ passes }"
        >
          <b-form @submit.enter.prevent="passes(onRegister)">
            <BTextInputWithValidation
              rules="required|alpha"
              type="text"
              label="Meno"
              name="Meno"
              v-model="user.name"
              placeholder="Zadaj meno"
            />

            <BTextInputWithValidation
              rules="required|alpha"
              type="text"
              label="Priezvisko"
              name="Priezvisko"
              v-model="user.surname"
              placeholder="Zadaj priezvisko"
            />

            <BTextInputWithValidation
              rules="required"
              type="text"
              label="Používateľské meno"
              name="Používateľské meno"
              v-model="user.username"
              placeholder="Zadaj používateľské meno"
            />

            <BTextInputWithValidation
              rules="required|email"
              type="text"
              label="Email"
              name="Email"
              v-model="user.email"
              placeholder="Zadaj email"
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

            <BTextInputWithValidation
              rules="required|min:8|confirmed:user.password"
              type="password"
              label="Potvrdenie hesla "
              name="Potvrdenie hesla"
              v-model="user.password_confirmation"
              placeholder="Potvrď heslo"
            />
            <BCheckboxWithValidation
              v-model="user.confirmation"
              :rules="{ required: { allowFalse: false } }"
            >
              Suhlas
            </BCheckboxWithValidation>

            <b-button
              type="submit"
              variant="danger"
              class="py-10 px-5 mt-5"
            >
              Submit
            </b-button>
            <b-alert
              show
              variant="danger"
              v-if="error"
              class="mt-3"
            >
              {{ error }}
            </b-alert>
          </b-form>
        </ValidationObserver>
      </b-container>
    </div>
  </div>
</template>

<script>
import BTextInputWithValidation from '@/components/inputs/BTextInputWithValidation.vue';
import BCheckboxWithValidation from '@/components/inputs/BCheckboxWithValidation.vue';
import { ValidationObserver } from 'vee-validate';

export default {
  name: 'Register',
  components: {
    BTextInputWithValidation,
    BCheckboxWithValidation,
    ValidationObserver,
  },
  data() {
    return {
      user: {
        name: '',
        surname: '',
        username: '',
        email: '',
        password: '',
        password_confirmation: '',
        confirmation: false,
      },
      error: '',
    };
  },
  methods: {
    onRegister() {
      this.error = '';
      const { user } = this;
      this.$store
        .dispatch('register', user)
        .then(() => this.$router.push('teachers'))
        .catch((err) => {
          this.error = err.response.data.error;
        });
    },
  },
};
</script>

<style lang="scss" scoped>
.cont_all {
  background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
  height: 130vh;
}

.cont_img {
  transform: translateX(80%) translateY(10rem);
  height: 80vh;
}

.cont_forms {
  transform: translateX(0%) translateY(-30rem);
}
</style>
