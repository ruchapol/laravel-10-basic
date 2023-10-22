# Use an official PHP runtime as a parent image
FROM php:8.2-cli

# Install MySQL driver
RUN docker-php-ext-install pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# replace env file with docker.env
COPY docker.env /var/www/html/.env

# Install Laravel dependencies
RUN composer install

# Install Node.js and npm
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y \ 
    nodejs \
    npm

# Install Node.js dependencies
RUN npm install

# run npm build to build assets
RUN npm run build

# Give the web server permissions to access the application
RUN chown -R www-data:www-data /var/www/html

# Expose port 8000 to the outside world
EXPOSE 8000

# Run php artisan serve when the container launches
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]