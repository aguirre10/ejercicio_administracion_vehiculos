import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import EmpleadosView from '@/components/EmpleadosView'
import AltaOficialView from '@/components/AltaOficialView'
import AltaResidenteView from '@/components/AltaResidenteView'
import RegistrarEntradaView from '@/components/RegistrarEntradaView'
import RegistrarSalidaView from '@/components/RegistrarSalidaView'
import ComienzaMesView from '@/components/ComienzaMesView'
import PagoResidentesView from '@/components/PagoResidentesView'


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
    },

    {
      path: '/RegistrarEntradaView',
      name: 'RegistrarEntradaView',
      component: RegistrarEntradaView
    },
    {
      path: '/RegistrarSalidaView',
      name: 'RegistrarSalidaView',
      component: RegistrarSalidaView
    },

    {
      path: '/ComienzaMesView',
      name: 'ComienzaMesView',
      component: ComienzaMesView
    },

    {
      path: '/PagoResidentesView',
      name: 'PagoResidentesView',
      component: PagoResidentesView
    }

  ]
})
