<div class="admin-container">
    <div class="admin-body">
        <?php

        include_once("function.php");
        ?>
        <?php
        if (isset($_GET["quanly"])) {
            $tam = $_GET["quanly"];
        } else {
            $tam = "";
        }
        if ($tam == "Products") {
            include("Products/Products.php");
        } else if ($tam == "Order") {
            include("Order/Order.php");
        } else if ($tam == "AccountCustomer") {
            include("AccountCustomer/AccountCustomer.php");
        } else if ($tam == "AccountCustomer-delete") {
            include("AccountCustomer/Delete.account.php");
        } else if ($tam == "Customer") {
            include("Customer/Customer.php");
        } else if ($tam == "Customer-delete") {
            include("Customer/Delete.customer.php");
        } else if ($tam == "Details") {
            include("Details/Details.php");
        } else if ($tam == "Admin") {
            include("Admin/Admin.php");
        } else if ($tam == "Admin-delete") {
            include("Admin/Delete.admin.php");
        } else if ($tam == "Admin-add") {
            include("Admin/Add.admin.php");
        } else if ($tam == "Admin-edit") {
            include("Admin/Edit.admin.php");
        } else if ($tam == "User") {
            include("User/User.php");
        } else if ($tam == "Users-delete") {
            include("User/Delete.user.php");
        } else if ($tam == "Products-add") {
            include("Products/Add.products.php");
        } else if ($tam == "Products-edit") {
            include("Products/Edit.products.php");
        } else if ($tam == "Products-view") {
            include("Products/View.products.php");
        } else if ($tam == "Products-delete") {
            include("Products/Delete.products.php");
        } else if ($tam == "Sellers") {
            include("Sellers/Sellers.php");
        } else if ($tam == "Sellers-add") {
            include("Sellers/Add.sellers.php");
        } else if ($tam == "Sellers-edit") {
            include("Sellers/Edit.Sellers.php");
        } else if ($tam == "Sellers-delete") {
            include("Sellers/Delete.Sellers.php");
        } else {
            include("carousel.php");
        }

        ?>
    </div>
</div>