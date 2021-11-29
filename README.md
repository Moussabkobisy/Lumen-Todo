# Lumen Todo App

# Installation

1. Clone this repo


2. Install composer packages

```
$ composer install
```

3. Create and setup .env file

```
make a copy of .env.example
$ copy .env.example .env
$ php artisan key:generate
put database credentials in .env file
```
## Run
Once you [install Docker](https://docs.docker.com/), you can start the containers using Docker Compose
```sh
$ docker-compose up -d
```

You should be able to visit the app at [http://localhost:8080](http://localhost:8080)
You should also be able to run artisan commands from your local machine :)

```
$ php artisan migrate
```
 Passport install and setup

```
$ php artisan passport:install
Put these keys and values in .env file
PASSPORT_LOGIN_ENDPOINT=
PASSPORT_CLIENT_ID=
PASSPORT_CLIENT_SECRET=
```
