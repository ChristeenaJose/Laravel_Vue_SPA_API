<template>
  <div id="app">
    <h1>Tasks</h1>
    <ul>
      <li v-for="task in tasks" :key="task.id">{{ task.name }}</li>
    </ul>
    <input v-model="newTask" @keyup.enter="addTask" placeholder="Add a new task" />
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      tasks: [],
      newTask: ''
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    fetchTasks() {
      axios.get('http://127.0.0.1:8000/api/tasks')
        .then(response => {
          this.tasks = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    addTask() {
      if (this.newTask) {
        axios.post('http://127.0.0.1:8000/api/tasks', { name: this.newTask })
          .then(response => {
            this.tasks.push(response.data);
            this.newTask = '';
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  }
};
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
