# Employee Management System

## Introduction
The **Employee Management System** is a web-based application built using **Laravel 10** and **AdminLTE**. It provides  easy-to-use interface for managing employees and departments efficiently. The system includes authentication, CRUD operations for employees and departments, and an admin dashboard for quick insights.

---

## Features

### 1. **Admin Dashboard**
- Displays the total number of departments.
- Displays the total number of employees.

### 2. **Authentication**
- Admin login system.
- Admin user created via seeding.

### 3. **Department Management**
- Create a new department.
- View a list of departments.
- Edit department details.
- Delete a department.
- **Field:** Department Name

### 4. **Employee Management**
- Create a new employee.
- View a list of employees.
- Edit employee details.
- Delete an employee.
- **Fields:** Employee Name, Photo Upload, Department Selection

---

## Technology Stack
- **Framework:** Laravel 10
- **Template Engine:** AdminLTE
- **Database:** MySQL
- **Frontend:** Blade Templates
- **Authentication:** Laravel’s built-in authentication

---

## Installation & Setup

### 1. **Clone the Repository**
```bash
git clone https://github.com/abhijith-santhosh-dev/Employee-Management-System.git
cd Employee-Management-System
```

### 2. **Install Dependencies**
```bash
composer install
```

### 3. **Configure Environment**
- Copy the example environment file:
```bash
cp .env.example .env
```
- Update `.env` file with database credentials:
```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4. **Run Migrations & Seed Database**
```bash
php artisan migrate --seed
```

### 5. **Create Storage Symlink**
```bash
php artisan storage:link
```

### 6. **Serve the Application**
```bash
php artisan serve
```

The application will be available at [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## Admin Credentials (Default)
- **Email:** admin@example.com
- **Password:** password

_(You can update these credentials by modifying the `AdminUserSeeder.php` before running `php artisan db:seed`)_

---

## Folder Structure
```
Employee-Management-System/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── DepartmentController.php
│   │   │   ├── EmployeeController.php
│   │   ├── Middleware/
│   ├── Models/
│   │   ├── Department.php
│   │   ├── Employee.php
│   │   ├── User.php
├── config/
├── database/
│   ├── migrations/
│   ├── seeders/
│   │   ├── AdminUserSeeder.php
│   │   ├── DatabaseSeeder.php
├── public/
├── resources/
│   ├── views/
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   ├── dashboard.blade.php
│   │   ├── departments/
│   │   ├── employees/
├── routes/
│   ├── web.php
```

---

## Future Enhancements

- Export employee data to CSV/PDF.
- Implement RESTful APIs for mobile integration.

---



