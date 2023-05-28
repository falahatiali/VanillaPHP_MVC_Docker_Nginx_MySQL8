START

WRITER: Ali falahati (alifalahati2010@gmail.com)

#START

This project is based on a custom MVC framework and designed from scratch, with classes tailored specifically for the current project (similar to Laravel's structure). Several libraries and dependencies were used in the design of this structure, which are mentioned below. If you intend to run this project in the regular manner, first place it in your desired directory and type the following command in the terminal:

```
cp .env.example .env
```
Then, in the database directory, navigate to the `docker` folder and copy the commands from the `init-db.sql` file and execute them in the command line to create the database, or import the file directly. Now, navigate to the root directory of the project using the terminal and run the following command:

```
php -S 127.0.0.1:8888 -t public/
```
Open your browser and go to `localhost:8888`. Please ensure that you have set the appropriate configurations in the `.env` file.

To run this project using Docker, simply execute the following commands in order. However, you must have Docker installed on your system. First, type the following command in your terminal:

```
docker network create yektadg_network
```
Then, run the following command:

```
docker-compose -f docker-compose.yml up -d
```
After downloading the required images and running the containers, type the following command:

```
docker ps
```
The output of this command should display three containers named `yektadgphp`, `mysqldb`, and `nginx`. Now, open the `.env` file and modify the values as follows:

```
DB_TYPE=mysql
DB_DRIVER=pdo_mysql
DB_HOST=mysqldb
DB_PORT=3306
DB_DATABASE=yektadg_db
DB_USERNAME=root
DB_PASSWORD=123456789
```
Next, open your browser and go to the following address:

```
http://127.0.0.1:8086/
```

************************

This project is a custom MVC framework written in vanilla PHP. It utilizes Composer for autoloading and implements namespaces.

To enhance security and availability, I have decided to store local variables using the following library, which allows all variables to be defined in the `.env` file:

```
DOTENV for environment variables: https://github.com/vlucas/phpdotenv
```

For creating containers and designing an efficient IoC container, I have utilized the following library:

```
Container: https://github.com/thephpleague/container
```

To handle routing and URL mapping, I have employed a flexible and powerful routing library:

```
Routing: https://github.com/thephpleague/route
```

For validation and data verification, I have used the following library, which provides a structure similar to Laravel and allows for flexible validation rules:

```
https://github.com/vlucas/valitron
```

Additionally, I have implemented custom validation rules, such as the `exists` rule for ensuring the uniqueness of a field in the database, to demonstrate how custom validation rules can be created.

For database interactions, I have utilized Doctrine, which is the default ORM for the Symfony framework. It offers ease of use and provides powerful features:

```
https://www.doctrine-project.org/index.html
```

Please note that this README assumes some basic knowledge of PHP, Composer, and Docker. If you encounter any issues or have further questions, please don't hesitate to reach out to the writer mentioned at the beginning of this document.

#END
