<template>
  <div class="row mt-5 test">
    <div class="d-flex justify-content-center col-md-6 text-dark cont_forms p-0 m-0">
      <div class="test">
        <h1 class="d-flex justify-content-center mt-5 mb-3 test2">
          Registrácia
        </h1>
        <ValidationObserver
          v-slot="{ passes }"
        >
          <b-form @submit.enter.prevent="passes(onRegister)">
            <BTextInputWithValidation
              rules="required|alpha"
              type="text"
              label=""
              name="Meno"
              v-model="user.name"
              placeholder="Zadaj meno"
            />

            <BTextInputWithValidation
              rules="required|alpha"
              type="text"
              label=""
              name="Priezvisko"
              v-model="user.surname"
              placeholder="Zadaj priezvisko"
            />

            <BTextInputWithValidation
              rules="required"
              type="text"
              label=""
              name="Používateľské meno"
              v-model="user.username"
              placeholder="Zadaj používateľské meno"
            />

            <BTextInputWithValidation
              rules="required|email"
              type="text"
              label=""
              name="Email"
              v-model="user.email"
              placeholder="Zadaj email"
            />

            <BTextInputWithValidation
              rules="required|min:8|upperCase|containsNumber"
              type="password"
              label=""
              name="Heslo"
              vid="user.password"
              v-model="user.password"
              placeholder="Zadaj heslo"
            />

            <BTextInputWithValidation
              rules="required|min:8|confirmed:user.password"
              type="password"
              label=""
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
              class="py-10 px-5"
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
      </div>
    </div>
    <div class="d-flex justify-content-center col-md-6 p-0 mb-5 cont_img">
      <img
        class="cont_img_pic"
        :src="require(`@/assets/img/Group.svg`)"
        alt
      >
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
  .cont_img {
    background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
    border-radius: 150px 0px 150px 150px;
  }

  .cont_img_pic {
    width: 45vw;
    transform: translateX(-40%) translateY(20%);
  }

  .test2 {
    color: #5352f6;
  }
</style>
