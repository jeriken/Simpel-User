# Simpel User

## Technologies Used

- **Backend Framework**: Laravel
- **Frontend Framework**: Vue.js
- **Build Tool**: Laravel Mix

## Installation

### Prerequisites

- PHP 7.4 or higher
- Composer
- Node.js

### Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/jeriken/Simpel-User
    cd simpel-user
    ```

2. Install backend dependencies:
    ```bash
    composer install
    ```

3. Create a `.env` file:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Configure your database in the `.env` file.

6. Run migrations:
    ```bash
    php artisan migrate
    php artisan passport:client --personal
    php artisan passport:keys --force
    php artisan db:seed --class=UserSeeder
    ```

7. Install frontend dependencies:
    ```bash
    npm install
    ```

8. Compile the assets:
    ```bash
    npm run dev
    ```

9. Serve the application:
    ```bash
    php artisan serve
    ```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries or questions, please contact us at [mrazin311@gmail.com](mailto:mrazin311@gmail.com).