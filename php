#fix errors
```
phpcbf --standard=PSR2 --ignore=*Migration* module/Transaction --report=diff -vv
```

#find errors
```
phpcs --standard=PSR2 --ignore=*Migration* module/
```
