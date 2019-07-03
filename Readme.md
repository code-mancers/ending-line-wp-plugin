# Ending Line Wordpress Plugin
A sample plugin that appends a line to end of each post

## Using with docker
```bash
$ docker run -e MYSQL_ROOT_PASSWORD=<password> -e MYSQL_DATABASE=wordpress --name wordpressdb -d mariadb:latest

$ docker run -e WORDPRESS_DB_PASSWORD=<password> --name wordpress --link wordpressdb:mysql -p 80:80 -t ending-line-wp:latest
```