# Event Management System

This is a skill assessment for Web Development Advanced from NIT Australia.

A Laravel-based web application for managing events and members (not admins). This system allows administrators to create, manage, and delete events, as well as manage user accounts.

## Features

- **User Management**
  - User registration and authentication
  - Role-based access control (admin and member roles)
  - User profile management with personal information
  - Admin can create, edit, and delete user accounts

- **Event Management**
  - Create, view, and delete events
  - Upload and resize event images
  - Filter events by location and date
  - Pagination for event listings

- **Authentication**
  - Secure login and logout functionality
  - Admin-only access for certain features

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- Database (MySQL, PostgreSQL, SQLite)

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <project-folder>
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JavaScript dependencies:
   ```bash
   npm install
   ```

4. Create a copy of the `.env.example` file:
   ```bash
   cp .env.example .env
   ```

5. Generate an application key:
   ```bash
   php artisan key:generate
   ```

6. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_username
   DB_PASSWORD=your_database_password
   ```

7. Run database migrations:
   ```bash
   php artisan migrate
   ```

8. Create a symbolic link for storage:
   ```bash
   php artisan storage:link
   ```

9. No frontend build step required (using plain Bootstrap):
   ```bash
   # The project uses plain Bootstrap with Blade templates
   # No compilation needed
   ```

10. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

### Admin Features

1. **User Management**
   - Create new users with the member role
   - Edit user information
   - Delete users

2. **Event Management**
   - Create new events with title, description, date, location, and price
   - Upload images for events
   - Delete events

### Public Features

1. **View Events**
   - Browse all events
   - Filter events by location and date

2. **Authentication**
   - Login to access admin features

## Dependencies

### PHP Dependencies
- Laravel Framework 12.0
- Intervention/Image 3.11 (for image manipulation)
- Propaganistas/Laravel-Phone 6.0 (for phone number validation)

### Development Dependencies
- Pest PHP (for testing)
- Laravel Pint (for code styling)
- Larastan (for static analysis)

## Development

Run the development environment using Laravel's artisan commands:

1. Start the Laravel development server:
```bash
php artisan serve
```

2. No frontend build step required (using plain Bootstrap):
```bash
# The project uses plain Bootstrap with Blade templates
# No compilation needed
```

It is a simple project, nothing else required.

## Testing

Run tests with Laravel's artisan commands:

1. Clear the configuration cache:
```bash
php artisan config:clear --ansi
```

2. Run the tests:
```bash
php artisan test
```

## License

This project is licensed under the MIT License.
