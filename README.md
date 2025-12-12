# CS3IP

Main repository for CS3IP implementation (RL03: Web-based achievement system for primary/secondary education)

Sample compose file:

```
services:

  achievement_system:
    image: hcwy/achievement-system:latest
    container_name: achievement-system
    restart: always
    environment:
    # Available environment variables and their default values
      - APP_DEBUG=false # Whether debug messages should be displayed (false hides configuration and secrets from end user)
      - APP_URL=http://localhost # The URL of the application
      - DB_CONNECTION=mariadb # database you are using, must be one of mariadb, mysql or postgresql
      - DB_HOST=172.17.0.2 # IP address or hostname of database
      - DB_PORT=3306 # Port for database
      - DB_USERNAME=root # Database username
      - DB_PASSWORD=root # Database password
    ports:
      - 8000:80
    depends_on:
      db:
        condition: service_healthy # Waits for DB to be connectable before running post start commands
        restart: true
    post_start:
      - command: php artisan key:generate # Generates encryption key
      - command: php artisan migrate:refresh --seed # Runs migrations and seeds database
      - command: php artisan optimize:clear # Caches files

  db:
    image: mariadb
    container_name: db
    restart: always
    environment:
      MARIADB_DATABASE: achievement_system
      MARIADB_ROOT_PASSWORD: root
    ports:
      - 3306:3306
    healthcheck:
      test: ["CMD", "healthcheck.sh", "--connect", "--innodb_initialized"]
      start_period: 10s
      interval: 10s
      timeout: 5s
      retries: 3
```

`ACHIEVEMENT_SYSTEM_LOCAL_IP` should be set to the local IPv4 address of the host, on most Linux distributions this can be found using `ip a`, on Windows use `ifconfig`