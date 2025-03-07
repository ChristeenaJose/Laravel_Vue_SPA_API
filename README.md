# Laravel API + Vue SPA (Task Manager)

This is a simple **Task Manager** application built using **Laravel as the backend API** and **Vue.js as the frontend SPA**. The app allows users to **add tasks** and **list tasks** using a REST API.

## Features
- Create new tasks
- List all tasks
- Vue.js as the frontend (SPA)
- Laravel API as the backend
- Uses Axios for API communication

## Tech Stack
- **Backend:** Laravel 10
- **Frontend:** Vue.js 3 + Vite
- **Database:** SQLite / MySQL
- **Authentication:** Laravel Sanctum (optional)

---

## Installation
### 1. Clone the Repository
```sh
git clone https://github.com/yourusername/laravel-vue-taskmanager.git
cd laravel-vue-taskmanager
```

### 2. Set Up Laravel Backend
#### Install Dependencies
```sh
cd backend
composer install
```

#### Set Up Environment
```sh
cp .env.example .env
php artisan key:generate
```

#### Configure Database
Update `.env` file with database details:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taskmanager
DB_USERNAME=root
DB_PASSWORD=
```

#### Run Migrations
```sh
php artisan migrate
```

#### Run Laravel Server
```sh
php artisan serve
```

### 3. Set Up Vue Frontend
#### Install Dependencies
```sh
cd frontend
npm install
```

#### Run Development Server
```sh
npm run dev
```

---

## API Endpoints
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | `/api/tasks` | Fetch all tasks |
| POST   | `/api/tasks` | Create a new task |

### Example API Request (Create Task)
```sh
curl -X POST http://127.0.0.1:8000/api/tasks \
     -H "Content-Type: application/json" \
     -d '{"title": "New Task"}'
```

---

## Folder Structure
```
laravel-vue-taskmanager/
├── backend/        # Laravel API
│   ├── app/
│   ├── database/
│   ├── routes/api.php
│   ├── .env
│   ├── artisan
├── frontend/       # Vue.js SPA
│   ├── src/
│   ├── components/
│   ├── App.vue
│   ├── main.js
│   ├── vite.config.js
└── README.md
```

---

## Deployment
### Backend (Laravel API)
1. Deploy Laravel API to a cloud server (e.g., DigitalOcean, AWS, or Heroku)
2. Configure `.env` file for production
3. Run migrations: `php artisan migrate --force`

### Frontend (Vue.js SPA)
1. Build Vue app:
```sh
npm run build
```
2. Deploy `dist/` folder to Netlify, Vercel, or any static hosting.

---

## License
This project is open-source and available under the [MIT License](LICENSE).

