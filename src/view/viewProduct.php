<?php
    require "../header.php";
    require_once "../db_connection.php";
?>
    <section id="addProduct">
        <div class="text-center text-2xl bg-amber-300 font-bold py-2">
            View Product
        </div>
        <div class="w-full lg:w-3/4 mx-auto py-10">
            <table class="w-full ">
                <tr class="bg-gray-300">
                    <th class="border py-2">sl.</th>
                    <th class="border py-2">Image</th>
                    <th class="border py-2">Product Name</th>
                    <th class="border py-2">Product Price</th>
                    <th class="border py-2">Action</th>
                </tr>

                <?php
                $sqlQuery = "SELECT * FROM `productinfo` WHERE 1";
                $result = mysqli_query($conn, $sqlQuery);
                $counter =0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $counter++;
                
                ?>

                <tr>
                    <td class="border text-center px-2 py-2"> <?php echo $counter; ?></td>
                    <td class="border text-center px-2 py-2 flex justify-center items-center">
                        <img class="w-24" src="../Images/<?php echo $row["Image"] ?>" alt="">
                    </td>
                    <td class="border px-2 py-2 text-center"><?php echo $row["Name"] ?></td>
                    <td class="border text-center px-2 py-2"><?php echo $row["Price"] ?></td>
                    <td class="border text-center px-2 py-2">
                        <a href="">Edit</a>
                        /
                        <a href="./deleteproduct.php?Id=<?php echo $row["Id"]; ?>">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
        </div>

    </section>
    <script src="http://localhost/PHPProjectF/src/assets/js/main.js"></script>
</body>

</html>