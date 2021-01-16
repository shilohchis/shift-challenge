# SHIFT - Interview Challenge

# How To
Make sure you have docker & docker compose installed on your OS
Refer these step by step to run the project using docker

  - Clone from my github repo at https://github.com/shilohchis/shift-challenge.git
  - Copy `.env.example` name it `.env`, change the database setup, save it
  - From your terminal, set the current directory to the root of repository, you can see file such Dockerfile, docker-compose.yml
  - Then from your terminal (root folder of the repo) run `docker-compose build app && docker-compose up -d` to install project dependency
  - Make sure the services run using `docker ps`
  - Still on the root repository folder, we'll install laravel dependency with command `docker-compose exec app composer install`.
  - After it, we need to set key for our laravel project `docker-compose exec app php artisan key:generate`
  - Setup our database tables, with command `docker-compose exec app php artisan migrate`
  - Seeding our questions on database with command `docker-compose exec app php artisan db:seed`
  - Next we'll install vue as our frontend, with `docker run -v $(pwd):/var/www -w /var/www node:10.16.3 npm install && npm run dev`
  - Open your browser, go to `http://localhost:8000/`
