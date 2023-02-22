<template>
  <div>
    <form>
      <div class="form-group">
        <label for="nombreArchivo">Nombre del archivo:</label>
        <input type="text" class="form-control" id="nombreArchivo" v-model="nombreArchivo">
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="generarArchivo">Generar archivo</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nombreArchivo: ''
    };
  },
  methods: {
    generarArchivo() {
      // Aquí puedes hacer una petición a tu API para generar el archivo
      // y enviar el nombre del archivo que se ingresó en el formulario
      axios.post('http://127.0.0.1:8000/api/pagoResidentes', {
        nombreArchivo: this.nombreArchivo
      })
      .then(response => {
        console.log(response);
      })
      .catch(error => {
        console.error(error);
      });
    }
  }
};
</script>

