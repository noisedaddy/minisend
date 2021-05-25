# MailerTest

## TODO

1. clone the repo

2. copy `.env.example` to `.env` and add database and queue credentials 

3. `composer install`

4. If not generated, generate jwt token and app key using  `php artisan jwt:secret` and `php artisan key:generate`

5. `npm install`

6. Run `sudo chmod -R 777 storage/` and `sudo chmod -R 777 bootstrap/`

7. `php artisan migrate:fresh  --seed`

8. `sudo chmod -R 777 public/uploads/` add write permissions to public/uploads folder

9. `php artisan queue:work` to be able to queue emails for 30sec

10. Route for login is `/auth/login` login: admin@admin.com 123123

## Guidelines

1. `npm run watch`

2. Frontend app is in resources/client

3. Email status is updated from event Listiner after the mail is sent from queue

4. Create minisend_v6_testing db on yout localhost

4. For testing run `php artisan migrate --database=testing` or ` php artisan migrate --env=testing`
