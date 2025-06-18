# 📚 FHM Bookstore – Laravel + Vue eBook Platform

## 📝 Project Overview

**FHM Bookstore** is a full-stack eBook management and sales platform built with Laravel and Vue.js. Admins can upload eBooks by category, and users can preview and purchase them via manual payment. After admin approval, users receive the eBook (PDF) via email.

The platform includes an analytics dashboard showing order statuses and is built completely **without AI-generated code or content**.

---

## 🚀 Features

-   Admin uploads eBooks by category
-   Public users can preview eBooks
-   Manual payment method with admin approval system
-   Auto PDF delivery via email after approval
-   Dashboard displays:
    -   Total Orders
    -   Approved Orders
    -   Rejected Orders

---

## 🛠️ Technologies Used

-   **Backend:** Laravel (REST API), JWT Auth
-   **Frontend:** Vue.js
-   **State Management:** Pinia
-   **Styling:** Tailwind CSS + Bootstrap
-   **Authentication:** JSON Web Token (JWT)

---

## 🧪 Seeder Information

The project includes a `UserSeeder` which creates two default users:

| Role  | Email                    | Password |
| ----- | ------------------------ | -------- |
| Admin | `admin@fhmbookstore.dev` | `secret` |
| User  | `user@fhmbookstore.dev`  | `secret` |

Run the seeder after migrating the database.

---

## 💻 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/NextiveE-BookSolution.git
cd NextiveE-BookSolution

```

## Setup .env

```
composer install
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
php artisan serve
npm install
npm run dev
```

## Link Storage Path

```
FILESYSTEM_DISK=public
php artisan storage:link
```
