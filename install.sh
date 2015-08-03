
echo "DROP DATABASE IF EXISTS ecole" | mysql --user=root --password=root
echo  "CREATE DATABASE conference DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci" | mysql --user=root --password=root
echo "DELETE FROM mysql.user WHERE user='admin' AND host='admin'" | mysql --user=root --password=root
echo "GRANT ALL PRIVILEGES ON conference.* to 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION" | mysql --user=root --password=root

composer composer install
php artisan migrate --seed
php artisan serve
