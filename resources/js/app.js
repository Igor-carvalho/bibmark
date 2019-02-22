
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

let token = document.head.querySelector('meta[name="csrf-token"]');
window.Vue = require('vue');
window.axios = require('axios');
Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('account-list', require('./pages/account/AccountList.vue'));
Vue.component('account-edit', require('./pages/account/AccountEdit.vue'));
Vue.component('account-show', require('./pages/account/AccountShow.vue'));
Vue.component('account-detail-page', require('./pages/account/AccountDetailPage.vue'));

Vue.component('charity-list', require('./pages/charity/CharityList.vue'));
Vue.component('charity-edit', require('./pages/charity/CharityEdit.vue'));
Vue.component('charity-show', require('./pages/charity/CharityShow.vue'));
Vue.component('charity-detail-page', require('./pages/charity/CharityDetailPage.vue'));

Vue.component('event-list', require('./pages/event/EventList.vue'));
Vue.component('event-edit', require('./pages/event/EventEdit.vue'));
Vue.component('event-show', require('./pages/event/EventShow.vue'));
Vue.component('event-detail-page', require('./pages/event/EventDetailPage.vue'));

Vue.component('user-list', require('./pages/user/UserList.vue'));
Vue.component('user-edit', require('./pages/user/UserEdit.vue'));

Vue.component('product-list', require('./pages/product/ProductList.vue'));
Vue.component('product-edit', require('./pages/product/ProductEdit.vue'));

Vue.component('location-list', require('./pages/location/LocationList.vue'));
Vue.component('location-create', require('./pages/location/LocationCreate.vue'));
Vue.component('location-edit', require('./pages/location/LocationEdit.vue'));

Vue.component('order-list', require('./pages/order/OrderList.vue'));

Vue.component('design-list', require('./pages/design/DesignList.vue'));
Vue.component('design-edit', require('./pages/design/DesignEdit.vue'));

Vue.component('dashboard', require('./pages/dashboard/Dasboard.vue'));

Vue.component('home-page', require('./pages/home/HomePage.vue'));
Vue.component('slider', require('./pages/home/Slider.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var Events = new Vue({});
const _app = new Vue({
    el: '#app',
    data: {
        activeModal: null,
        isMobile: false,
        user: {
            id: null
        },
        eventEmitter: Events,
    },
    mounted: function() {
        if (this.screen().width < 768) {
            this.isMobile = true;
        }
        if(typeof _user !== 'undefined') {
            this.user = _user;
        }

        Events.$on('showModal',(id) => {
            this.showModal(id);
        });
    },
    methods: {
        showModal: function (m) {
            this.activeModal = m;
            Events.$emit('modalShown', m);
        },
        screen: function(){
            var myWidth = 0, myHeight = 0;
            if( typeof( window.innerWidth ) == 'number' ) {
                //Non-IE
                myWidth = window.innerWidth;
                myHeight = window.innerHeight;
            } else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
                //IE 6+ in 'standards compliant mode'
                myWidth = document.documentElement.clientWidth;
                myHeight = document.documentElement.clientHeight;
            } else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
                //IE 4 compatible
                myWidth = document.body.clientWidth;
                myHeight = document.body.clientHeight;
            }
            return {
                height: myHeight,
                width: myWidth
            }
        }
    }
});


Vue.component('modal-test', function(resolve, reject) {
    axios.get('/modal/test', {
        params: {
            is_mobile: _app.isMobile ? 1 : 0
        }
    }).then(function (response) {
        resolve({
            template: response.data,
            props: [],
            data: function () {
                return {
                    isLoading: false,
                    isLoaded: false,
                    hasError: false,
                    errorType: 'error',
                    errorMessage: '',
                    isMobile: _app.isMobile
                };
            },
            mounted: function () {

            },
            methods: {
                close: function () {
                    this.$emit('closed');
                }
            }
        });
    });
});