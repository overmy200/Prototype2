<section class="main-sec">
    <div class="container-fluid">
        <div class="row">
            <section class="sidebar_res col-12 col-md-3">
                <div class="side border border-success">
                    <h5 class="display-6 text-center mt-2"><i class="bi bi-basket">คำสั่งซื้อ</i></h5>
                    <table class="table table-hover">

                        <!-- MAIN -->

                        <?php

                        require "connect.php";

                        $totalprice = 0;

                        if (isset($_SESSION["User_Id"])) {
                            $USERID = $_SESSION["User_Id"];
                            $SQL = " SELECT * FROM foods_orders WHERE customer_id = '$USERID'";
                            $RES = mysqli_query($connect, $SQL);

                            if ($RES) {
                                while ($ROW = mysqli_fetch_array($RES)) {

                                    if ($ROW["food_status"] == "in-order"){
                                        $itemtotalprice = $ROW["food_price"] * $ROW["food_amount"];
                                        $totalprice += $itemtotalprice;
    
                                        echo
                                        '<tbody>
                                        <td>' . $ROW["food_name"] . '</td>
                                        <td><p>จำนวน ' . $ROW["food_amount"] . '</p></td>
                                        <td>' . $ROW["food_price"] * $ROW["food_amount"] . '$</td> 
                                        </tbody>';
                                    }


                                }
                            }
                        }


                        ?>



                        <!-- MAIN -->

                    </table>
                    <?php
                        if (isset($_SESSION["error_message"])){
                            echo '<p class="lead text-danger"> ' . $_SESSION["error_message"] . '</p>';
                            unset($_SESSION["error_message"]);
                        }
                    ?>
                    <div class="ps-3 py-2 my-2">
                        <h5 class="fw-light d-flex">ราคารวม:
                            <?php
                            echo '<p class="lead text-success"> ' . $totalprice . '$' . '</p>';
                            ?>
                        </h5>
                    </div>
                    <div class=" px-5 px-sm-0 px-lg-5 my-3">
                        <div class="form-group d-flex justify-content-between">
                            <button class="px-4 btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#show_dialog"><i class="bi bi-bag-plus"></i>สั่งซื้อ</button>
                            <form class="" action="process_delete_orders.php" method="POST">
                                <button class="btn btn-outline-danger"><i class="bi bi-bag-x"></i>ลบคำสั่งซื้อ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="res col-9 mt-5 mt-md-t">
                <div class="row">
                    <div class="foods d-block d-md-flex">
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/8.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ป่นอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">45$</p>
                                <input type="hidden" name="item_name" value="ป่นอีสาน">
                                <input type="hidden" name="item_price" value="45">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/9.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ตำอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">65$</p>
                                <input type="hidden" name="item_name" value="ตำอีสาน">
                                <input type="hidden" name="item_price" value="65">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/10.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">แกงอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">55$</p>
                                <input type="hidden" name="item_name" value="แกงอีสาน">
                                <input type="hidden" name="item_price" value="55">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="foods d-block d-md-flex">
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/13.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ไข่ต้มอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">55$</p>
                                <input type="hidden" name="item_name" value="ไข่ต้มอีสาน">
                                <input type="hidden" name="item_price" value="55">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/15.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">คั่วอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">35$</p>
                                <input type="hidden" name="item_name" value="คั่วอีสาน">
                                <input type="hidden" name="item_price" value="35">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/20.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ไข่เจียวอีสาน</p>
                                <p class="text-muted">หมวด:อาหารอีสาน</p>
                                <p class="lead text-success">20$</p>
                                <input type="hidden" name="item_name" value="ไข่เจียวอีสาน">
                                <input type="hidden" name="item_price" value="20">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                    </div>
                    <div class="foods d-block d-md-flex">
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/8.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ป่นอีสาน</p>
                                <p class="lead text-success">45$</p>
                                <input type="hidden" name="item_name" value="ป่นอีสาน">
                                <input type="hidden" name="item_price" value="45">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/9.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">ตำอีสาน</p>
                                <p class="lead text-success">65$</p>
                                <input type="hidden" name="item_name" value="ตำอีสาน">
                                <input type="hidden" name="item_price" value="65">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                        <form class="form-group mb-5 " action="process_order.php" method="POST">
                            <div href="#" class="img-form pb-5 shadow-sm rounded-5 col-12 d-flex flex-column align-items-center">
                                <img class="rounded-5" src="img/อาหารอีสาน/10.jpg" alt="items" width="80%" height="80%">
                                <p class="lead">แกงอีสาน</p>
                                <p class="lead text-success">55$</p>
                                <input type="hidden" name="item_name" value="แกงอีสาน">
                                <input type="hidden" name="item_price" value="55">
                                <button type="submit" class="btn btn-outline-success px-5"><i class="bi bi-basket2-fill">ใส่ตะกร้า</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>