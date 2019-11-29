
<?php
    session_start();
    if(!isset($_SESSION['user_email'])){
        header('Location: index.php');
    }else{
        $pageTitle = "User Cart";
        // $dont_show_navbar = "";
        $templates  = "includes/templates/" ;
        $css        = "layouts/css/" ;
        $js         = "layouts/js/" ;
        $images     = "layouts/images/" ;
        include 'includes/functions/functions.php';
        include $templates . "header.php";
        include $templates . "navbar.php";

        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if(!$connection) {
            die("Connection Failed: ". mysqli_connect_error());
        }
        $user_email = $_SESSION['user_email'];
        $user_query = "SELECT * FROM users WHERE email = '" . $user_email . "'";
        $user_data = $connection->query($user_query);   
        if (mysqli_num_rows($user_data) > 0) {
            $row = mysqli_fetch_array($user_data);
        }
    }
?>
<section style="margin-top: 5%;">
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
            <!-- If there is a product do the following-->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- Loop over all the items in the cart, show the link in the src img below-->
                        <tr>
                            <td><img src="#" width="40" height="35" /> </td>
                            <td>product_name</td>
                            <td>In stock</td>

                            <td style="text-align: center;">
                                quantity
                            </td>
                            <td class="price text-right">price AED</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        <!-- End the loop-->
                    </tbody>
                </table>
                <!--If statement, check the code on github so you can remember what was the condition -->
                <h3 class="col-sm-12 mt-5 mb-2">You Have No Products In Your Cart Yet!</h3>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="{% url 'ecommerce:products' %}" style="text-decoration: none;"> <button class="btn btn-lg btn-block btn-light text-uppercase">Continue Shopping</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a href="#" class="btn btn-lg btn-block btn-info text-uppercase" style="text-decoration: none; color: #fff;">Check Out</a>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>
</body>

</html>