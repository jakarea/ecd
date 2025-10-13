# Admin Panel Setup Guide

## Overview
This Laravel application now includes a simple admin panel with authentication.

## Installation Steps

### 1. Run Migrations
Make sure your database is configured in `.env`, then run:
```bash
php artisan migrate
```

### 2. Create Admin User
Run the seeder to create a default admin user:
```bash
php artisan db:seed --class=AdminUserSeeder
```

This will create an admin user with the following credentials:
- **Email:** `admin@ecd.com`
- **Password:** `password123`

**⚠️ Important:** Change these credentials in production!

## Accessing the Admin Panel

### Login
- URL: `http://your-domain.com/admin/login`
- Local: `http://localhost/admin/login`

### Dashboard
- URL: `http://your-domain.com/admin/dashboard`
- Local: `http://localhost/admin/dashboard`

## Routes

All admin routes are defined in `routes/admin.php` with the `/admin` prefix:

| Method | URL | Name | Description | Auth Required |
|--------|-----|------|-------------|---------------|
| GET | `/admin/login` | `admin.login` | Show login form | No |
| POST | `/admin/login` | `admin.login.post` | Process login | No |
| GET | `/admin/dashboard` | `admin.dashboard` | Admin dashboard | Yes |
| POST | `/admin/logout` | `admin.logout` | Logout | Yes |

## File Structure

```
app/
├── Http/
│   └── Controllers/
│       └── Admin/
│           ├── AdminController.php    # Main admin controller
│           └── AuthController.php     # Authentication controller

resources/
└── views/
    └── admin/
        ├── layouts/
        │   └── app.blade.php         # Admin layout template
        ├── auth/
        │   └── login.blade.php       # Login page
        └── dashboard.blade.php       # Dashboard page

routes/
└── admin.php                         # Admin routes

database/
└── seeders/
    └── AdminUserSeeder.php          # Admin user seeder
```

## Features

### Authentication
- ✅ Login with email and password
- ✅ Remember me functionality
- ✅ Session management
- ✅ Logout
- ✅ Protected routes (redirects to login if not authenticated)

### Dashboard
- ✅ Clean, simple design
- ✅ User statistics
- ✅ Placeholder for bookings/revenue
- ✅ Quick actions
- ✅ System status

### Security
- ✅ CSRF protection
- ✅ Password hashing
- ✅ Session regeneration on login
- ✅ Guest middleware for login page
- ✅ Auth middleware for protected pages

## Customization

### Adding New Admin Routes
Edit `routes/admin.php`:

```php
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::resource('/bookings', BookingController::class);
});
```

### Adding Navigation Items
Edit `resources/views/admin/layouts/app.blade.php` and add links in the navigation:

```html
<nav class="admin-nav">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="#">Users</a>
    <a href="#">Bookings</a>
    <a href="#">Settings</a>
</nav>
```

### Styling
The admin panel uses inline styles for simplicity. The design follows these principles:
- Clean and minimal interface
- Brand color (`#6ADBD9`) for primary actions
- Responsive design
- Card-based layout

To customize colors, update the CSS variables in `resources/views/admin/layouts/app.blade.php`.

## Creating Additional Admin Users

### Via Tinker
```bash
php artisan tinker
```

```php
App\Models\User::create([
    'name' => 'Admin Name',
    'email' => 'admin@example.com',
    'password' => Hash::make('your-password'),
    'email_verified_at' => now(),
]);
```

### Via Seeder
Modify `database/seeders/AdminUserSeeder.php` and add more users.

## Production Considerations

1. **Change Default Credentials**
   - Update or remove the default admin user after first login

2. **Use Strong Passwords**
   - Enforce password policies
   - Consider 2FA for admin accounts

3. **HTTPS Only**
   - Always use HTTPS in production
   - Set `SESSION_SECURE_COOKIE=true` in `.env`

4. **Rate Limiting**
   - Add rate limiting to login routes to prevent brute force attacks

5. **Admin Role System**
   - Consider adding a `role` column to users table
   - Implement role-based access control (RBAC)

## Troubleshooting

### Cannot Access Dashboard
- Make sure you're logged in
- Clear browser cache and cookies
- Check session configuration in `.env`

### Login Not Working
- Verify database connection
- Run migrations: `php artisan migrate`
- Create admin user: `php artisan db:seed --class=AdminUserSeeder`
- Check credentials

### 404 Error
- Clear route cache: `php artisan route:clear`
- Check if `routes/admin.php` exists
- Verify `bootstrap/app.php` includes admin routes

## Next Steps

Consider adding these features:
- User management (CRUD)
- Booking management
- Email notifications
- File uploads
- Activity logs
- Settings page
- Profile management
- Role-based permissions

## Support

For issues or questions, check:
- Laravel Documentation: https://laravel.com/docs
- Laravel Authentication: https://laravel.com/docs/authentication
