import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import EmpleadosView from '@/components/EmpleadosView'
import AltaOficialView from '@/components/AltaOficialView'
import AltaResidenteView from '@/components/AltaResidenteView'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },

    {
      path: '/empview',
      name: 'EmpleadosView',
      component: EmpleadosView
    },

    {
      path: '/altaOficialView',
      name: 'AltaOficialView',
      component: AltaOficialView
    },

    {
      path: '/AltaResidenteView',
      name: 'AltaResidenteView',
      component: AltaResidenteView
    }

  ]
})
