## Requirement
- php ^8.1
- laravel 10

## Installation

- clone github ``` git clone git@github.com:mtriwardanaa/online-test-dot-indonesia.git ```
- ``` cd online-test-dot-indonesia ```
- ``` composer install ```
- copy .env.example to .env
- change some .env values

```bash
  APP_NAME="Online test DOT Indonesia" // app name
  APP_ENV=local // local, stage, production
  APP_KEY=
  APP_DEBUG=true // on production set to false
  APP_URL=http://online-test-dot-indonesia.test // domain app

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=online_test_dot_indonesia
  DB_USERNAME=root
  DB_PASSWORD=

  RAJAONGKIR_API_KEY=0df6d5bf73xxxxxxxxxxxeb8717c92c
  RAJAONGKIR_BASE_URL=https://api.rajaongkir.com/starter
  SEARCH_SOURCE=database //database, raja_ongkir
```

- ``` php artisan key:generate ```
- ``` php artisan migrate ```
- if it's your first time deploying, run ``` php artisan db:seed ```
- ```php artisan passport:keys```


## Running Project

- ``` php artisan serve ```
- import postman collection from this documentation ``` https://documenter.getpostman.com/view/8315413/2s9YyzcHhS ```
- Command fetching province from raja ongkir ``` php artisan raja-ongkir:fetch:province ```
- Command fetching city from raja ongkir ``` php artisan raja-ongkir:fetch:city ```

## Test Project
- ``` php artisan test ```
