<template>
  <input
    :disabled="optionsdisabled"
    :class="{'!cursor-not-allowed': options.disabled}"
    :value="value"
    ref="datePicker"
    type="text"
    :placeholder="options.placeholder"
  >
</template>
<script>
import flatpickr from 'flatpickr';
import 'flatpickr/dist/themes/airbnb.css';

export default {
  props: {
    value: {
      type: String,
      default: ''
    },
    options: {
      type: Object,
      default: () => ({
        placeholder: moment().format('YYYY-MM-DD kk:mm:ss'),
        disabled: false,
        dateFormat: 'Y-m-d H:i:S',
        twelveHourTime: false,
        enableTime: true,
        enableSeconds: true
      })
    }
  },

  data: () => ({ flatpickr: null }),

  mounted() {
    this.$nextTick(() => {
      this.flatpickr = flatpickr(this.$refs.datePicker, {
        enableTime: this.options.enableTime,
        enableSeconds: this.options.enableSeconds,
        onClose: this.onChange,
        dateFormat: this.options.dateFormat,
        allowInput: true,
        time_24hr: !this.options.twelveHourTime
      });
    });
  },

  methods: {
    onChange(event) {
      this.$emit('change', this.$refs.datePicker.value);
    }
  }
};
</script>
<style scoped>
.\!cursor-not-allowed {
  cursor: not-allowed !important;
}
</style>