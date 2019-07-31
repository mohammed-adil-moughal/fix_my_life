## run
`mysql -u root -p`

## selectdatabase
`USE database;`


## ShowPermissions
`SHOW GRANTS FOR 'root'@'localhost';`

## CreateUser
`CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';`

## GrantAllPermissions
`GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';`

## FlushallPrivileges
`FLUSH PRIVILEGES;`

## AET
`use am_clients;
SET session sql_mode = ' ';
SET GLOBAL sql_mode = '';
show variables like 'sql_mode' ; 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";`

## GETTING ALL
`SELECT 
  TABLE_NAME,COLUMN_NAME,CONSTRAINT_NAME, REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME
FROM
  INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
  REFERENCED_TABLE_SCHEMA = 'aet_all';`
