<template>
  <div>
    <ValidationProvider
      :vid="vid"
      :name="$attrs.name"
      :rules="rules"
      v-slot="{ valid, errors }"
      mode="eager"
    >
      <b-form-group
        v-bind="$attrs"
      >
        <b-form-input
          v-model="innerValue"
          v-bind="$attrs"
          :state="errors[0] ? false : (valid ? true : null)"
          class="mb-3 mt-0"
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
  input.form-control[type=text]:focus:not([readonly]),
  input.form-control[type=password]:focus:not([readonly]) {
    border-bottom: 1px solid #5352f6;
    box-shadow: 0 1px 0 0 #5352f6;
    border-radius: 0;
  }

  input {
    border: none;
    border-radius: 0;
    border-bottom: 1px solid gray;
    box-shadow: none;
  }
</style>
