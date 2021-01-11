# Fooderia
This project, ‘ Fooderia’ aims to simulate the working of a database centric web application to order food. A connection between the database and the User Interface is done and the User Interface interacts with the database efficiently, by means of Stored Procedures and Functions.

DATABASE : MySQL
FRONT END : HTML, CSS, JAVASCRIPT 
LOCAL HOST : PHP
SOFTWARES : XAMPP, VISUAL STUDIO CODE

There are 12 PHP Files used to support the User view and to connect with the database.

1.	index.PHP 
The first page , Index page serves two purposes :
  To Sign up as a new Customer/Restaurant Admin
  To Login as a new Customer/Restaurant Employee
2.	admin.PHP 
Only visible to the Restaurant Admin. Enables the Admin to either Add new products/ Add new Employees.
3.	03_menu.PHP 
Displays a list of items and enables the customer to add products of different quantities  into the cart via a stored procedure .
4.	cart.PHP 
Displays the items in a cart via a tabular format with the Total Price of each product and the Overall Total . It also has an option to remove any item from the cart .  
5.	payment.PHP 
Enables confirmation of payment by populating tables such as Orders,Bill and Items Sold . The Order and Delivery time are also set . Cart is cleared at this stage 
6.	feedback.PHP 
Enables the current customer to enter feedback via a stored procedure.
7.	toconnect.PHP 
Establishes a connection between the database and the front end (User view)
8.	session_clear.PHP
Empties the cart and destroys the current session of the customer, employee or admin.
9.	Bill Analysis.PHP
A graph is plotted with the Total Amount against the Bill No
10.	Frequent items.PHP
A graph is plotted with the Frequency of each item bought in the restaurant.
11.	Customer Analysis.PHP
A page that calls and displays two graphs that are analyzed based on the collected data for the restaurant’s benefit.
12.	Thankyou.PHP
Displays the Thank you message for the customer at the end of the ordering. 

ENTITY RELATIONSHIP(ER) Diagram attached.



