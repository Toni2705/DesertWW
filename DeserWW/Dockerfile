# Usa la imagen oficial de PHP 8.2 con Apache como servidor web
FROM php:8.2-apache

# Actualiza el sistema y agrega dependencias necesarias
RUN apt-get update && \
    apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Establece el directorio de trabajo en el directorio raíz de la aplicación Laravel
WORKDIR /var/www/html

# Copia los archivos de la aplicación Laravel al contenedor
COPY . .

# Instala las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Cambia los permisos de los archivos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 80 para el servidor web
EXPOSE 80

# Ejecuta el servidor Apache en primer plano cuando el contenedor se inicia
CMD ["apache2-foreground"]

