# Laravel Blog Project

## Introduction

This project is a simple blog application built using the Laravel framework. It leverages the Laravel Breeze Starter Kit to implement all of Laravel's authentication features, including registration, login, and password reset functionalities. It also includes CRUD operations for blog posts, a rich text editor, paginated post listings, individual post views with comments, and more.

## Features

- User authentication (registration, login, password reset) using Laravel Breeze
- CRUD operations for blog posts (Create, Read, Update, Delete)
- Rich text editor for post content
- Post listing with pagination
- Individual post view with comments
- Responsive and user-friendly interface using Blade templates
- Secure and efficient data handling with Laravel Sanctum and Tinker
- Seed the database with fake data using Seeder class.

## Technologies Used

- Laravel 11.9 (or the latest version)
- PHP ^8.2
- Laravel Breeze ^2.1
- Laravel Sanctum ^4.0
- MySQL or SQLite database
- Blade Templating Engine
- CSS for basic styling
- JavaScript (optional for additional functionalities)

## Installation and Setup

To get this project up and running on your local machine, follow these steps:

1. **Clone the repository:**
    ```bash
    git clone https://github.com/yourusername/laravel-blog.git
    cd laravel-blog
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set up environment variables:**
    Rename the `.env.example` file to `.env` and configure your database and email settings within the `.env` file.

4. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5. **Run migrations:**
    ```bash
    php artisan migrate
    ```

6. **Install and run Laravel Breeze:**
    ```bash
    php artisan breeze:install
    npm install && npm run dev
    php artisan migrate
    ```

7. **Run seeders to populate database with fake data:**
    ```bash
    php artisan db:seed
    ```

8. **Serve the application:**
    ```bash
    php artisan serve
    ```

9. **Access the project:**
    Open your web browser and navigate to `http://localhost:8000` to view the blog application.

## Usage Instructions

1. **Visit the Application**: When you visit the application URL, you will be redirected to the list of all posts page (`posts/index`), accessible to all users without the need to log in.

2. **User Registration and Login**: Register a new user account or log in with an existing account to access additional features.

3. **Creating Posts**: Once logged in, you can create new blog posts by filling out the post form with a title and content using the rich text editor.

4. **Viewing Posts**: View the list of all blog posts on the home page, which is accessible without logging in. Click on individual posts to view their details and leave comments.

5. **Editing and Deleting Posts**: Logged-in users can edit or delete their own posts.

---

Feel free to customize this description based on your specific project details and preferences.