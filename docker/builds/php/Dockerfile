FROM php:8.0-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    cron \
    libpq-dev \
    nano \
    sendmail \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    unzip

# Add crontab file in the cron directory
ADD ./crontab /etc/cron.d/cron

# Give execution rights on the cron job
RUN chmod 0644 /etc/cron.d/cron

# Create the log file to be able to run tail
#RUN touch /var/log/cron.log

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo pdo_mysql intl mbstring zip opcache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set php.ini file
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Run cron process on container startup
CMD cron && docker-php-entrypoint php-fpm
#CMD ["cron", "-f"]
#CMD docker-php-entrypoint php-fpm

