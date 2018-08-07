##run
`mysql -u root -p`

##selectdatabase
`USE database;`


##ShowPermissions
`SHOW GRANTS FOR 'root'@'localhost';`

##CreateUser
`CREATE USER 'newuser'@'localhost' IDENTIFIED BY 'password';`

##GrantAllPermissions
`GRANT ALL PRIVILEGES ON * . * TO 'newuser'@'localhost';`

##FlushallPrivileges
`FLUSH PRIVILEGES;`