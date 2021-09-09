<?php
error_reporting(E_ALL ^ E_NOTICE);

include "./connect.php";
include "./library.php";
$catid = $_GET['cat_id'];


session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="kia/">
    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kia Petshop</title>
    <meta name="keywords" content="animals" />
    <meta name="author" content="Ananda Tri Putra" />

    <!-- mobile specific -->
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1" />

    <!-- Favicon -->

    <!-- Offline -->
    <link rel="stylesheet" type="text/css" href="../assets/css/miistore.css" media="screen, print" />
    <link rel="stylesheet" type="text/css" href="../assets/css/coreSlider.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/flexslider.css" media="screen" />

</head>

<body>

    <?php

    include "./inc/header-navigation.php";


    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM categories where cat_id = $catid");
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <h2 class="text-center text1"><?php echo $row['category'] ?></h2><br />
                <?php } ?>
            </div>
        </div>
        <div class="row" style="margin-bottom:40%;">
            <div class="col-md-4 col-xs-6">
                <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT * FROM subcategories where cat_id = $catid ORDER BY subcategory ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    echo '<ul>';
                    $first_letter = substr($row['subcategory'], 0, 1);
                    if ($tmp != $first_letter) {
                        $tmp = $first_letter;
                        echo '<h4>' . $tmp . '</h4>';
                    }
                    echo '<li  style="list-style:none;"><a href="../catdetails.php?catdetails=' . $row['subcategory'] . '">' . $row['subcategory'] . '</a></li>';
                    echo '</ul>';
                    if ($i % 8 == 0) echo '</div><div class="col-md-4 col-xs-6">';
                    $i++;
                }
                ?>
            </div>
        </div>
    </div>


    <div class="clearfix" style="margin-bottom:5%"></div>
    <?php

    include "./inc/newsletter-footer.php";


    ?>

    <!-- JS Offline -->
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/coreSlider.js"></script>
    <script defer src="../assets/js/jquery.flexslider.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/custom.js"></script>

</body>

</html>