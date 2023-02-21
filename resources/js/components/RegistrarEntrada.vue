<template>
  <div>
    <h2>Registrar Entrada</h2>
    <form>
      <div class="form-group">
        <label for="placa">Placa:</label>
        <input type="text" class="form-control" id="placa" v-model="placa">
      </div>
      <div class="form-group">
        <label for="tipoVehiculo">Tipo de Vehículo:</label>
        <select class="form-control" id="tipoVehiculo" v-model="tipoVehiculo">
          <option v-for="tipo in tiposVehiculo" :value="tipo.id">{{ tipo.nombre }}</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="registrarEntrada">Registrar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      placa: '',
      tipoVehiculo: '',
      tiposVehiculo: []
    }
  },
  created() {
    // Cargar los tipos de vehículo desde la API
    axios.get('/api/tipos-vehiculo')
      .then(response => {
        this.tiposVehiculo = response.data
      })
  },
  methods: {
    registrarEntrada() {
      // Enviar la información de la entrada a la API
      axios.post('/api/entrada', {
        placa: this.placa,
        tipoVehiculo: this.tipoVehiculo
      })
        .then(response => {
          console.log(response.data)
        })
    }
  }
}
</script>
