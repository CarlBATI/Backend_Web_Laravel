# Note
I initially believed that Laravel 8.x was required. However, I discovered that other versions are also acceptable, so I transitioned to a new project using Laravel 10.x. Some code was transferred from the previous Laravel project.

## Tips
### Optional Parenthesis When No Args Given PHP
In PHP, when you're calling a method without any arguments, you can choose to include or exclude the parentheses.

``` php
// This
test()
// Is the same as this
test
```

### Efficiently Create Model, Factory, and Seeder for a Table
To create models, factories, and seeders for tables, you can use Laravel's `make:model` artisan command with the `-a` (or `--all`) option.

### Efficiently Create API Controller `--api`
```bash
php artisan make:controller ControllerName --api
```

The `--api` option tells Artisan to generate a controller that includes methods for a RESTful resource controller. These methods are `index`, `store`, `show`, `update`, and `destroy`.

*After running these commands, you should see the new controller files in the `app/Http/Controllers` directory.*

## Create VS Insert in EloquentORM
The `created_at` and `updated_at` fields are `NULL` when the `insert` method is used. `insert` is a simple query builder method that inserts a record into the database without triggering Eloquent's events or touching the timestamps.

If you want to have the `created_at` and `updated_at` fields automatically filled with the current timestamp, you should use the `create` method instead, which is a part of Eloquent ORM and does trigger these events.

### Using `{{ }}` for Localization
The `__()` function is a helper function provided by Laravel for localization or internationalization. It translates the given message based on your localization settings.

If a string `'Some text'` has a translation in the current locale, it will be replaced by the translated string. If not, the original string `'Some text'` will be used.

### List All Routes
``` bash
php artisan route:list
```

### Using web Middleware for Session Authentication
To ensure session-based authentication is recognized use the `'web'` middleware. If API routes are not using the `web` middleware group, which includes the `StartSession` middleware necessary for session-based authentication, authenticating and authorizing via the UI won't be possible.

Applying the `web` middleware group to API routes:

```php
Route::middleware(['web'])->group(function () {
    // Protected routes
});
```