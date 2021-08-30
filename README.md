# devpost-rpa-hackathon-entry

You can copy and paste the source code or download my file.
You'll need to create a simple database that you'll want to retrieve the data from.
Then in the index file replace "host","username","password","database","port" with their substitutes.
Lastly, add a few records so the script has actual data to query.


EXAMPLE 

Database Name: TheShop

Table0: Customer
-id
-first_name
-last_name
-email
-address
-city
-state
-zip
-password
-signup

Table1: Customer
-order_id
-customer_id
-order_date

Table2: Order_item
-item_id
-order_id
-product_id
-quantity

Table3: Products
-product_id
-color
-size
-price
