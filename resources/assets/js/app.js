/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('chat-com', require('./components/ChatComponent.vue'));
Vue.component('chat-passenger-com', require('./components/ChatPassengerComponent.vue'));

Vue.component('driver-com', require('./components/DriverComponent.vue'));
Vue.component('driver-room-com', require('./components/DriverRoomComponent.vue'));
Vue.component('fellowers-com', require('./components/FellowersComponent.vue'));

Vue.component('pass-com', require('./components/PassengerComponent.vue'));
Vue.component('form-com', require('./components/FormComponent.vue'));
Vue.component('header-com', require('./components/HeaderComponent.vue'));
Vue.component('header-passenger-com', require('./components/HeaderPassengerComponent.vue'));
Vue.component('support-header-com', require('./components/SupportHeaderComponent.vue'));
Vue.component('message-com', require('./components/MessageComponent.vue'));
Vue.component('user-com', require('./components/UserComponent.vue'));
Vue.component('user-passenger-com', require('./components/UserPassengerComponent.vue'));
Vue.component('room-com', require('./components/RoomComponent.vue'));
Vue.component('unread-com', require('./components/UnreadComponent.vue'));
Vue.component('support-com', require('./components/SupportComponent.vue'));
Vue.component('admin-com', require('./components/AdminComponent.vue'));
Vue.component('admin-notification-com', require('./components/NotificationComponent.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.getElementById("app")) {
    const app = new Vue({
        el: '#app'
    });
}
if (document.getElementById("app1")) {
    const app = new Vue({
        el: '#app1'
    });
}

if (document.getElementById("app2")) {
    const app = new Vue({
        el: '#app2'
    });
}

if (document.getElementById("support_app")) {
    const app = new Vue({
        el: '#support_app'
    });
}

if (document.getElementById("driver_app")) {
    const app = new Vue({
        el: '#driver_app'
    });
}


if (document.getElementById("admin_app")) {
    const app = new Vue({
        el: '#admin_app'
    });
}

if (document.getElementById("admin-notification")) {
    const app = new Vue({
        el: '#admin-notification'
    });
}

Echo.private('chat')
    .listen('MessageCreated', (data) => {
        Event.$emit('added_message', data.message);
    })