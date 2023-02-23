# REST API Starter

This is a starter code for building RESTful APIs using Laravel, a powerful PHP web application framework. This codebase is designed to provide developers with a quick and easy way to get started building APIs, with pre-configured packages and a basic structure for API development. It can also be used for beginners on the frontend side who need a rest API to consume. It also uses Cloudinary for image upload.

## Endpoints

This starter code includes the following endpoints:

- `GET /api/users`: Returns a list of all users.
- `GET /api/users/{id}`: Returns a single user by ID.
- `POST /api/users`: Creates a new user.
- `PUT /api/users/{id}`: Updates an existing user by ID.
- `DELETE /api/users/{id}`: Deletes a user by ID.
- `POST /api/login`: Logs in a user and returns an API token.
- `POST /api/logout`: Logs out a user and revokes their API token.
- `POST /api/upload`: Uploads an image file to Cloudinary.

## Packages Included

This starter code includes the following packages:

- [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum) for API authentication.
- [Cloudinary](https://cloudinary.com/) for image upload.

## Installation

### Requirements

To use this starter code, you will need the following installed on your system:

- PHP >= 7.4
- Composer
- MySQL or MariaDB

### Clone

- Clone this repo to your local machine using `git clone https://github.com/papi-knomic/Laravel-API-Starter`.
- Open the repository by navigating to its directory: `cd Laravel-API-Starter`.

### Setup

1. Install dependencies by running `composer install`.
2. Create a new `.env` file by copying `.env.example`: `cp .env.example .env`.
3. Generate a new app key: `php artisan key:generate`.
4. Set up your database connection in `.env`.
5. Run database migrations: `php artisan migrate`.
6. Create a new [Cloudinary](https://cloudinary.com/) account and get your API credentials. Add them to your `.env` file:
   `CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
   CLOUDINARY_UPLOAD_PRESET=preset
   CLOUDINARY_CLOUD_NAME=name
   CLOUDINARY_API_KEY=key
   CLOUDINARY_API_SECRET=secret`
7. Start the development server: `php artisan serve`.

### Usage

To use this starter code, you can send requests to the API using a tool like [Postman](https://www.postman.com/) or [Insomnia](https://insomnia.rest/).
You can also extend and add your own endpoints

## Contributing

To contribute to this project:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/feature-name`).
3. Make your changes and commit them (`git commit -am 'Add some feature'`).
4. Push to the branch (`git push origin feature/feature-name`)
5. Create a new pull request

## License

Distributed under the MIT License. See `LICENSE` for more information.
