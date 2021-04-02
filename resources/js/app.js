/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

 //const files = require.context('./', true, /\.vue$/i)
 //files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('max-expenditure', require('./components/MaxExpenditureComponent.vue').default);
Vue.component('min-expenditure', require('./components/MinExpenditureComponent.vue').default);
Vue.component('last-expenditure', require('./components/LastExpenditureComponent.vue').default);
Vue.component('annual-expenditures', require('./components/AnnualExpendituresComponent.vue').default);
Vue.component('expenditure-location-count', require('./components/ExpenditureLocationCountComponent.vue').default);
Vue.component('current-month-expenditure', require('./components/CurrentMonthExpenditureComponent.vue').default);
Vue.component('category-expenditures', require('./components/CategoryExpendituresComponent.vue').default);
Vue.component('all-expenditures', require('./components/AllExpendituresComponent.vue').default);
Vue.component('create-expenditure', require('./components/CreateExpenditureComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
