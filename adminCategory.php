<?php
include 'adminHeader.php';

require_once 'connection.php';
$sql = "SELECT * FROM category";
$data_all = $conn->query($sql);
?>

<div class="card m-3 p-5">
        <div class="row">
            <div class="col-8">
                <h3>Categories</h3>
            </div>
            <!-- <div class="col-2 text-end">
                <div class="viewImg ">
                    <img src="categories.png" alt="" style="width: 100px; height: 100px;">
                </div>
            </div> -->
        </div>
        <div class="contentBody mt-3">
            <div class="row">
                <div class="col-8 p-2">
                    <h6>Category List</h6>
                    <ol>
                    <?php
                        while ($row = mysqli_fetch_assoc($data_all)) {
                            ?>
                        <li><?php echo $row["categoryName"] ?></li>
                        <?php
                        }
                        ?>
                    </ol>
                </div>
                <div class="col-4" style="border-left:2px solid black;">
                    <h6>Add Category</h6>
                    <input type="text" class="form-control mb-1" placeholder="Category Name" id="categoryName" style="width: 50%;">

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-warning float-start mt-3" onclick="addCategory()">
                                Save
                            </button>
                        </div>
                        <div class="col-6">
                            <div class="viewImg ">
                                <!-- <img src="assets/categories.png" alt="" style="width: 100px; height: 100px;"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        	
    <?php
include 'footer.php';
?>