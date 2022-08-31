# SOBRE
PROJETO CRIADO PARA REALIZAR O DESAFIO TÉCNICO DA EMPRESA ORÇAAQUI

# CRIANDO AMBIENTE DA API

- NA RAIZ DO PROJETO
docker-compose up -d
copiar .env a partir do .env-exemple

docker-compose exec web sh
composer update
php artisan key:generate
php artisan jwt:secret
php artisan cache:clear
php artisan config:clear
php artisan migrate
php artisan db:seed
chmod -R 777 storage

# PARA EXECUTAR OS TESTES 
php artisan test --testsuite=Feature
