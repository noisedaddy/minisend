# MailerTest

## TODO

1. clone the repo

2. copy `.env.example` to `.env` and add database and queue credentials 

3. `composer install`

4. `composer update`

5. `npm install`

6. `sudo chmod -R 777 storage/`

7. `php artisan migrate:fresh  --seed`

8. `sudo chmod -R 777 public/uploads/` add write permissions to public/uploads folder

9. `php artisan queue:work` to be able to queue emails for 30sec

10. route for login is `/auth/login` login: admin@admin.com 12123

## Dev

1. `npm run watch`

2. Frontend app is in resources/client

3. Email `sent` status is updated from event Listiner after the mail is sent from queue

### General Dev Guidelines

### TODO
