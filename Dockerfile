# Utilisez une image PHP de base
FROM php:8.1-fpm

# Installez les dépendances nécessaires (ex. pour Symfony)
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# Activez les extensions PHP nécessaires pour Symfony
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql zip gd

# Installez Composer (gestionnaire de dépendances PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définissez le répertoire de travail
WORKDIR /var/www/html

# Copiez les fichiers Symfony dans le conteneur
COPY . .

# Installez les dépendances de Symfony
RUN composer install

# Exposez le port du serveur web PHP-FPM (par défaut, c'est le port 9000)
EXPOSE 9000

# Commande d'entrée pour exécuter le serveur PHP-FPM
CMD ["php-fpm"]