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

SANCTUM_STATEFUL_DOMAINS=https://prs.esite-lab.com/portal
SESSION_DOMAIN=http://prs.esite-lab.com/portal
```
- Run `php artisan key:generate` to generate encryption key
- Create database then add it's name in the `.env` file in [DB_DATABASE]
- To generate [`areeb/password`, permissions, Diagnosis types], Run
- !Important `php artisan migrate:fresh` will delete OLD DATABASE and create new one with Initial Information.
```apacheconf
php artisan migrate:fresh && php artisan db:seed --class=DatabaseSeeder
```
To batch only new changes to the database WITHOUT effect on the existing data, use this command:
```apacheconf
php artisan migrate
```
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
