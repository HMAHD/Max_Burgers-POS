<?php include("./mvc/views/partials/theme.php"); ?>

<div class="container-fluid p-0">
    <div class="row m-0">
        <div class="p-2 bg2" style="height: 100vh; width: 320px;">
            <p class="ml-1 font-weight-bold cl" style="font-size: 130%">Dashboard</p>

            <div class="row m-0">
                <?php include("./mvc/views/partials/home-menu-account.php"); ?>
                <?php include("./mvc/views/partials/home-menu-item.php"); ?>
            </div>
        </div>

        <div class="p-0 bg1" style="height: 100vh; width: calc(100% - 320px)">
            <div class="p-3">
                <p class="float-left cl font-weight-bold mb-0" style="font-size: 130%">Checkout</p>
                <a href="../Home" style="text-decoration: none; color: black;">
                    <div id="back-button" class="btn bg-white float-right">Back</div>
                </a>
                <div style="clear: both;"></div>
            </div>
            <a href="../Product/GetAddProduct" style="color: black; text-decoration: none;">
                <div class="text-center">
                    <div class="btn mb-2 bg-white">Add Product</div>
                </div>
            </a>

            <div style="height: calc(100vh - 120px); overflow-y: auto;">
                <div class="px-2" style="width: 850px; margin: auto">
                    <table class="table table-striped table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $type;
                            while ($row = mysqli_fetch_array($data["ProductsDashboard"])) {
                                if ($row["type"] == 1) {
                                    $type = "Food";
                                } else if ($row["type"] == 2) {
                                    $type = "Drink";
                                }
                                echo '<tr>
                                    <th><img src="../public/images/product/' . $row["image"] . '" width="100px" height="50px;" style="object-fit: cover;"></th>
                                    <td style="width: 250px">' . $row["name"] . '</td>
                                    <td>' . $row["price"] . 'RS</td>
                                    <td>' . $type . '</td>
                                    <td>
                                        <a href="../Product/GetEditProduct/' . $row["id"] . '" style="text-decoration: none; color: white;">
                                            <div class="btn bg-white text-dark float-left mr-2">Edit</div>
                                        </a>
                                        <a href="../Product/DeleteProduct/' . $row["id"] . '" style="text-decoration: none; color: white;">
                                            <div class="btn bg-white text-dark">Delete</div>
                                        </a>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Additional CSS styles for the table */
    .table th {
        background-color: #333;
        /* Header background color */
        color: #fff;
        /* Header text color */
    }

    .table td {
        background-color: #444;
        /* Cell background color */
        color: #fff;
        /* Cell text color */
    }

    .table th,
    .table td {
        padding: 12px;
        /* Increase cell padding for better spacing */
    }
</style>