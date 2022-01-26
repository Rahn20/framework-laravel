# Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## START

```
make install
php artisan serve
```

### Generata a model/controller/migration

```
php artisan make:model model-name
php artisan make:controller controller-name
php artisan make:migration migration-name

php artisan migrate

# Drop last migrated table
php artisan migrate:rollback
```

### Connecting To The Database CLI

```
php artisan db

# Specify a database
php artisan db mysql

#clear
php artisan config:cache
php artisan cache:clear
```

### Tests
```
#Create a new test case
php artisan make:test test-name

#Running tests
./vendor/bin/phpunit

php artisan test
```