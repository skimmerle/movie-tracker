# Movie Tracker

This small project searches The Open Movie Database api and 
gave you the possibility to store your favourite movies and 
mark them as seen

## Installation
* `git clone git@github.com:skimmerle/movie-tracker.git`
* `composer install`
* `npm run production`
* Copy .env.example to .env
* Get an apiKey from http://www.omdbapi.com/ and store it as 
  OPEN_MOVIE_API_KEY in your .env file
* Set your database password as DB_PASSWORD in your .env file

## Developing
To run the project on your local machine you will need
* At least PHP 7.4 installed
* Docker (https://www.docker.com/)

Start the docker instances with
`./vendor/bin/sail up`
If everything works, the project will be available on
http://localhost

To get started with a user and some movie data call
`./vendor/bin/sail artisan migrate --seed`
<details>
<summary>
After this you can log in with the credentials
</summary>
E-Mail: steffen@schmidts.casa<br/>
Password: password
</details>

### Developing Frontend
Instead of production build you should use the development build
* `npm run dev`
* `npm run watch`

#### VueJS / Vuetify
All source files of VueJS are beneath the directory /resources/js
The project uses Vuetify as design framework
If you decouple the backend to a different url, you can just 
use the frontend with
* `php artisan serve`

The Frontend is now available on the URL http://localhost:8000

### Developing Backend
The controllers for the api are stored in the directory 
app/Http/Controllers.
The communication with The Open Movie Database api is handled in
the OpenMovie client. The sources are stored in packages/MovieApi.

## Production
For production mode, you can use the apache vhost stored in 
serverConfig/vhost.conf as example to get your apache running
