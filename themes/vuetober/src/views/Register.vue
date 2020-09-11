<template>
  <b-container fluid>
    <b-row class="mt-5">
      <b-col
        class="d-flex justify-content-center my-auto text-dark"
        cols="12"
        md="6"
      >
        <div class="test">
          <h1 class="d-flex justify-content-center mb-3 test2">
            Registrácia
          </h1>
          <ValidationObserver
            v-slot="{ passes }"
          >
            <b-form @submit.enter.prevent="passes(onRegister)">
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
                v-model="user.password"
                placeholder="Zadaj heslo"
              />

              <BCheckboxWithValidation
                v-model="user.agree"
                :rules="{ required: { allowFalse: false } }"
              >
                Súhlas
              </BCheckboxWithValidation>

              <b-button
                type="submit"
                variant="danger"
                class="py-10 px-5 mt-3"
              >
                Odoslať
              </b-button>
            </b-form>
          </ValidationObserver>
          <b-alert
            show
            variant="danger"
            v-if="error"
            class="mt-3"
          >
            {{ error }}
          </b-alert>
        </div>
      </b-col>
      <b-col
        class="d-flex justify-content-center p-0 mb-5 d-none d-md-block"
        cols="0"
        md="6"
      >
        <div class="cont_img d-none d-md-block">
          <img
            class="cont_img_pic d-none d-md-block"
            :src="require(`@/assets/img/Group.svg`)"
            alt
          >
        </div>
      </b-col>
    </b-row>
  </b-container>
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
        username: '',
        email: '',
        password: '',
        password_confirmation: '',
        agree: false,
      },
      error: '',
    };
  },
  methods: {
    onRegister() {
      this.error = '';
      const { user } = this;
      user.password_confirmation = user.password;
      this.$store
        .dispatch('register', user)
        .then(() => this.$router.push('/teachers'))
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
    z-index: -1;
  }

  .cont_img_pic {
    height: auto;
    width: 100%;
    transform: translateX(-25%) translateY(15%);
  }

  .test2 {
    color: #5352f6;
  }
</style>
