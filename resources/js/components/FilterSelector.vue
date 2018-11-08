<template>
  <div>
    <filter-select
      v-for="filter in filters"
      :key="filter.name"
    >
      <h3
        slot="default"
        class="text-sm uppercase tracking-wide text-80 bg-30 p-3"
      >
        {{ filter.name }}
      </h3>
      <template slot="select">
        <div
          v-if="filter.customComponent"
          :is="filter.component"
          :filter="filter"
          v-model="filter.currentValue"
          @input="filterChanged(filter)"
        >
        </div>
        <select-filter
          v-else
          slot="select"
          :filter="filter"
          v-model="filter.currentValue"
          @change="filterChanged(filter)"
        />
      </template>
    </filter-select>
  </div>
</template>

<script>
export default {
  props: ['filters', 'currentFilters'],

  /**
   * Mount the component.
   */
  mounted() {
    this.current = this.currentFilters
    console.log('ola')
  },

  methods: {
    /**
     * Handle a filter selection change.
     */
    filterChanged(filter) {
      let newCurrent = _.reject(
        this.currentFilters,
        f => f.class == filter.class
      )

      if (filter.currentValue !== '') {
        newCurrent.push({
          class: filter.class,
          value: filter.currentValue
        })
      }

      this.$emit('update:currentFilters', newCurrent)
      this.$emit('changed', newCurrent)
    }
  }
}
</script>
