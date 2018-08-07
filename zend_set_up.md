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
