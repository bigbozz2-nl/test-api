## A Test API

# Setup
1. clone the repository
2. create and change the .env file
3. run `composer install`
4. run `php artisan migrate`
5. run `php artisan get:quotes`
6. run `php artisan serve`

# API endpoints
Don't forget to set the API key with key: token and value API_PASSWORD from the .env

- GET /api/v1/get-quote (_Get a single Kanye West quote_)
