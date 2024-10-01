# Money Savings Management System (SIMANTAB)

A web-based application built with Laravel to manage student savings efficiently. The system allows administrators to handle class and student data, track savings transactions, and generate summaries based on class, student, or date.

## Tech Stack

![Laravel](https://img.shields.io/badge/Laravel-8.x-red)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.x-4479A1)
![jQuery](https://img.shields.io/badge/jQuery-3.x-0769AD)
![AJAX](https://img.shields.io/badge/AJAX-Enabled-00BFFF)

## Demo

Check out the live demo: [SIMANTAB Demo](https://simantab.sfmuazam.xyz)

## System Overview

### Key Features
- **Class Management**: Admins can add, edit, and delete class data.
- **Student Management**: Keep track of student data, including the ability to update and manage student information.
- **Savings Tracking**: Monitor student savings activities with a detailed history of transactions.
- **Summaries**: Generate reports by class, individual student, or specific date ranges.
- **Real-time Updates**: Leveraging jQuery and AJAX for seamless data management without page reloads.

### System Diagram
![SIMANTAB System Overview](https://example.com/system-overview.png) *(replace with an actual image)*

## Installation

### Prerequisites
Ensure you have the following installed on your machine:
- PHP 8.x
- Composer
- MySQL 5.x
- Node.js & npm

### Steps

1. **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/simantab.git
    cd simantab
    ```

2. **Install Dependencies**
    ```bash
    composer install
    npm install && npm run dev
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
    php artisan migrate
    ```

6. **Serve the Application**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    The application will be accessible at `http://localhost:8000`.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
