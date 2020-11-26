#fix errors
```
phpcbf --standard=PSR2 --ignore=*Migration* module/Transaction --report=diff -vv
```

#find errors
```
phpcs --standard=PSR2 --ignore=*Migration* module/
```

#phunit 
`--debug` allows for detailed dumps
`--filter methodName` allows to run specific method in test.php
./vendor/phpunit/phpunit/phpunit --debug --filter methodName test/unit/UserTest/test.php
