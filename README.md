# Money Savings Management System (SIMANTAB)

[Demo](https://simantab.sfmuazam.xyz)

A web-based application built with Laravel to manage student savings efficiently. The system allows administrators to handle class and student data, track savings transactions, and generate summaries based on class, student, or date.

## Tech Stack

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300000f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![jQuery](https://img.shields.io/badge/jquery-%230769AD.svg?style=for-the-badge&logo=jquery&logoColor=white)
![AJAX](https://img.shields.io/badge/ajax-00BFFF?style=for-the-badge)

## System Overview

### Key Features
- **Class Management**: Admins can add, edit, and delete class data.
- **Student Management**: Keep track of student data, including the ability to update and manage student information.
- **Savings Tracking**: Monitor student savings activities with a detailed history of transactions.
- **Summaries**: Generate reports by class, individual student, or specific date ranges.
- **Real-time Updates**: Leveraging jQuery and AJAX for seamless data management without page reloads.

### Images
![SIMANTAB System Overview](https://example.com/system-overview.png) 

## Installation

### Prerequisites
Ensure you have the following installed on your machine:
- PHP 8.2
- Composer
- MySQL 5.x

### Steps

1. **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/simantab.git
    cd simantab
    ```

2. **Install Dependencies**
    ```bash
    composer install
    ```

3. **Environment Setup**
    Create a `.env` file by copying `.env.example`:
    ```bash
    cp .env.example .env
    ```
    Update your database credentials and other configurations in `.env`:
    ```bash
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

4. **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**
    Create the necessary database tables by running migrations:
    ```bash
    php artisan migrate --seed
    ```

6. **Serve the Application**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.
