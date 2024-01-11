# Note
I initially believed that Laravel 8.x was required. However, I discovered that other versions are also acceptable, so I transitioned to a new project using Laravel 10.x. Some code was transferred from the previous Laravel project.

## Tips

### Efficiently Create Model, Factory, and Seeder for a Table
To create models, factories, and seeders for tables, you can use Laravel's `make:model` artisan command with the `-a` (or `--all`) option.

## Create VS Insert in EloquentORM
The `created_at` and `updated_at` fields are `NULL` when the `insert` method is used. `insert` is a simple query builder method that inserts a record into the database without triggering Eloquent's events or touching the timestamps.

If you want to have the `created_at` and `updated_at` fields automatically filled with the current timestamp, you should use the `create` method instead, which is a part of Eloquent ORM and does trigger these events.