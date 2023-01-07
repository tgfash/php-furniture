<!DOCTYPE html>
<html lang="en">
<?php include 'connection.php' ?>
`

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/libs/css/t-style.css">
</head>

<body>
    <?php
    $id = $_GET['id'];
    $res = mysqli_query($connect, "Select * from product where product_id='" . $id . "'");
    while ($row = mysqli_fetch_array($res)) {
        $name = $row[1];
        $material = $row[2];
        $country = $row[3];
        $warranty = $row[4];
        $info = $row[5];
        $price = $row[6];
        $category = $row[7];
        $image = $row[8];
        $number = $row[9];
    }
    $result1 = mysqli_query($connect, "SELECT Material_Name from material WHERE material_id='" . $material . "'");
    while ($row = mysqli_fetch_array($result1)) {
        $material_name = $row[0];
    }
    $result2 = mysqli_query($connect, "SELECT Country_Name from country WHERE country_id='" . $country . "'");;
    while ($row = mysqli_fetch_array($result2)) {
        $country_name = $row[0];
    }
    $result3 = mysqli_query($connect, "SELECT Category_Name from category WHERE category_id='" . $category . "'");;
    while ($row = mysqli_fetch_array($result3)) {
        $category_name = $row[0];
    }

    ?>
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data" class="tm-edit-product-form">

                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="name" type="text" class="form-control validate"
                                        value="<?php echo $name ?>" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="material">Material</label>
                                    <select name="material" class="custom-select tm-select-accounts" id="material">
                                        <option value="" disabled selected hidden><?php echo $material_name ?></option>

                                        <?php
                                        $result = mysqli_query($connect, "select Material_Name from material ");
                                        while ($row = mysqli_fetch_row($result)) {

                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>

                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="country">Country</label>
                                    <select name="country" class="custom-select tm-select-accounts" id="country">
                                        <option value="1" disabled selected hidden><?php echo $country_name ?></option>
                                        <?php
                                        $result = mysqli_query($connect, "select Country_Name from Country ");
                                        while ($row = mysqli_fetch_row($result)) {
                                        ?>
                                        <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>

                                        <?php
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="warranty">Warranty (Months)
                                    </label>
                                    <input id="warranty" name="warranty" type="text" value="<?php echo $warranty ?>"
                                        class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="info">Info</label>
                                    <textarea name="info" class="form-control validate" rows="5" style="height:100px ;"
                                        required><?php echo $info ?></textarea>
                                </div>
                                <div lass="form-group mb-3">
                                    <div class="row">
                                        <div class="form-group mb-3 col-xs-12 col-sm-12">
                                            <label for="category">Category</label>
                                            <select name="category" class="custom-select tm-select-accounts"
                                                id="category">
                                                <option value="1" disabled selected hidden><?php echo $category_name ?>
                                                </option>
                                                <?php
                                                $result = mysqli_query($connect, "select Category_Name from Category ");
                                                while ($row = mysqli_fetch_row($result)) {
                                                ?>
                                                <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>

                                                <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3 col-xs-12 col-sm-5">
                                            <label for="price">Price (VNĐ)
                                            </label>
                                            <input id="price" name="price" type="text" value="<?php echo $price ?>"
                                                class="form-control validate" data-large-mode="true" />
                                        </div>

                                        <div class="form-group mb-3 col-xs-12 col-sm-4">
                                            <label for="stock">Units In Stock
                                            </label>
                                            <input id="stock" name="number" type="text" value="<?php echo $number ?>"
                                                class="form-control validate" required />
                                        </div>

                                    </div>
                                </div>


                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-dummy mx-auto">
                                <img src="../assets/images/product/<?php echo $image ?>" id="output" height="200px" />
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input type="file" accept="image/*" name="picture" onchange="loadFile(event)"
                                    class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" />
                                <script>
                                var loadFile = function(event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src)
                                    }
                                };
                                </script>

                            </div>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product
                                Now</button>
                        </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['name'])) {
                        $result4 = mysqli_query($connect, "SELECT Material_Id from material WHERE material_name='" . $_POST['material'] . "'");
                        while ($row = mysqli_fetch_array($result4)) {
                            $material = $row[0];
                        }
                        $result5 = mysqli_query($connect, "SELECT Country_Id from country WHERE country_name='" . $_POST['country'] . "'");;
                        while ($row = mysqli_fetch_array($result5)) {
                            $country = $row[0];
                        }
                        $result6 = mysqli_query($connect, "SELECT Category_Id from category WHERE category_name='" . $_POST['category'] . "'");;
                        while ($row = mysqli_fetch_array($result6)) {
                            $category = $row[0];
                        }
                        if (isset($_FILES['picture'])) {
                            $file = $_FILES['picture']['name'];
                        }
                        if ($file != "") {
                            $sql = "UPDATE `product` SET `Product_Name`='$_POST[name]',`Material_Id`='$material',`Country_Id`='$country',`Warranty`='$_POST[warranty]',`Info`='$_POST[info]',`Price`='$_POST[price]',`Category_Id`='$category',`Image`='$file',`Number`='$_POST[number]' WHERE Product_Id = '" . $id . "'";
                        } else {
                            $sql = "UPDATE `product` SET `Product_Name`='$_POST[name]',`Material_Id`='$material',`Country_Id`='$country',`Warranty`='$_POST[warranty]',`Info`='$_POST[info]',`Price`='$_POST[price]',`Category_Id`='$category',`Number`='$_POST[number]' WHERE Product_Id = '" . $id . "'";
                        }
                        $execute = mysqli_query($connect, $sql);
                        echo "<script>window.location.href='index.php?edit';</script>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <a href="index.php?home" class="btn btn-primary btn-block">Back</a>
    </div>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>