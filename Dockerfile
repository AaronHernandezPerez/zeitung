# Use PHP 7.2 with apache
FROM php:7.2-apache

# # Install necessary system libraries, including libargon2-dev
# RUN apt-get update && apt-get install -y libargon2-dev 

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# # Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application source code to /var/www/html
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Update Apache configuration for CodeIgniter
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/c\<Directory \/var\/www\/html\/>\n    Options Indexes FollowSymLinks\n    AllowOverride All\n    Require all granted\n<\/Directory>' /etc/apache2/apache2.conf

# Copy custom php.ini settings
RUN echo "date.timezone = UTC" > /usr/local/etc/php/conf.d/timezone.ini

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
