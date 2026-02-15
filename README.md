# LARAVEL FACTORY ADMIN


![Laravel Version](https://img.shields.io/badge/Laravel-^12.x-red)
![PHP Version](https://img.shields.io/badge/PHP-^8.4-blue)
![License](https://img.shields.io/badge/license-MIT-green)

---

## About


 This project is a Laravel-based Admin Panel developed as a Backend Technical Exam.
 It allows administrators to manage Factories and their Employees through a secure authentication system.

 The application includes full CRUD operations, database migrations and seeders, validation using Request classes, pagination, and automated tests. It also provides a REST API for retrieving employee and factory relationship data.

 Additionally, the system tracks user activity by logging all model changes (create, update, delete) for factories and employees, including old and new values during updates.


---

## Features

* Basic Authentication using Brezee Blade 
* REST API
* Admin dashboard
* CRUD
* Repository
* Observer
* DataTables

---

## Requirements

| Software           | Version     |
| ------------------ | ----------- |
| PHP                | 8.4+        |
| Composer           | 2.9.3       |
| Node.js            | v24.11.0    |
| NPM                | 11.6.2      |
| MySQL              | 8.0.30      |

```
```
## Installation

Clone repository:

```
git clone https://github.com/FrappOccino/laravel_factory_admin.git
cd laravel_factory_admin
```

Install dependencies:

```
composer install
npm install
```

---

## Environment Setup

Create environment file:

```
cp .env.example .env
```

Generate app key:

```
php artisan key:generate
```

Update `.env` variables:


```
APP_NAME=laravel_factory_admin
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_factory_admin
DB_USERNAME=root
DB_PASSWORD=
DB_PREFIX='lfa'
```

---

## Database

Run migrations:

```
php artisan migrate
```

Run seeders (optional):

```
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=EmployeesSeeder
php artisan db:seed --class=FactorySeeder
```

Run worker:

```
php artisan queue:work
```

---

## Running the App

Development server:

```
php artisan serve
```

Vite dev server:

```
npm run dev
```

Production build:

```
npm run build
```

App URL:

```
http://127.0.0.1:8000
```

---

## Testing

Run tests:

```
php artisan test --filter=EmployeeCrudTest
php artisan test --filter=FactoryCrudTest
```

---

## API Documentation

REST API  shows the data of Employees table and its Factory.

Example:

```
GET /api/v1/employees
```

## Maintainers

* Jeffrey Wong — [wongjeffreyg@gmail.com](mailto:wongjeffreyg@gmail.com)
