# Utilise l'image officielle PHP 8.3 avec FPM
FROM php:8.3-fpm

# Mise à jour des paquets et installation des outils nécessaires
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    libxml2-dev \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    unzip \
    git \
    curl \
    vim \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        pgsql \
        zip \
        intl \
        opcache \
        gd \
        bcmath \
        pcntl \
        xml \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Configuration GD pour les images (ajout de JPEG et FreeType)
RUN docker-php-ext-configure gd --with-jpeg --with-freetype && \
    docker-php-ext-install gd

# Installe Composer (dernière version stable)
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copie les fichiers de configuration PHP si nécessaire
COPY ./php.ini /usr/local/etc/php/php.ini

# Définit le répertoire de travail
WORKDIR /var/www/html

# Expose le port 9000 pour PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
