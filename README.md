# sportswh

# Sports Warehouse Website

Welcome to the Sports Warehouse website, your one-stop destination for sports equipment, apparel, and more. This README provides essential information about the website, its features, and how to get started.


## Features

- **Product Catalog:** Browse and search for a wide range of sports equipment and apparel.
- **User Accounts:** Create an account, sign in, and manage your profile.
- **Shopping Cart:** Add products to your cart and proceed to checkout.
- **Voice Search:** Search products with your voice.
- **Order History:** View your past orders and order details.
- **Admin Panel:** Manage products, categories, and user orders (admin access required).
- **Responsive Design:** Enjoy a seamless experience on desktop and mobile devices.

![image](https://github.com/kayawebd/sportswh/assets/109594228/b9814956-ef75-4131-89eb-669058b4a332)

![image](https://github.com/kayawebd/sportswh/assets/109594228/78a939e7-978d-49c9-add2-d8596221d8ae)

![image](https://github.com/kayawebd/sportswh/assets/109594228/6bcbf11d-fb2b-4721-b3d6-e36b5c5a5f51)

## Getting Started

To run the Sports Warehouse website locally or deploy it on your web server, follow these steps:

1. **Clone the Repository:**

   ```bash
   cd D:\your_working_folder\
   git clone https://github.com/kayawebd/sportswh.git

2. **Import MySql database:**

    sportswh.sql

3. **Run on local machine**

    Use local development server like: XAMPP



## Editing Database
Add user details:
1. Add column in the database example: DOB

2. Add inputs in the createAccount.html.php and displayInsertUser.html.php
    <div class="inputs">
        <label class="input-label" for="DOB"></label>
        <input type="date" id="DOB" name="DOB" placeholder="Date Of Birth">
        <small></small>
	</div>
    
3. Edit class/Authentication.php  update sql query and add $stmt->bindParam(":DOB", $DOB, PDO::PARAM_STR);







