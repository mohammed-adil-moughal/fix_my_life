# Kill_Port_In_Linux
  ## Command to kill a port
  ```
  const port=8000
  
  fuser -k port/tcp
  ```
  

# Task Permissions

  ## Command to change mod
  
  `chmod -R 777 file/name`
  
# Repo Prune
  ## command to prune local repo
  ```
  repo-prune = !"git checkout master; git pull origin master; git fetch --all -p; git branch -vv | grep gone | awk '{ print $1  }' | xargs -n 1 git branch -D"
  ```
# FETCH FROM GIT
  ## comands to fetch from git and pull
  ```
  git branch -r | grep -v '\->' | while read remote; do git branch --track "${remote#origin/}" "$remote"; done
  git fetch --all
  git pull --all
  ```
# git find conflicts
```
grep -H -r "<<<<<<< HEAD" .
```

# issue with lock
https://www.linuxuprising.com/2018/07/how-to-fix-could-not-get-lock.html

# switching php versions

https://www.ostechnix.com/how-to-switch-between-multiple-php-versions-in-ubuntu/
  

# mcrypt installation ubuntu 18.04
https://websiteforstudents.com/install-php-7-2-mcrypt-module-on-ubuntu-18-04-lts/
https://linuxconfig.org/how-to-install-mcrypt-php-module-on-ubuntu-18-04-linux
