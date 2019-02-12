FROM mysql:5.7

ENV MYSQL_ROOT_PASSWORD=superroot
ENV MYSQL_DATABASE=search_db
ENV MYSQL_USER=php_user
ENV MYSQL_PASSWORD=php_user


#Add scripts to image
COPY ./scripts/ /docker-entrypoint-initdb.d/

#Add config
COPY mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf
