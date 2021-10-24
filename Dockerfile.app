FROM php:fpm-alpine

RUN docker-php-ext-install \
    # bcmath ctype fileinfo \
    # json \
    # mbstring \
    # openssl \ # installed by default
    pdo_mysql \
    # tokenizer xml
    ;

EXPOSE 9000
CMD ["php-fpm"]
