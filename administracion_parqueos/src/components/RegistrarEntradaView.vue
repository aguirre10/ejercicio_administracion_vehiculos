<template>
  <div>
    <form>
      <div class="form-group">
        <label for="placa">Número de placa:</label>
        <input type="text" class="form-control" id="placa" v-model="placa">
      </div>
      <button type="submit" class="btn btn-primary" @click.prevent="registrarEntrada">Registrar entrada</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      placa: ''
    }
  },
  methods: {
    async registrarEntrada() {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/registrarEntrada', {
          placa: this.placa
        });
        console.log(response.data);
      } catch (error) {
        console.error(error);
      }
    }
  }
};
</script>
