## Requirements

- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

## Install

```bash
git clone http://gitlab-okt.sed.hu/IB153I-2_watchdogs-of-farron/Moviefy.git
cd Moviefy/
composer install            # install project dependencies

cp .env.example .env        # create enviroment config file
nano .env                   # edit configuration (mail smtp options, db credentials you choose on db creation, debug mode). also you can edit mail config at config/mail.php file
php artisan key:generate    # generate unique application key
php artisan migrate         # run database migrations

// run development server. choose unused port
php artisan serve --port 8444 # now site can be accessed at http://localhost:8444
```

Then create Manager user

open tinker repl (to quit type `\q`)
```bash
php artisan tinker
```

in tinker type
```php
$user = new \App\User;
$user->email = 'admin@example.ru';
$user->password = Hash::make('somePassword'); # replace somePassword with strong manager password
$user->name = 'Administrator Name';
$user->save();
\q # quit tinker
```

## Development

- controllers: `app/Http/Controllers/`
- routes: `routes/web.php`
- main config `config/app.php`


To see all defined routes and corresponding controller methods use `php artisan route:list` console command
