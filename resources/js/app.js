require('./bootstrap');


window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex)

Vue.component('app', require('./components/App.vue').default);

Vue.component('card-employees', require('./components/CardEmployees.vue').default);

Vue.component('card-clients', require('./components/CardClients.vue').default);

Vue.component('card-sucursales', require('./components/CardSucursales.vue').default);

Vue.component('card-areas', require('./components/CardAreas.vue').default);

const store = new Vuex.Store({
    state: {
      products: [{
          'nombre' : 'Uno',
          'precio' : 100
      }]
    },
    mutations: {
      addProduct (state, producto) {
        state.products.push(producto);
      }
    },
    actions: {
        addProductAction(context, producto){
            context.commit('addProduct', producto)
        }
    }
})

const app = new Vue({
    el : "#app",
    store,
    comments: { app }
});

