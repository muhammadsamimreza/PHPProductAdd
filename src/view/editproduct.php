<?php
require "../header.php";
require_once "../db_connection.php";

$editId = $_GET["Id"];

$showquery ="SELECT * FROM `productinfo` WHERE `Id`={$editId} ";

$showdata = mysqli_query($conn, $showquery);

$arrdata = mysqli_fetch_array($showdata);

 

if (isset($_REQUEST["submit"])) {

    $editIdUpdate = $_GET["Id"];

    $productName = $_REQUEST["prodName"];
    $productPrice = $_REQUEST["prodPrice"];
   

    $imageDir = "../Images/";
    date_default_timezone_set("Asia/Dhaka");

    // Image Uploading Part 
    $imageName = date("Y-m-d_h_i_sa") . "." . pathinfo($_FILES["prodImage"]["name"], PATHINFO_EXTENSION);
    $imageFullPath = $imageDir . $imageName;
    move_uploaded_file($_FILES["prodImage"]["tmp_name"], $imageFullPath);

    // $query = "INSERT INTO productinfo(Image, Name, Price) VALUES ('$imageName','$productName','$productPrice')";
    // mysqli_query($conn, $query);

    $editQuery = "UPDATE `productinfo` SET `Name`='$productName',`Price`='$productPrice' WHERE `Id`=$editIdUpdate";

    $editData = mysqli_query($conn, $editQuery);

    

    header("location: ../view/viewProduct.php");
    exit();

}



?>
    <section id="addProduct">
        <div class="text-center text-2xl bg-amber-200 font-bold py-2">
            Update Product Information
        </div>
        <div class="w-full lg:w-3/4 mx-auto py-10">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodImage" class="w-1/3 text-right pr-10"> Product Image</label>
                    <input type="file" name="prodImage" id="prodImage" value="" placeholder="Image" class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodName" class="w-1/3 text-right pr-10"> Product Name</label>
                    <input type="text" name="prodName" id="prodName" value="<?php echo $arrdata["Name"] ?>" placeholder="Enter Product Name" class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="flex flex-wrap items-center my-1">
                    <label for="prodPrice" class="w-1/3 text-right pr-10"> Product Price</label>
                    <input type="text" name="prodPrice" id="prodPrice" value="<?php echo $arrdata["Price"]?>" placeholder="Product Price" class="w-2/3 px-3 py-1 text-md border" />
                </div>
                <div class="text-center my-4">
                    <button type="submit" name="submit" value="update" class="border-2 bg-green-400 hover:bg-green-700 text-gray-800 hover:text-red-100 duration-300 font-semibold rounded-2xl px-3 py-2">Update</button>
                </div>
            </form>
        </div>

    </section>
    <script src="http://localhost/PHPProjectF/src/assets/js/main.js"></script>
</body>

</html>