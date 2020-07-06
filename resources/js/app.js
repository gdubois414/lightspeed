require('./bootstrap');

// Standard Vue/Laravel set up
window.Vue = require('vue');

if (process.env.MIX_APP_ENV === 'production') {
    Vue.config.devtools = false;
    Vue.config.debug = false;
    Vue.config.silent = true;
}
else{
    Vue.config.devtools = true;
    Vue.config.debug = true;
}

//Create a filter to properly capitalize names and proper nouns.
Vue.filter('capitalize', function (value) {
    if (!value) return ''
    value = value.toString()
    return value.charAt(0).toUpperCase() + value.slice(1)
})

import AppComponent from './components/AppComponent.vue';

const app = new Vue({
    el: '#app',
    components: {AppComponent},
    render: h => h(AppComponent)
});
