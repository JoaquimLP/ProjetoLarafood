import Vue from 'vue'
import Bus from './bus'
import VueToastify from "vue-toastify";
Vue.use(VueToastify);

// get id tenant
const empresa_id = window.Laravel.empresa_id;

window.Echo.channel(`laravel_database_private-order-created.${empresa_id}`)
    .listen('OrderCreated', (e) => {
        console.log(e.order)
        Bus.$emit('order.created', e.order)

        Vue.$vToastify.success(`Novo pedido ${e.order.identify}`, 'Novo Pedido')
    })
