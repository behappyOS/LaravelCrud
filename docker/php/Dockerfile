# Usar uma imagem base do PHP com o FPM
FROM php:8.2-fpm

# Instalar dependências de sistema
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_pgsql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho
WORKDIR /var/www

# Copiar o código-fonte da aplicação
COPY . .

# Instalar dependências do Composer
RUN composer install

# Definir permissões corretas
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expor a porta que o serviço vai usar
EXPOSE 9000

# Comando padrão para iniciar o serviço PHP-FPM
CMD ["php-fpm"]
