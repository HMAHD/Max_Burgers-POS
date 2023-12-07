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

            <div style="height: calc(100vh - 120px); overflow-y: auto;">
                <div class="row m-0">

                    <div class="col-6 p-0">
                        <div class="row m-0 p-2">
                            <div class="col-12 p-2">
                                <div class="p-2 cl bg2">
                                    <form action="../System/ChangeColor" method="post" enctype='multipart/form-data'>
                                        <p class="text-center" style="font-size: 130%">Theme</p>
                                        <div class="row m-0">
                                            <?php
                                            foreach ($data["GetTheme"] as $value) {
                                                echo '<div class="col-6 p-0 mt-2">
                                                    <label>Background 1</label><br>
                                                    <input id="color1" type="color" value="' . $value["color1"] . '" name="color1">    <br>
                                                </div><div class="col-6 p-0 mt-2">
                                                    <label>Background 2</label><br>
                                                    <input id="color2" type="color" value="' . $value["color2"] . '" name="color2">    <br>
                                                </div><div class="col-6 p-0 mt-2">
                                                    <label>Background 3</label><br>
                                                    <input id="color3" type="color" value="' . $value["color3"] . '" name="color3">    <br>
                                                </div><div class="col-6 p-0 mt-2">
                                                    <label>Text</label><br>
                                                    <input id="color4" type="color" value="' . $value["color4"] . '" name="color4">    <br>
                                                </div>';
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <button type="submit" class="form-control mt-3 float-left" style="width: 70%">Change color</button>
                                            <div class="btn float-right bg-white mt-3 text-dark" onclick="SetDefaultColor()">Set Default</div>
                                            <div style="clear: both;"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="p-2 cl bg2">
                                    <p class="text-center" style="font-size: 130%">Fee</p>
                                    <div style="clear: both;"></div>
                                    <div class="row m-0">
                                        <table class="table bg2 cl">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Percent</th>
                                                    <th scope="col">Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($data["GetFee"] as $value) {
                                                    echo '<tr>
                                                        <td>' . $value["name"] . '</td>
                                                        <td>' . $value["number"] . '%</td>
                                                        <td>
                                                            <div class="btn bg-white text-dark" onclick="ChangeFee(' . $value["id"] . ',`' . $value["name"] . '`,`' . $value["number"] . '`)">Edit</div>
                                                        </td>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <form id="form-fee" action="../System/EditFee" method="post" style="display: none;">
                                        <div style="display: flex;">
                                            <input id="idFee" type="" name="idFee" style="display: none;">
                                            <div class="px-2" style="width: 30%">
                                                <label>Name</label><br>
                                                <input id="nameFee" type="" class="form-control" name="nameFee" disabled>
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <label>Price</label><br>
                                                <input id="priceFee" type="" class="form-control" name="priceFee">
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <button type="submit" class="btn" style="margin-top: 32px">Edit fee</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-12 p-2">
                                <div class="p-2 cl bg2">
                                    <p class="text-center" style="font-size: 130%">Table</p>
                                    <div style="clear: both;"></div>
                                    <div class="row m-0">
                                        <table class="table bg2 cl">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Code</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Method</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $typeText;
                                                foreach ($data["Table"] as $value) {
                                                    if ($value["type"] == 1) {
                                                        $typeText = "Normal";
                                                    } else {
                                                        $typeText = "Vip";
                                                    }
                                                    echo '<tr>
                                                        <td>' . $value["number"] . '</td>
                                                        <td>' . $typeText . '</td>
                                                        <td>
                                                            <div class="btn bg-white text-dark float-left mr-2" onclick="EditTable(' . $value["id"] . ',' . $value["number"] . ',' . $value["type"] . ')">Edit</div>
                                                            <a href="../Table/DeleteTable/' . $value["id"] . '"
                                                                style="text-decoration: none;color:black;">
                                                                <div class="btn bg-white text-dark float-left">Delete</div>
                                                            </a>
                                                        </td>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <form id="form-edit-table" action="../Table/EditTable" method="post" style="display: none;">
                                        <div style="display: flex;">
                                            <input id="idTable" type="" name="idTable" style="display: none;">
                                            <div class="px-2" style="width: 30%">
                                                <label>Number</label><br>
                                                <input id="numberTable" type="" class="form-control" name="numberTable">
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <label>Type</label><br>
                                                <select id="typeTable" class="form-control" name="typeTable">
                                                    <option value="1">Normal</option>
                                                    <option value="2">Vip</option>
                                                </select>
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <button type="submit" class="btn" style="margin-top: 32px">Edit Table</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="form-add-table" action="../Table/AddTable" method="post">
                                        <div style="display: flex;">
                                            <div class="px-2" style="width: 30%">
                                                <label>Number</label><br>
                                                <input type="" class="form-control" name="numberTable">
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <label>Type</label><br>
                                                <select class="form-control" name="typeTable">
                                                    <option value="1">Normal</option>
                                                    <option value="2">Vip</option>
                                                </select>
                                            </div>
                                            <div class="px-2" style="width: 30%">
                                                <button type="submit" class="btn" style="margin-top: 32px">Add Table</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <script type="text/javascript">
                                function EditTable(id, number, type) {
                                    $("#form-add-table").hide();
                                    $("#form-edit-table").show();
                                    $("#numberTable").val(number);
                                    $("#typeTable").val(type);
                                    $("#idTable").val(id);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-6 p-2">
                        <div class="col-12 p-2">
                            <div class="p-2 cl bg2">
                                <p class="text-center" style="font-size: 130%">Voucher</p>
                                <div style="clear: both;"></div>
                                <div class="row m-0">
                                    <table class="table bg2 cl">
                                        <thead>
                                            <tr>
                                                <th scope="col">Code</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Method</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data["Voucher"] as $value) {
                                                echo '<tr>
                                                    <td>' . $value["code"] . '</td>
                                                    <td>' . $value["number"] . '$</td>
                                                    <td>
                                                        <a href="../Voucher/DeleteVoucher/' . $value["id"] . '"
                                                            style="text-decoration: none;color:black;">
                                                            <div class="btn bg-white text-dark">Delete</div>
                                                        </a>
                                                    </td>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <form action="../Voucher/AddVoucher" method="post">
                                    <div style="display: flex;">
                                        <div class="px-2" style="width: 30%">
                                            <label>Code</label><br>
                                            <input type="" class="form-control" name="code">
                                        </div>
                                        <div class="px-2" style="width: 30%">
                                            <label>Price</label><br>
                                            <input type="" class="form-control" name="price">
                                        </div>
                                        <div class="px-2" style="width: 30%">
                                            <button type="submit" class="btn" style="margin-top: 32px">Add Voucher</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-12 p-2">
                            <div class="p-2 cl bg2">
                                <p class="text-center" style="font-size: 130%">Discount</p>
                                <div style="clear: both;"></div>
                                <div class="row m-0">
                                    <table class="table bg2 cl">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Percent</th>
                                                <th scope="col">Method</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data["GetDiscount"] as $value) {
                                                echo '<tr>
                                                    <td>' . $value["name"] . '</td>
                                                    <td>' . $value["number"] . '%</td>
                                                    <td>
                                                        <div class="btn bg-white text-dark" onclick="ChangeDiscount(' . $value["id"] . ',`' . $value["name"] . '`,`' . $value["number"] . '`)">Edit</div>
                                                    </td>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <form id="form-discount" action="../System/EditDiscount" method="post" style="display: none;">
                                    <div style="display: flex;">
                                        <input id="idDiscount" type="" name="idDiscount" style="display: none;">
                                        <div class="px-2" style="width: 30%">
                                            <label>Name</label><br>
                                            <input id="nameDiscount" type="" class="form-control" name="nameDiscount" disabled>
                                        </div>
                                        <div class="px-2" style="width: 30%">
                                            <label>Price</label><br>
                                            <input id="priceDiscount" type="" class="form-control" name="priceDiscount">
                                        </div>
                                        <div class="px-2" style="width: 30%">
                                            <button type="submit" class="btn" style="margin-top: 32px">Edit fee</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function SetDefaultColor() {
        $("#color1").val('#121421');
        $("#color2").val('#1e202c');
        $("#color3").val('#292b37');
        $("#color4").val('#ffffff');
    }

    function ChangeFee(id, name, price) {
        $("#form-fee").show();
        $("#idFee").val(id);
        $("#nameFee").val(name);
        $("#priceFee").val(price);
    }

    function ChangeDiscount(id, name, price) {
        $("#form-discount").show();
        $("#idDiscount").val(id);
        $("#nameDiscount").val(name);
        $("#priceDiscount").val(price);
    }
</script>
