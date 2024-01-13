# Project Setup

After cloning the repository, navigate to the project directory and run the following commands:

1. Install the project dependencies:

```bash
composer install
npm install
```

2. Create a symbolic link from `public/storage` to `storage/app/public`:

```bash
php artisan storage:link
```

3. Run the database migrations (set up your database connection in `.env` before running this command):

```bash
php artisan migrate
```

4. Run the database seeds

```bash
php artisan db:seed
```