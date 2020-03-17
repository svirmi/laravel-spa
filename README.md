```bash
$ docker-compose up -d
$ docker-compose exec app bash # executing bash inside app service
$ composer install
$ yarn install
$ yarn dev || yarn watch
```
http://app.localhost/

http://phpmyadmin.app.localhost/ 

To run all tests inside container type
```bash
vendor/bin/phpunit
```
To run some specific test:
```bash
vendor/bin/phpunit --filter a_contact_can_be_added
```