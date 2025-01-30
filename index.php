<?php

session_start();

require "config.php";

// if(isset($_SESSION['login']&&isset($_SESSION['customer']){

    if(isset($_POST['change-address'])){
        $address = $_POST['address'];
        $id = $_SESSION['customer']['id'];
        $sql = "update customer set address='$address' where id='$id'";
        mysqli_query($conn,$sql);
        $_SESSION['customer']['address'] = $address;

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover">
    <title>LET'S EAT</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

<?php
if (isset($_SESSION['login']) && isset($_SESSION['customer'])) {
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                <div class="modal-body">
                        <textarea name="address" class="form-control w-100 h-100 p-3" id="" style="outline: none; border:none;">
                            <?php echo $_SESSION['customer']['address']; ?>
                        </textarea>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="change-address" class="btn btn-primary">Save changes</button>
                 </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>
    <!-- desktop view -->
    <div class="container" id="container">
        <div id="menu">
            <div class="title">
                <img src="images/foodie hunter.png" alt="">
                
            </div>
            <div class="menu-item">
                <a href="About.html">About</a>
                <a href="service.html">Services</a>
                <a href="your order.html">Your Order </a>
                <a href="cart.html">Cart</a>
                <a href="contact us.html">Contact</a>
                
                <a href="feedback/main.php">Feedback</a>

                
                <?php
                // session_start();
                if (isset($_SESSION['login']) && isset($_SESSION['customer'])) {
                    echo '<a href="logout.php">Logout</a>';
                }
                ?>
                <h5>Contact:8274820402</h5>
            </div>
        </div>

        <div id="food-container">
            <div id="header">

                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['customer'])) {
                    echo '
                        <div class="add-box" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-map-marker your-address" id="add-addresses">
                            Your Address</i>

                        </div>
                        ';
                }

                ?>


                <div class="util">

                    <!-- <input id="searchbar" onkeyup="search_food()" type="text" name="search" placeholder="Search food.."><i class="fa fa-search"> Search</i> -->
                    <i class="fa fa-tags"> OffeRs.</i>
                    <i class="fa fa-cart-plus" id="cart-plus"> 0 Items</i>
                </div>
            </div>
            <div id="food-items" class="d-food-items">
                <div id="biryani" class="d-biryani">
                    <p id="category-name">Biryani</p>
                </div>

                <div id="chicken" class="d-chicken">
                    <p id="category-name">Chicken Delicious</p>
                </div>

                <div id="paneer" class="d-paneer">
                    <p id="category-name">Paneer Mania</p>
                </div>

                <div id="vegetable" class="d-vegetable">
                    <p id="category-name">Pure Veg Dishes</p>
                </div>

                <div id="chinese" class="d-chinese">
                    <p id="category-name">Chinese Corner</p>
                </div>

                <div id="south-indian" class="d-south-indian">
                    <p id="category-name">South Indian</p>
                </div>
            </div>

            <div id="cart-page" class="cart-toggle">
                <p id="cart-title">Cart Items</p>
                <p id="m-total-amount">Total Amout : 100</p>
                <table>
                    <thead>
                        <td>Item</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                    </thead>
                    <tbody id="table-body">

                    </tbody>
                </table>
                <div class="btn-box">
                    <button class="cart-btn">Checkout</button>
                </div>
            </div>
        </div>

        <div id="cart">
            <div class="taste-header">
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['customer'])) {
                ?>
                    <a href="" class="user">

                        <i class="fa fa-user-circle" id="circle"><?php echo $_SESSION['customer']['name']; ?></i>
                    </a>

                <?php
                } else {
                ?>

                    <a href="new/login.html" class="user">

                        <i class="fa fa-user-circle" id="circle">Login</i>
                    </a>
                <?php
                }
                ?>

            </div>
            <div id="category-list">
                <p class="item-menu">Go For Hunt</p>
                <div class="border"></div>
            </div>
            <div id="checkout" class="cart-toggle">
                <p id="total-item">Total Item : 5</p>
                <p id="total-price"></p>
                <p id="delievery">Free delievery on Rs 399</p>
                <button class="cart-btn">Checkout</button>
            </div>
        </div>
    </div>


    <!-- mobile view -->
    <div id="mobile-view" class="mobile-view">
        <div class="mobile-top">
            <div class="logo-box">
                <img src="images/The spice club.png" alt="" id="logo">
                <i class="fa fa-map-marker your-address" id="m-add-address"> Your Address</i>
            </div>
            <div class="top-menu">
                <i class="fa fa-search"></i>
                <i class="fa fa-tag"></i>
                <i class="fa fa-heart-o"></i>
                <i class="fa fa-cart-plus" id="m-cart-plus"> 0</i>
            </div>
        </div>

        <div class="item-container">
            <div class="category-header" id="category-header">
            </div>

            <div id="food-items" class="food-items">
                <div id="biryani" class="m-biryani">
                    <p id="category-name">Biryani</p>
                </div>
                <div id="chicken" class="m-chicken">
                    <p id="category-name">Chicken Delicious</p>
                </div>
                <div id="paneer" class="m-paneer">
                    <p id="category-name">Paneer Mania</p>
                </div>
                <div id="vegetable" class="m-vegetable">
                    <p id="category-name">Pure Veg Dishes</p>
                </div>
                <div id="chinese" class="m-chinese">
                    <p id="category-name">Chinese Corner</p>
                </div>
                <div id="south-indian" class="m-south-indian">
                    <p id="category-name">South Indian</p>
                </div>
            </div>
        </div>

        <div class="mobile-footer">
            <p>Home</p>
            <p>Cart</p>
            <p>offers</p>
            <p>orders</p>
        </div>
    </div>
    <script src="index.js" type="module"></script>


</body>

</html>