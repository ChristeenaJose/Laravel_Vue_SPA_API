---
description: common development tasks and environment setup
---

### 🚀 Starting Development Servers

To start both the Laravel backend and Vue frontend in separate terminals:

**Terminal 1: Backend**
```bash
php artisan serve
```

**Terminal 2: Frontend**
```bash
cd frontend && npm run serve
```

---

### 📦 Installation & Refresh

If you've just cloned the repo or need to refresh dependencies:

// turbo
1. Install all dependencies:
```bash
composer install && cd frontend && npm install && cd ..
```

2. Reset the database and run migrations:
```bash
php artisan migrate:fresh
```

---

### 🛠️ Common Laravel Tasks

- **Create a new migration**: `php artisan make:migration <name>`
- **Create a new controller**: `php artisan make:controller <Name>Controller`
- **Clear application cache**: `php artisan optimize:clear`

---

### 🎨 Frontend Tasks

- **Build for production**: `cd frontend && npm run build`
- **Lint and fix files**: `cd frontend && npm run lint`
