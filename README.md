  
# DATABASE SETUP

 - enable **Xampp** or any web server , enable service apache and mysql

- copy all files from **coderscafe_new** to **htdocs** of server
	- (default Location: C:/xampp/htdocs/)

- open http://localhost/phpmyadmin

- create Database on phpmyadmin with following details[ ] DATABASE NAME: coderscafe

- click on database name

- select import

- select "coderscafe.sql" form database folder and click Go


  # For ADMIN Login
	 
 -  **url**: http://localhost/admin/
 - Default Admin cred:
	 -  **Username**: admin@admin.com
	 - **Password**: admin

  # For Site Access
  
 - http://localhost

# Additional database status Code

 - 0 = new order / pending order
 - 1 = cook order / on process
 - 2 = out for delivery
 - 3 = delivered
