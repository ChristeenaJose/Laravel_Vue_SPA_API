<template>
  <div id="app" class="app-container">
    <div class="main-card">
      <header class="header">
        <h1>Tasks</h1>
        <p class="subtitle">Simple. Modern. Focused.</p>
      </header>

      <div class="input-section">
        <div class="input-wrapper">
          <input 
            v-model="newTask" 
            @keyup.enter="addTask" 
            placeholder="Add a new task..." 
            class="minimal-input"
          />
          <button @click="addTask" class="action-button">
            Add
          </button>
        </div>
      </div>

      <transition-group name="fade-slide" tag="ul" class="task-list">
        <li v-for="task in tasks" :key="task.id" class="task-row">
          <div class="task-info">
            <div class="status-indicator"></div>
            <span class="task-text">{{ task.name }}</span>
          </div>
          <button @click="deleteTask(task.id)" class="delete-btn" title="Delete task">
            &times;
          </button>
        </li>
      </transition-group>

      <div v-if="tasks.length === 0" class="empty-msg">
        No tasks for today.
      </div>
    </div>
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
          console.error('Error:', error);
        });
    },
    addTask() {
      const taskName = this.newTask.trim();
      if (!taskName) return;
      
      axios.post('http://127.0.0.1:8000/api/tasks', { name: taskName })
        .then(response => {
          this.tasks.push(response.data);
          this.newTask = '';
        })
        .catch(error => {
          console.error('Error:', error);
        });
    },
    deleteTask(id) {
      axios.delete(`http://127.0.0.1:8000/api/tasks/${id}`)
        .then(() => {
          this.tasks = this.tasks.filter(t => t.id !== id);
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }
  }
};
</script>

<style>
:root {
  --primary: #10b981; /* Emerald-500 */
  --primary-dark: #059669; /* Emerald-600 */
  --danger: #ef4444; /* Red-500 */
  --bg-page: #f9fafb;
--bg-card: #ffffff;
  --text-primary: #0f172a;
  --text-secondary: #64748b;
  --border-color: #e2e8f0;
  --input-bg: #f8fafc;
}

body {
  margin: 0;
  padding: 0;
  min-height: 100vh;
  background-color: var(--bg-page);
  color: var(--text-primary);
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding-top: 100px;
}

.app-container {
  width: 100%;
  max-width: 440px;
  padding: 0 20px;
}

.main-card {
  background: var(--bg-card);
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
}

.header {
  margin-bottom: 24px;
}

.header h1 {
  margin: 0;
  font-size: 1.5rem;
  font-weight: 700;
  color: var(--text-primary);
}

.subtitle {
  color: var(--text-secondary);
  font-size: 0.875rem;
  margin-top: 4px;
}

.input-section {
  margin-bottom: 24px;
}

.input-wrapper {
  display: flex;
  gap: 8px;
}

.minimal-input {
  flex: 1;
  background: var(--input-bg);
  border: 1px solid var(--border-color);
  border-radius: 8px;
  padding: 10px 14px;
  color: var(--text-primary);
  font-size: 0.95rem;
  transition: all 0.2s ease;
  outline: none;
}

.minimal-input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.action-button {
  background: var(--primary);
  color: white;
  border: none;
  border-radius: 8px;
  padding: 0 20px;
  font-weight: 600;
  font-size: 0.9rem;
  cursor: pointer;
  transition: background 0.2s ease;
}

.action-button:hover {
  background: var(--primary-dark);
}

.task-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.task-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 0;
  border-bottom: 1px solid #f1f5f9;
}

.task-info {
  display: flex;
  align-items: center;
}

.task-row:last-child {
  border-bottom: none;
}

.status-indicator {
  width: 10px;
  height: 10px;
  border: 2px solid var(--primary);
  border-radius: 50%;
  margin-right: 12px;
}

.task-text {
  font-size: 1rem;
  color: var(--text-primary);
}

.delete-btn {
  background: transparent;
  color: var(--text-secondary);
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
  line-height: 1;
  padding: 4px 8px;
  border-radius: 4px;
  transition: all 0.2s ease;
  opacity: 0;
}

.task-row:hover .delete-btn {
  opacity: 1;
}

.delete-btn:hover {
  color: var(--danger);
  background: rgba(239, 68, 68, 0.1);
}

.empty-msg {
  text-align: center;
  color: var(--text-secondary);
  padding: 16px 0;
  font-size: 0.9rem;
}

/* Animations */
.fade-slide-enter-active,
.fade-slide-leave-active {
  transition: all 0.3s ease;
}

.fade-slide-enter-from {
  opacity: 0;
  transform: translateY(10px);
}

.fade-slide-leave-to {
  opacity: 0;
  transform: translateX(20px);
}

.fade-slide-move {
  transition: transform 0.3s ease;
}
</style>

