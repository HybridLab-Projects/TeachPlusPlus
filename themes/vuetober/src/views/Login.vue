<template>
  <b-container fluid>
    <b-row>
      <b-col
        class="my-auto input-column"
        cols="6"
      >
        <div class="testing">
          <h1 class="d-flex justify-content-center test2 mb-5">
            Prihlásenie
          </h1>
          <div class="d-flex justify-content-center">
            <ValidationObserver v-slot="{ passes }">
              <b-form @submit.enter.prevent="passes(onLogin)">
                <BTextInputWithValidation
                  rules="required"
                  type="text"
                  label=""
                  name="Používateľské meno"
                  v-model="user.username"
                  placeholder="Zadaj používateľské meno"
                  class=""
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

                <b-button
                  class="shadow font-weight-bold py-10 px-5 mt-5"
                  type="submit"
                  variant="danger"
                >
                  Odoslať
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
          </div>
        </div>
      </b-col>
      <div class="d-flex justify-content-center col-md-6 p-0 mb-5 cont_img">
        <img
          class="cont_img_pic"
          :src="require(`@/assets/img/Group.svg`)"
          alt
        >
      </div>
    </b-row>
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
        .then(() => this.$router.push('/teachers'))
        .catch((err) => { this.error = err.response.data.error; });
    },
  },
};
</script>

<style lang="scss" scoped>
  .test2 {
    color: #5352f6;
  }

  .cont_img {
    background: linear-gradient(45deg, #5352f6 0%, #8381fd 100%);
    border-radius: 150px 0px 150px 150px;
    z-index: -1;
  }

  .cont_img_pic {
    height: auto;
    width: 100%;
    transform: translateX(-40%) translateY(20%);
  }


  @media screen and (max-width: 768px) {
    .testing {
      margin-top: 5rem;
    }

    .cont_img_pic {
      display: none;
    }
  }

</style>
