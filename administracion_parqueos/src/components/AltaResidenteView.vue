<template>
  <div>
    <div>
      <h1>{{ msg }}</h1>
      <h2>DAR DE ALTA VEHICULO RESIDENTE</h2>
      <!--FORMULARIO -->
      <form @submit.prevent="save">
        <div class="form-group">
          <label>Placa</label>
          <input type="text" v-model="vehiculo.placa" class="form-control" placeholder="Ingrese placa"/>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>

    <!--TABLA -->
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">PLACA</th>
          <th scope="col">TIPO</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in result" v-bind:key="task.id_vehiculo">
          <td>{{ task.id_vehiculo }}</td>
          <td>{{ task.placa }}</td>
          <td>{{ task.tipo_vehiculo }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>
import Vue from "vue";
import axios from "axios";

Vue.use(axios);

export default {
  name: "VehiculosView",
  data() {
    return {
      result: {},
      vehiculo: {
        id_vehiculo: "",
        placa: "",
        tipo_vehiculo: ""
      }
    };
  },
  created() {
    this.VehiculosLoad();
  },
  methods: {
   VehiculosLoad()
    {
      var page = "http://127.0.0.1:8000/api/verVehiculos/residente";
      axios.get(page).then(({ data }) => {
        console.log(data);
        this.result = data;
      });

    },
    save()
    {
      this.saveData();

    },
    saveData()
    {
      axios.post("http://127.0.0.1:8000/api/altaResidente", this.vehiculo)
      .then(
        ({ data }) => {
        alert("Guardado");
      });

    }
  }
};
</script>
