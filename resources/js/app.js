require('./bootstrap');


window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex)

Vue.component('app', require('./components/App.vue').default);

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