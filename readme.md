
# School Library Management Application

The School library management application is an application that helps library staff to handle the management process and services at the library and make it easier for library members to make transactions and search for books.


## Tech Stack

**Client:** Bootstrap 3

**Server:** PHP 7.2, Laravel 5.4


## Run Locally

Clone the project

```bash
  git clone https://github.com/h10n/School-Library-Management-Application.git
```

Go to the project directory

```bash
  cd School-Library-Management-Application
```

Install dependencies

```bash
  composer install
```

Environment Configuration

```bash
  copy .env.example .env
```


## Environment Variables

To run this project, you will need to change the following environment variables in your .env file

`DB_PORT`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`


## Installation

Set application key 

```bash
php artisan key:generate
```
Database Migrations & Seeding

```bash
php artisan migrate:refresh --seed
```
Create the symbolic link

```bash
php artisan storage:link
```
    
## Running Tests

To run tests, run the following command

```bash
  php artisan serve
```


## Authors

- [@h10n](https://www.github.com/h10n)


## License
Copyright © 2022 Nur Hakim.

This project is [MIT](https://choosealicense.com/licenses/mit/) Licensed.


## Support

Please ⭐️ this repository if this project helped you!


[![ko-fi](https://img.shields.io/badge/Ko--fi-F16061?style=for-the-badge&logo=ko-fi&logoColor=white)](https://ko-fi.com/h10n_/)

[![buy-me-a-coffee](https://img.shields.io/badge/Buy_Me_A_Coffee-FFDD00?style=for-the-badge&logo=buy-me-a-coffee&logoColor=black)](https://www.buymeacoffee.com/h10n/)

[![trakteer](https://cdn.trakteer.id/images/embed/trbtn-red-1.png)](https://trakteer.id/h10n/tip/)

[<img src="https://cdn.trakteer.id/images/embed/trbtn-red-1.png" width="128">](https://trakteer.id/h10n/tip/)

