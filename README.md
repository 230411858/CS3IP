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
      - ACHIEVEMENT_SYSTEM_LOCAL_IP=
    ports:
      - 8000:80
    depends_on:
      db:
        condition: service_healthy
        restart: true
    post_start:
      - command: php artisan migrate:fresh --seed

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