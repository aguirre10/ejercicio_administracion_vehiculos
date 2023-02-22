<template>
  <div>
    <h1>{{ msg }}</h1>
    <h2>Empleados View</h2>
     <!--FORMULARIO -->
    <form @submit.prevent="save">
      <div class="form-group">
        <label>Nombre</label>
        <input type="text" v-model="empleado.nombre" class="form-control" placeholder="Ingrese nombre"/>
      </div>
      <div class="form-group">
        <label>Apellido</label>
        <input type="text" v-model="empleado.apellido" class="form-control" placeholder="Ingrese apellido"/>
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    <!--TABLA -->
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in result" v-bind:key="task.id_empleado">
          <td>{{ task.id_empleado }}</td>
          <td>{{ task.nombre }}</td>
          <td>{{ task.apellido }}</td>
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
  name: "EmpleadosView",
  data() {
    return {
      result: {},
      empleado: {
        id_empleado: "",
        nombre: "",
        apellido: ""
      }
    };
  },
  created() {
    this.EmpleadosLoad();
  },
  methods: {
    EmpleadosLoad()
    {
      var page = "http://127.0.0.1:8000/api/empleados";
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
      axios.post("http://127.0.0.1:8000/api/save", this.empleado)
      .then(
        ({ data }) => {
        alert("Guardado");
      });

    }





  }
};
</script>
