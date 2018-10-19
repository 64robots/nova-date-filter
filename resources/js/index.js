import DatePicker from './components/DatePicker';
import FilterSelector from './components/FilterSelector';

Nova.booting((Vue, router) => {
    Vue.component('date-picker', DatePicker);
    Vue.component('filter-selector', FilterSelector);
});
