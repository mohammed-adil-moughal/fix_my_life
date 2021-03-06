# Set_Up_Redis

  `sudo apt-get install make gcc g++`
  
  ## Dowload Redis package and unpack

  ```
  mkdir -p /tmp/redis
  cd /tmp/redis
  wget http://download.redis.io/releases/redis-stable.tar.gz
  tar xzf redis-stable.tar.gz
  cd redis-stable
  ```

  ## Next step is to compile Redis with make utility and install

  ```
  make
  sudo make install clean
  ```
  
  ## Add user redis

  `sudo useradd -s /bin/false -d /var/lib/redis -M redis`
  
  ## Create Redis pid file directory

  `sudo mkdir /var/run/redis/ -p && sudo chown redis:redis /var/run/redis`
  
  ## Create Redis config directory

  `sudo mkdir /etc/redis && sudo chown redis:redis /etc/redis -Rf`
  
  ## Create Redis logs directory

  `sudo mkdir /var/log/redis/ -p && sudo chown redis:redis /var/log/redis/ -Rf`
  
  ## Ceate Redis config and put it to /etc/redis/redis.conf:

  ```
  sudo mkdir /etc/redis
  sudo cp redis.conf /etc/redis/redis.conf
  sudo chown redis:redis /etc/redis/redis.conf
  ```
  
  ## Change parameters in config with your preferred text editor. For example, with nano

  `sudo nano /etc/redis/redis.conf `
  ```
  ## Minimum configuration example:

  #start as a daemon in background
  daemonize yes
  #where to put pid file
  pidfile /var/run/redis/redis.pid
  #loglevel and path to log file
  loglevel warning
  logfile /var/log/redis/redis.log
  #set port to listen for incoming connections, by default 6379
  port 6379
  #set IP on which daemon will be listening for incoming connections
  bind 127.0.0.1
  #where to dump database
  dir /var/lib/redis
  ```
  ## Create systemd file for Redis

  `sudo touch /etc/systemd/system/redis.service`

  ## Put text below to /etc/systemd/system/redis.service file
```
  [Unit]
  Description=Redis Server
  After=network.target

  [Service]
  Type=forking
  User=redis
  Group=redis
  ExecStart=/usr/local/bin/redis-server /etc/redis/redis.conf
  ExecReload=/bin/kill -USR2 $MAINPID
  ExecStop=/usr/local/bin/redis-cli shutdown
  Restart=always

  [Install]
  WantedBy=multi-user.target
  ```
  
  ## Start server

  `sudo service redis start`

  ## Check Redis with ping command. Redis will response with "PONG"

  `redis-cli ping`

  ## Add Redis to system startup

  `sudo update-rc.d redis defaults`
  
  ## Check your php version with command:

  `php -v`

  ## Install required package. Use proper package name for your php version. e.g. php7.0-dev, php7.1-dev, php7.2-dev

  `apt-get install php7.1-dev`

  ## Download PhpRedis

  ```
  cd /tmp
  wget https://github.com/phpredis/phpredis/archive/master.zip -O phpredis.zip
  ```

  ## Unpack, compile and install PhpRedis

  `unzip -o /tmp/phpredis.zip && mv /tmp/phpredis-* /tmp/phpredis && cd /tmp/phpredis && phpize && ./configure && make && sudo make install`

  ## Now it is necessary to add compiled extension to php config
  ## Add PhpRedis extension to PHP 7. Use proper path to your php configs e.g. /etc/php/7.1/ , /etc/php/7.2/

  ```
  sudo touch /etc/php/7.1/mods-available/redis.ini && echo extension=redis.so > /etc/php/7.1/mods-available/redis.ini
  sudo ln -s /etc/php/7.1/mods-available/redis.ini /etc/php/7.1/apache2/conf.d/redis.ini
  sudo ln -s /etc/php/7.1/mods-available/redis.ini /etc/php/7.1/fpm/conf.d/redis.ini
  sudo ln -s /etc/php/7.1/mods-available/redis.ini /etc/php/7.1/cli/conf.d/redis.ini
  ```





  ## Restart PHP-FPM if you have PHP 

  `sudo service php5-fpm restart`

  `sudo service php7.1-fpm restart`

  ## Restart Apache

  `sudo service apache2 restart`

  ## Note: if you are using Nginx there is no need to restart it, because in most cases it works wit PHP FPM

  ## You can check successfully installed PhpRedis with command bellow

  `php -r "if (new Redis() == true){ echo \"OK \r\n\"; }"`



















