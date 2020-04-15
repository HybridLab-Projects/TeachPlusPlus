<template>
  <ValidationProvider
    ref="validator"
    :vid="vid"
    :name="$attrs.name"
    :rules="rules"
    v-slot="{ valid, errors }"
    mode="eager"
  >
    <b-form-group
      id="exampleInputGroup3"
      v-bind="$attrs"
    >
      <b-form-select
        id="exampleInput3"
        v-bind="$attrs"
        :state="errors[0] ? false : (valid ? true : null)"
        v-model="innerValue"
        class="addFeedback my-auto"
      >
        <slot />
      </b-form-select>
      <!-- <b-form-invalid-feedback id="inputLiveFeedback">
        {{ errors[0] }}
      </b-form-invalid-feedback> -->
    </b-form-group>
  </ValidationProvider>
</template>


<script>
import { ValidationProvider } from 'vee-validate';

export default {
  name: 'BSelectWithValidation',
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
      console.log(newVal);
      console.log(this.$refs.validator);
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
.addFeedback {
  border: none;
  border-radius: 1px;
  background-color: #F4F5F8;
}

.form1[data-v-65d59982] {
  background-color: #fff;
  border-radius: 0px;
  border: none;
}
</style>
