<template>
    <div>
      <label :class="[
        {disabled: disabled},
        inputClasses,
        {active: checked}
      ]" :for="cbId">
        <input class="hidden" :id="cbId" type="checkbox" name="oil" v-model="model">
        <slot></slot>
      </label>
    </div>
</template>
<script>
export default {
  name: 'base-checkbox',
  model: {
    prop: 'checked',
  },
  props: {
    checked: {
      type: [Array, Boolean],
      description: 'Whether checkbox is checked',
    },
    disabled: {
      type: Boolean,
      description: 'Whether checkbox is disabled',
    },
    inputClasses: {
      type: [String, Object, Array],
      description: 'Checkbox input classes',
    }
  },
  data() {
    return {
      cbId: '',
      touched: false,
    };
  },
  computed: {
    model: {
      get() {
        return this.checked;
      },
      set(check) {
        if (!this.touched) {
          this.touched = true;
        }
        this.$emit('input', check);
      },
    },
  },
  created() {
    this.cbId = Math.random()
      .toString(16)
      .slice(2);
  },
};
</script>
<style scoped>
  .hidden {
    display: none;
  }
</style>
