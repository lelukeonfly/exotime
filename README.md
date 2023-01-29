<p align="center"><a href="#" target="_blank"><img src="https://imgur.com/a/MSd3Y7y" width="400" alt="ExoTime Logo"></a></p>

## About ExoTime

ExoTime is a web application that aims to improve the social engagement among citizens. Citizens should be able to offer and commit work amongst each other in exchange for a currency. The currency is **time**. These kind of works should not focus on the work itself but on the social engagement amongst the citizens.

## Contributing

Thank you for considering contributing to ExoTime! Every help is much appreciated!

## Security Vulnerabilities

If you discover a security vulnerability within ExoTime, please send an e-mail to Lukas Mössler via [lukas.moessler@gmail.com](mailto:lukas.moessler@gmail.com). All security vulnerabilities will be promptly addressed.

## License

ExoTime is open-sourced software licensed under the [GNU GPLv2 License](https://opensource.org/licenses/gpl-2.0).

# Features

## Mobile Application

The mobile applications will comunicate with the backend through the api located in `web/api`.

# Models

The View exists out of multiple components such as layouts for logged in users and guests. Or also for buttons, input fields and anything that will be used multiple times. `DRY -> "Dont Repeat Yourself"`. These components take custom attributes and properties.

## User

## Post

### Service

### Demand

## Category

## Feedback

# Deployment

## Requirements
- php-8.1+
- composer
- docker (if you want to run it with laravel sail)

## Sail

First copy the file `docker-compose.yml.template` to `docker-compose.yml`.
To deploy the application in laravel sail you can add the `deploy.sh` to a cronjob and run it periodically if you want to have an up-to-date version running. Also make the script executable if you want to run it.
An other option is to do it without the git pull command and just run `composer install` to first install all dependencies (including laravel sail). Then you can migrate all tables fresh by typing `sail artisan migrate:fresh` or `./vendor/bin/sail artisan migrate:fresh`.
Then edit the `pg_hba.conf` file so the postgres database can accept connections from the `laravel.test` container. You can add the line `host  all all <hostname_of_container>   trust`
Edit the `docker-compose.yml` file: uncomment the ports for the `laravel.test` connection in case you want to access them on your host machine. Same goes for the `pgsql` container if you want to access it with a postgres client.

List of commands:
- `composer install`
- create the network `services` or attach it to the default network
  - `docker network create services`
  - set the `DB_HOST` variable in the env file to the container name `pgsql`
- `./vendor/bin/sail up -d`

To run npm dev:
- `./vendor/bin/sail npm install`
- `./vendor/bin/sail npm run dev`
