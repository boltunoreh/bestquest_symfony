Installation

Windows (WSL2)

Run docker
1. copy `docker/.env.dist` to `docker/.env`
2. configure `MYSQL_ROOT_PASSWORD` if needed
2. go to docker dir 
   ```
   cd docker
   ```
3. Build and run containers
   ```
   docker-compose up -d
   ```

Configure application
1. copy `app/config/parameters.yml.dist` to `app/config/parameters.yml`
2. configure database:
   ```
    database_host: mariadb
    database_port: null
    database_name: bqbs
    database_user: root
    database_password: %YOUR_PASSWORD_HERE%
   ```
3. go to php container
   ```
   docker-compose exec php bash
   ```
4. install dependencies
   ```
   composer install
   ```

Create database
1. connect to docker mysql
   ```
   mysql bqbs -h localhost -P 3305 --protocol=tcp -u root -p
   ```
2. Create database
   ```
   CREATE DATABASE bqbs;
   ```
3. Connect to prod server with ssh
4. create database dump
   ```
   mysqldump best_quest -u best_quest -p > bqbs_2021_11_10_22_13_00.sql
   ```
5. download it with scp
6. load dump
   ```mysql bqbs -h localhost -P 3305 --protocol=tcp -u root -p < ~/bqbs_2021_11_10_22_13_00.sql
   ```
   
Download media files
1. connect to prod server with ssh
2. gzip `uploads` folder content
   ```
   tar -zcvf uploads.tar.gz --directory=/var/www/best-quest.ru/shared/web/uploads .
   ```
3. download it with scp
4. create target dir
   ```
   mkdir %PATH_TO_PROJECT%/web/uploads
   ```
5. unzip folder
   ```
   tar -xvzf uploads.tar.gz -C %PATH_TO_PROJECT%/web/uploads/
   ```