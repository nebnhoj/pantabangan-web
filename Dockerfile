# Use the official serversideup/php:8.2-fpm-nginx image as a base
FROM serversideup/php:8.3-fpm-nginx

# Set the working directory
WORKDIR /var/www/html

# Copy the Laravel project files to the container
COPY --chown=www-data:www-data . /var/www/html

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader
# Copy the custom Nginx configuration
#COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Expose port 8080
EXPOSE 8080


