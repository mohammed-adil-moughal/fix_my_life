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
  
  

