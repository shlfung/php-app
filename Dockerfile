FROM php:8.3-apache

# Install necessary dependencies, including SQLite development libraries
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    pkg-config \
    && docker-php-ext-install pdo pdo_sqlite

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container
COPY . /var/www/html

# Set file permissions for the SQLite database (if needed)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to be able to access the app via a browser
EXPOSE 80