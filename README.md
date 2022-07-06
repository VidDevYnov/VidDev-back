# VidDev-back

#After clonning project you have to:
composer instal

#Create file .env and add in this file :
DATABASE_URL="mysql://root:@127.0.0.1:3306/auth?serverVersion=5.7"

#Instalation of bdd
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
php bin/console doctrine:database:create
 
#Add to bdd
php bin/console make:migration
php bin/console doctrine:migrations:migrate

#Generation ok SSH keys:
php bin/console lexik:jwt:generate-keypair

# Start server: 
php -S localhost:8000 -t public


