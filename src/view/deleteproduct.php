<?php
require "../header.php";
require_once "../db_connection.php";
if (!isset($_REQUEST["Id"]) || $_REQUEST["Id"] == "") {
    // header("location: ../");
    // exit();
}
$deleteId = $_REQUEST['Id'];
?>

<section id="deleteProduct">
    <div class="text-center text-2xl">
        Deleted Product
    </div>
    <div>
        <?php
        // $sqlQuery = "SELECT * FROM `productinfo` WHERE `id`=\"$deleteId\"";
        $sqlQuery = "DELETE FROM `productinfo` WHERE `Id`=\"$deleteId\"";
        mysqli_query($conn, $sqlQuery);
        echo "<script>alert('Product Id: $deleteId Deleted.')</script>";
        // header("location: ./viewProduct.php");
        // exit();
        ?>
    </div>
</section>

<script src="http://localhost/PHPProjectF/src/assets/js/main.js"></script>

</body>

</html>