FROM php:7.2.6-fpm
WORKDIR /code

RUN apt-get update; \
    apt-get  install -yq \
        git

RUN pecl install xdebug; \
    echo zend_extension="/usr/local/lib/php/extensions/no-debug-non-zts-20170718/xdebug.so" >> /usr/local/etc/php/conf.d/xdebug.ini; echo; \
    echo xdebug.remote_enable=1 >> /usr/local/etc/php/conf.d/xdebug.ini; echo; \
    echo xdebug.remote_port = 9001 >> /usr/local/etc/php/conf.d/xdebug.ini; echo; \
    echo xdebug.idekey = PHPSTORM >> /usr/local/etc/php/conf.d/xdebug.ini; echo; \
    echo xdebug.remote_connect_back=1  >> /usr/local/etc/php/conf.d/xdebug.ini;

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"; \
    php composer-setup.php --install-dir=/bin; \
    php -r "unlink('composer-setup.php');";

CMD php /bin/composer.phar install; \
    php-fpm