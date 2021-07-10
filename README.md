sub
===
Allows you to send out mass text messages to a list of subscribers.

### Installation

1) Download zip of the repository and unzip.
2) Run `composer install` from inside the target dir
3) Create a database `sub` 
4) Run `php artisan migrate`
5) Rename `.env.default` to `.env` and add the connection info for the database in `.env`.
6) Set up a twilio account.
7) Add the twilio info in `.env`
8) Provision a new phone number.
9) Upload everything to a server for hosting.
10) run `php artisan key:generate`
11) Point the webhook to your https://your-web-server/subscribe.php.  HTTP POST should be the method used.
12) `$subscribe_keyword` (default "SUB") and `$unsubscribe_keyword` (default "UNSUB") are the trigger words for your subscribers to be added and removed.
13) Once your admin (or broadcaster, the person who is sending out the notifications) has been enrolled in the database, you can set the `is_admin` field to `1`.

### Admin Usage
An admin can send an SMS with `broadcast` and then some message.  That message will be sent to all subscribers.

Lots of room for improvement.

### Local MySQL Container for Development
#### Start the mysql container
```
docker run --name sub-mysql \
  -e MYSQL_ROOT_PASSWORD=sub \
  -e MYSQL_DATABASE=sub \
  -e MYSQL_USER=sub \
  -e MYSQL_PASSWORD=sub \
  -p 3306:3306 \
  -d mysql:8
```

#### Create the schema
```
docker run -i --network=host mysql mysql --host=0.0.0.0 --user=sub --password=sub sub < database.sql
```

#### Connect to the db from the command line
```
docker run -it --network=host mysql mysql --host=0.0.0.0 --user=sub --password=sub sub
```

#### Modify config.php
```
static $mysql_hostname = "0.0.0.0";
static $mysql_username = "sub";
static $mysql_password = "sub";
static $mysql_database = "sub";
```
