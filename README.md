#  Alhasan diabetes center - Backend
- Location: Karbala, Iraq.

## Requirements
- PHP >= 8.0

## Installation
- Clone the repository to your local machine
- Run `composer install`
- Run `cp .env.example .env` to create variables file
- Edit .env file and fill the following information:
```apacheconf
APP_ENV=
APP_DEBUG=
APP_URL=

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

SANCTUM_STATEFUL_DOMAINS= (URL + Port of the frontend)
```
- Run `php artisan generate` to generate encryption key
- Create database then add it's name in the `.env` file in [DB_DATABASE]
- Run `php artisan migrate`
- Run ` php artisan db:seed --class=PermissionsSeeder` to publish permissions.
- Run
```apacheconf
  composer install --optimize-autoloader --no-dev;
  php artisan optimize:clear;
  php artisan optimize;
  php artisan config:clear;
  php artisan view:clear;
  php artisan config:cache;
  php artisan route:cache;
  php artisan view:cache;
  php artisan up;
  ```

## Testing
### Generate  data
- In your terminal run `php artisan tinker`
- Enter Model name like `$data = new App\Models\[Patients]`
- Decide how many records you need for testing by `$data->factory()->count([10])->create()`
