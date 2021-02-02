# SF Motors-WP
WordPress conversion of SFMotors.com (Fall 2018)

## Daily Dev Process
1. Start Docker App (Windows, OSX or Linux)
2. Start Sass (.scss) watcher `npm run gulp`
3. Initialize Docker container localhost `docker-compose up`
4. To close Docker container localhost `docker-compose down`

## Deploying to STAGE Process
1. Compile Sass (.scss) files to .css for deployment `npm run gulp compile:sass`
2. ...etc

### Initial setup for local development
1. Clone this repository locally `git clone https://github.com/fueledonbacon/sfmotors-wp.git`
2. Update the local MySQL database being served by Docker to reflect most recent snapshot from <https://sfmotorsdev.wpengine.com>.
  - SEE BELOW: [Updating local MySQL database](#updatinglocalmysql)
3. Run `npm install` from local project folder to install dependencies for sass compiling.
4. (OPTIONAL) Make sure that you have gulp installed globally on local machine.
  `npm install gulp --global`
  * note: you might need to run this as "sudo"
  * This step is optional because you can run gulp as an npm script in package.json by running `npm run gulp taskname` will be the same as running `gulp taskname`

### <span id="updatinglocalmysql">Updating local MySQL database</span>
1. Login at <https://my.wpengine.com/> with project credentials
2. Download latest backup point snapshot from the staging host at <https://my.wpengine.com/installs/baconstage/backup_points#production>
  - Select "Partial Backup" and choose to download the MySQL database, plugins and media ONLY (everything else is in this repo)!
3. Unzip download and locate the mysql.sql file
4. Make sure Docker App (Windows, OSX or Linux) is running.
5. Initialize Docker container localhost `docker-compose up`
6. Go to localhost:8080 (phpMyAdmin) in browser and login:
  - Server = db
  - Username = root
  - Password = password
7. Select "wordpress" database in the left-hand sidebar.
8. Click on "Import" button/tab at the top of the page.
9. Click "Choose File" button to select the mysql.sql file from steps 1-3.
10. Click the "Go" button at the bottom of the page.
######Congratulations, your localhost database has been updated/refreshed!

#### Deploy to Stage host initial setup
Follow these instructions: <https://wpengine.com/support/using-git-on-sites-with-multiple-environments/>

`git push sfmotorsdev master`
"sfmotorsdev" = wp-engine's environment repo name
"master" (or any other repo branch to deploy)

#### Development and Deployment process for current production envronment (AWS/EC2)
#####Pulling updated DB, uploads folder and plugins folder from production host:
  1. login to https://sfmotors.com/wp-admin
  2. Use the "All-In-One Migration" WP plugin to export a copy of the production environment (as file)
  3. After downloading the production copy, go to All-In-One Migration > Backups and delete the created copy hosted on client server
  4. In local development environment, create a temporary branch to in git for the importing of the aforementioned copy
    * This ensures that undesired files from previous version of the website (which currently reside on production host) are not included in this repository!
    * `git checkout -b TEMP-BRANCH-NAME`
  5. login to local WP @ https://localhost/wp-admin
  6. Use the "All-In-One Migration" WP plugin to import the copy of the production environment downloaded earlier
  7. Save the permalinks settings (as instructed to by the "All-In-One Migration" WP plugin)
  8. In local development environment, go back to master branch to in git and delete the previously created temporary local branch
    * `git checkout master`
    * `git branch -d TEMP-BRANCH-NAME`
    * `git clean -f` - to remove added/untracked files!
  9. You are now free to create your development branch in git with current production updated DB, uploads folder and plugins folder
#####Deploying changes to the production host:
  !!! ONLY after merging desired changes to origin/master
  !!! AND confirming after that the client has not updated the production host's DB, uploads folder or plugins folder
    * ELSE/IF unsure: repeat "Pulling..." step above to include updates
  THEN...
  1. login to local WP @ https://localhost/wp-admin
  2. Use the "All-In-One Migration" WP plugin to export a copy of the local environment (reflecting the updated origin/master branch of this repository) as file
  3. login to https://sfmotors.com/wp-admin
  4. Use the "All-In-One Migration" WP plugin to import the copy of the local environment (reflecting the updated origin/master branch of this repository and any updates to DB, uploads folder or plugins folder)