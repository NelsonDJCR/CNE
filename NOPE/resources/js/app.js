import $ from 'jquery';
require('./bootstrap');
import router from './routes'
import { useRoute } from 'vue-router';

window.Vue = require('vue');

Vue.component('listarSesiones', require('./components/listarSesiones.vue').default);
Vue.component('editar-sesion', require('./components/editar-sesion.vue').default);
Vue.component('tribunales-nuevo', require('./components/tribunales-nuevo.vue').default);
Vue.component('tribunales-editar', require('./components/tribunales-editar.vue').default);
// Vue.component('tipo-documento', require('./components/tipoDocumento_J/index.vue').default);

Vue.directive('permiso', function (el, binding,vnode) {
  if(superAdmin == '1'){
    return vnode.elm.hidden = false;
  }else{
    if(Permissions.indexOf(binding.value) !== -1){
        return vnode.elm.hidden = false;
    }else{
        return vnode.elm.hidden = true;
    }
  }
})

const app = new Vue({
    router,
    el: '#app',
    props: {},
    components:{
    },
    data :{
      menu : 0,
    },
    methods: {
    },
});
