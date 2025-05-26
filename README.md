## Run & Setting up
### Localhosting
Clone the code from github
```
git clone https://github.com/botdenoms/repohere.git 
```
#### 1. Initiase the  mysql database
install mysql if not installed
```
sudo apt get mysql
```
Start the mysql if not started
```
systemctl start mysql 
```
Initialise the database with the init.sql file
```
sudo mysql -u root -p < init.sql
```
#### 2. Start the Apache server
install apache if not installed
```
sudo apt get apache2
```
Start the apache server if not started
```
systemctl start apache2 
```
Create the website folder
```
sudo mkdir /var/www/html/website-folder-here  
```
Copy the source code to the website folder
```
sudo cp . /var/www/html/website-folder-here -r
```
#### 3. Run the website on your browser
On your browser open website-folder-name/index.php

To login as admin and add judges use the route website-folder-name/login.php

Credentials for admin; username admin, password 'empty'

## Database schema

Used three tables for implemntation

1. admins table
For admin user data & credentials

2. judges table
For judges data & credentials

3. users table
For user data and addition column for points input

## Assumptions made

1. Users showed to a judge for points assigning belong to the same event

2. A judge can only assign points to users in a single event not multi-events with multiple users in the events

3. Points column added to the users table but can be hoisted to a different table

## Design Choices
Vanilla based php approach without use of frameworks such as laravel

## Additional features
### To be implemented
#### 1. admins
> Adding of events

>  Assinging judges to multiple events

#### 2.  judges
> View events assigned to

> Select a specific event

> View users in a selected event events

> Multiple assignment point to a group of seleted users


