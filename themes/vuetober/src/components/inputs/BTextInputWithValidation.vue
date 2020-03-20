<template>
  <div class="input_form">
    <ValidationProvider
      :vid="vid"
      :name="$attrs.name"
      :rules="rules"
      v-slot="{ valid, errors }"
      mode="eager"
    >
      <b-form-group v-bind="$attrs">
        <b-form-input
          v-model="innerValue"
          v-bind="$attrs"
          :state="errors[0] ? false : (valid ? true : null)"
        />
        <b-form-invalid-feedback id="inputLiveFeedback">
          {{ errors[0] }}
        </b-form-invalid-feedback>
      </b-form-group>
    </ValidationProvider>
  </div>
</template>

<script>
import { ValidationProvider } from 'vee-validate';

export default {
  name: 'BTextInputWithValidation',
  components: {
    ValidationProvider,
  },
  props: {
    vid: {
      type: String,
      default: '',
    },
    rules: {
      type: [Object, String],
      default: '',
    },
    // must be included in props
    value: {
      type: null,
      required: true,
    },
  },
  data: () => ({
    innerValue: '',
  }),
  watch: {
    // Handles internal model changes.
    innerValue(newVal) {
      this.$emit('input', newVal);
    },
    // Handles external model changes.
    value(newVal) {
      this.innerValue = newVal;
    },
  },
  created() {
    if (this.value) {
      this.innerValue = this.value;
    }
  },
};
</script>

<style lang="scss" scoped>
  .input_form {
    width: 30vw;
  }
</style>
