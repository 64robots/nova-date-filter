<template>
  <input
    class="w-full form-control form-input form-input-bordered"
    :disabled="optionsdisabled"
    :class="{'!cursor-not-allowed': disabled}"
    :value="value"
    ref="datePicker"
    type="text"
    :placeholder="placeholder"
  >
</template>
<script>
import flatpickr from 'flatpickr'
import '../../airbnb-modified.css'

export default {
  props: {
    value: {
      type: String,
      default: ''
    },
    filter: {
      type: Object,
      default: () => ({})
    }
  },

  data: () => ({ flatpickr: null }),

  computed: {
    placeholder() {
      return this.getOption('placeholder') || this.__('Pick a date')
    },

    disabled() {
      return this.getOption('disabled')
    },

    dateFormat() {
      return this.getOption('dateFormat') || 'Y-m-d H:i:S'
    },

    twelveHourTime() {
      return this.getOption('twelveHourTime')
    },

    enableTime() {
      return this.getOption('enableTime')
    },

    enableSeconds() {
      return this.getOption('enableSeconds')
    }
  },

  mounted() {
    const self = this
    this.$nextTick(() => {
      this.flatpickr = flatpickr(this.$refs.datePicker, {
        enableTime: this.enableTime,
        enableSeconds: this.enableSeconds,
        onClose: this.onChange,
        onChange: this.onChange,
        dateFormat: this.dateFormat,
        allowInput: true,
        static: true,
        time_24hr: !this.twelveHourTime,
        onReady() {
          self.$refs.datePicker.parentNode.classList.add('date-filter')
        }
      })
      const wrapper = document.querySelector('.dropdown-menu div')
      wrapper.classList.remove('overflow-hidden')
    })
  },

  methods: {
    getOption(name) {
      const option = this.filter.options.find(o => o.name === name)
      if (!option) return false
      return option.value
    },

    onChange(event) {
      this.$emit('input', this.$refs.datePicker.value)
    }
  }
}
</script>
<style scoped>
.\!cursor-not-allowed {
  cursor: not-allowed !important;
}
</style>
