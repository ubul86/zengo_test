# Installation instructions!

Clone the repository
```
git clone https://ubul86@bitbucket.org/ubul86/zengo_test.git
```

## If you have docker, linux:
### with make command:
If you have no rights to run install.sh, first you need to set the permissions to execute 
```
chmod +x shell/install.sh
```
 
Copy {project_root} .env file to {project_root}/src/.env, and don't modify them
```
cp .env src/.env
```
 
Initialize docker with make
```
make install
```
 
 Compile vue
```
make npm run
```
### Without make:
Copy {project_root} .env file to {project_root}/src/.env, and don't modify them
```
cp .env src/.env
```

Builds, (re)creates, starts, and attaches to containers for a service.
```
docker-compose up -d;
```

Run Composer install
```
docker-compose run --rm composer install
```

```
docker-compose run --rm composer dump-autoload 
```

Migrate db
```
docker-compose exec site php artisan migrate:fresh --seed
```

Publish contents
```
docker-compose exec site php artisan vendor:publish --all
```

Create the symbolic link
```
docker-compose exec site php artisan storage:link -v
```

Clear the cache
```
docker-compose exec site php artisan cache:clear
```

Add permission to storage
```
docker-compose exec site chmod -R 777 storage/
```

Install npm
```
docker-compose run --rm npm install
```

Compile vue
```
docker-compose run --rm npm run dev
```

After that You can call http://localhost:13300 in your browser.

## Without docker:

Go to the {project_root}/src directory
```
cd {project_root}/src
```

Copy the example env file and make the required configuration changes in the .env file
```
cp .env.example .env
```

Generate a new application key
```
php artisan key:generate
```

Run the database migrations (**Set the database connection in .env before migrating**)
```
php artisan migrate:fresh --seed
```

Compile vue
```
npm run dev
```
 
Start the local development server
```
php artisan serve
```

You can reach the site of the default http://localhost:8000