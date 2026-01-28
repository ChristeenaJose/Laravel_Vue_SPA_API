# Focus Tasks - Laravel & Vue SPA

Focus Tasks is a modern, minimalist Task Management application built with a **Laravel API** backend and a **Vue.js 3** frontend. It features a clean "Nordic Light" aesthetic with emerald accents and smooth animations.

## ✨ Features
- **Modern UI**: Clean, minimalist design with a soft-light theme.
- **Task Management**: Create, view, and remove tasks with ease.
- **Fluid Animations**: Smooth transitions for adding and deleting tasks.
- **RESTful API**: Robust backend communication using Axios and Laravel.
- **Responsive Design**: Optimized for various screen sizes.

## 🚀 Tech Stack
- **Backend**: Laravel 10 (PHP 8.x)
- **Frontend**: Vue.js 3 + Vue CLI
- **API**: Laravel Routes + Axios
- **Styling**: Vanilla CSS (Modern CSS Variables)
- **Database**: SQLite (Default) or MySQL

---

## 🛠️ Installation & Setup

### 1. Prerequisite
Ensure you have **PHP**, **Composer**, and **Node.js (NPM)** installed on your machine.

### 2. Backend Setup (Laravel)
The backend files are located in the root directory.

```bash
# Install PHP dependencies
composer install

# Set up environment variables
cp .env.example .env
php artisan key:generate

# Run database migrations
php artisan migrate

# Start the Laravel development server
php artisan serve
```

### 3. Frontend Setup (Vue SPA)
The frontend files are located in the `frontend/` directory.

```bash
# Navigate to the frontend directory
cd frontend

# Install Node dependencies
npm install

# Start the Vue development server
npm run serve
```

---

## 📡 API Reference

### Tasks
| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET`    | `/api/tasks` | Retrieve all tasks |
| `POST`   | `/api/tasks` | Create a new task |
| `DELETE` | `/api/tasks/{id}` | Remove a task |

---

## 📂 Project Structure
```text
.
├── app/                # Laravel Core
├── config/             # Laravel Configuration
├── database/           # Migrations & Models
├── frontend/           # Vue.js SPA
│   ├── src/            # Vue Source Code
│   │   ├── App.vue     # Main Application Component
│   │   └── main.js     # Vue Entry Point
│   └── public/         # Static Assets & index.html
├── public/             # Laravel Public Assets
├── routes/             # API & Web Routes
├── storage/            # Laravel Storage
└── README.md           # This Documentation
```

---

## 📖 Developer Guide
For a deep dive into the architecture, state management, and contributing guidelines, please refer to the [DEVELOPER_GUIDE.md](./DEVELOPER_GUIDE.md).

## 📄 License
This project is open-source and available under the [MIT License](LICENSE).

