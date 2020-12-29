FROM wyveo/nginx-php-fpm:php74

WORKDIR /usr/share/nginx/

RUN rm -rf /usr/share/nginx/html

COPY . /usr/share/nginx

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www
