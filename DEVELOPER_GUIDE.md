# Developer Guide - Focus Tasks

This guide provides technical insights into the architecture and development workflow of the Focus Tasks application.

## 🏗️ Architecture Overview

The project follows a decoupled **Client-Server** architecture:
- **Backend (Laravel)**: Acts as a stateless REST API.
- **Frontend (Vue.js)**: A Single Page Application (SPA) that handles the UI and user interactions.

### Component Interaction
1. **Frontend** sends HTTP requests using **Axios**.
2. **Backend API** (Laravel Routes) receives requests and delegates them to **TaskController**.
3. **Eloquent Model** (Task) interacts with the database.
4. **Backend** returns JSON responses.
5. **Frontend** updates the reactive state (Vue `data()`) and triggers re-renders.

---

## 🎨 Design System

We use a custom, modern design system based on **Vanilla CSS Variables**.

| Category | Description |
|----------|-------------|
| **Theme** | Nordic Light (Clean, High Contrast) |
| **Primary Color** | Emerald-500 (#10b981) |
| **Typography** | Inter (Sans-serif) |
| **Effects** | Soft Shadows, 16px Border Radii |

### CSS Variables
Located in `App.vue`:
```css
:root {
  --primary: #10b981;
  --bg-page: #f9fafb;
  --bg-card: #ffffff;
  --text-primary: #0f172a;
}
```

---

## 🛠️ Development Workflow

### Adding a New API Endpoint
1. Define the route in `routes/api.php`.
2. Add a corresponding method in `app/Http/Controllers/TaskController.php`.
3. (Optional) Create a migration if you need new database fields: `php artisan make:migration ...`.

### Component State Management
Currently, state is managed locally within `App.vue`. As the project grows, consider integrating **Pinia** or **Vuex** for global state.

---

## ✅ Best Practices
- **Eloquent Models**: Always use mass-assignment protection ($fillable) in models.
- **Validation**: Use Laravel's `request->validate()` for all incoming data.
- **Vue Transitions**: Wrap dynamic lists in `<transition-group>` for better UX.
- **Axios Error Handling**: Always include `.catch()` blocks for API calls to prevent silent failures.
