# Use official MySQL image
FROM mysql:latest

# Set MySQL root password
ENV MYSQL_ROOT_PASSWORD=root

# Expose port 3306
EXPOSE 3306
