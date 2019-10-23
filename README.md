# zavrsni
Završni projekat - IT obuka. III grupa. Branko Sudimac, Marko Lazić, Dalibor Kalember
-Za aplikaciju slanja mejlova neophodno je instalirati Composer u root projekta

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

-Isto uraditi za Firebase.php
composer require firebase/php-jwt


///
Kreiarati nalog na Send Gridu i upotrebiti API key koji treba postaviti u odgovarajuce skripte
*newsletter.php
*mailer.php
*mailer_vet.php

//
-instalirati SQL bazu iz foldera SQL



