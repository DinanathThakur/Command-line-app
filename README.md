# Command-line-app
A command line app in php


## Steps to run this app



1. Run this command to install dependencies

	`composer install`
	
1. Create database in mysql and update the name of the database in the **config.php** inside src folder. Also mention DB credentials here in this file.

1. Run this command to create tables in database

        php tasks.php MigrateTables
		
1. To set employee details, run this command:

		php tasks.php SET:empdata 1 "Jack Petter" "192.168.10.10"
		
1. To get employee details, run this command:

		php tasks.php GET:empdata "192.168.10.10"
		
1. To unset employee details, run this command:

		php tasks.php UNSET:empdata "192.168.10.10"	

1. To set employee' web history, run this command:

		php tasks.php SET:empwebhistory "192.168.10.10" "http://google.com"
		
1. To get employee' web history, run this command:

		php tasks.php GET:empwebhistory "192.168.10.10"
		
1. To unset employee' web history, run this command:

		php tasks.php UNSET:empwebhistory "192.168.10.10"