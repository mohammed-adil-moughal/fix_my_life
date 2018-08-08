## Importing_DataBases
	
	//Before SQL import//
	
	SET GLOBAL sql_mode = ' ';

	USE schema;

	SET FOREIGN_KEY_CHECKS=0;

	//After successful run

	SET FOREIGN_KEY_CHECKS=1; (edited)

## Running_After_Clone
   ```
   composer dump-autoload
  composer install --no-scripts 
  ```

## Task Run Project
```
const port=8000
const ip=localhost
php -S ip:port -t public public/index.php
```
## PHP versions
` sudo update-alternatives --config php`

## Installing PHP 5.6
```
sudo apt-get install python-software-properties
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php5.6
```
