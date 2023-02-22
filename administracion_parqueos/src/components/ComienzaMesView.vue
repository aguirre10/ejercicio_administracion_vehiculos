<template>
  <div>
    <h1>Comienza Mes</h1>
    <p>Esta función marca el inicio de un nuevo mes y actualiza el estado de los vehículos residentes en la tabla Estancia</p>
    <button @click="comienzaMes" class="btn btn-primary">Comienza Mes</button>
  </div>
</template>

<script>
export default {
  methods: {
    async comienzaMes() {
      try {
        const response = await axios.post('/http://127.0.0.1:8000/api/comienzaMes');
        console.log(response.data);
        // manejar la respuesta exitosa aquí
      } catch (error) {
        console.error(error);
        // manejar el error aquí
      }
    }
  }
};
</script>
