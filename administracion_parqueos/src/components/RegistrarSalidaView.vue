<template>
  <div>
    <form @submit.prevent="registrarSalida">
      <div class="form-group">
        <label for="placa">Número de placa:</label>
        <input type="text" class="form-control" id="placa" v-model="placa">
      </div>
      <button type="submit" class="btn btn-primary">Registrar Salida</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      placa: ''
    }
  },
  methods: {
    async registrarSalida() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/registrarSalida', {
          placa: this.placa
        })
        console.log(response.data)
      } catch (error) {
        console.error(error)
      }
    }
  }
}
</script>
