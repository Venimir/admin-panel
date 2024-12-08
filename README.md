# Admin Panel

A powerful admin panel built with Laravel and Filament, featuring role-based access control, ad management, and analytics.

## Features

- **Role-Based Access Control**
  - Super Admin: Full access to all features
  - Admin: Access to all features except system-level configurations
  - Editor: Access to manage Ads and Ad Templates only
  - Viewer: Read-only access to the Dashboard

- **Ad Management**
  - Create and manage ads with title, description, URL, and status
  - Track ad status (pending, in-progress, completed)
  - Generate ad templates directly from ads

- **Ad Templates**
  - Create templates linked to ads
  - Manage template status (draft, active, archived)
  - Canva integration for design links
  - Automatic status updates

- **Analytics Dashboard**
  - Real-time churn rate calculation
  - Subscriber statistics
  - Performance metrics

## Requirements

- PHP 8.2 or higher
- Composer
- MySQL 5.7 or higher
- Node.js & NPM (for asset compilation)

## Installation

1. Clone the repository:
```bash
git clone <https://github.com/Venimir/admin-panel.git>
cd admin-panel
```

2. Install PHP dependencies:
```bash
composer install
```

3. Create and configure your environment file:
```bash
cp .env.example .env
```

4. Configure your database in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run migrations and seeders:
```bash
php artisan migrate:fresh --seed
```

7. Start the development server:
```bash
php artisan serve
```

## Default Users

After seeding, the following users are available:

1**Admin**
    - Email: superadmin@gmail.com
    - Password: superadmin

2. **Admin**
    - Email: admin@gmail.com
    - Password: admin

3. **Editor**
    - Email: editor@gmail.com
    - Password: password

4. **Viewer**
    - Email: viewer@gmail.com
    - Password: password


## Project Structure

- `app/Models/` - Contains all model definitions
- `app/Filament/` - Contains Filament resources and widgets
- `database/migrations/` - Database structure
- `database/seeders/` - Seed data for testing

## Additional Features

1. **Adds Management**
    - URL validation
    - Automatic status updates
    - Option for automatic Template generation after add is created.

2. **Ad Template Management**
   - Canva URL validation
   - Automatic status updates
   - Template generation from existing ads

3. **User Interface**
   - Modern and responsive design
   - Intuitive navigation
   - Role-specific views
   - 
4. **Churn Rate Calculation**
   - Automated calculation based on subscriber data
   - Real-time updates
   - Historical tracking

## Assumptions and Design Decisions

1. **Churn Rate Calculation**
   - Calculated over a 30-day rolling period
   - Considers both active and churned subscribers
   - Updates automatically with new data

2. **Ad Templates**
   - Maintains relationship with original ad

3. **User Roles**
   - Hierarchical permission structure
   - Role-based menu visibility
   - Granular access control

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a new Pull Request

## Security

- All routes are protected with appropriate middleware
- Role-based access control using Spatie Permissions
- Form validation and sanitization

## License

This project is licensed under the MIT License - see the LICENSE file for details.
