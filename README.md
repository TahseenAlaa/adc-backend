#  Alhasan diabetes center - Backend
- Location: Karbala, Iraq.

## Requirements
- PHP >= 8.0

## Installation
- Clone the repository to your local machine
- Run `composer install`
- Run `cp .env.example .env` to create variables file
- Run `php artisan generate` to generate encryption key
- Create database then add it's name in the `.env` file in [DB_DATABASE]
- Run `php artisan migrate`
- Run ` php artisan db:seed --class=PermissionsSeeder` to publish permissions.
- Run `php artisan serve`

## Testing
### Generate  data
- In your terminal run `php artisan tinker`
- Enter Model name like `$data = new App\Models\[Patients]`
- Decide how many records you need for testing by `$data->factory()->count([10])->create()`
