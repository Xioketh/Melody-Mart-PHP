<?php
include 'adminHeader.php';

require_once 'connection.php';
$sql = "SELECT * FROM instrument where status = 1";
$data_all = $conn->query($sql);

$sql2 = "SELECT * FROM category";
$data_all2 = $conn->query($sql2);
?>

<div class="card m-3 p-5">
    <div class="row">
        <h3>Instruments</h3>
    </div>
    <div class="contentBody mt-3">
        <div class="row">
            <div class="col-8 p-2">
                <h6>Instrument List</h6>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price ($)</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($data_all)) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo $row["image"] ?>" alt="" style="width:103px; height:77px;"> </td>
                                <td>
                                    <?php echo $row["name"] ?>
                                </td>
                                <td>
                                    <?php echo $row["category"] ?>
                                </td>
                                <td>
                                    <?php echo $row["price"] ?>
                                </td>
                                <td>
                                    <input class="form-control" type="number" value="<?php echo $row["quantity"] ?>"
                                        id="newStock_<?php echo $row["id"]; ?>" style="width:68px;">
                                </td>
                                <td>
                                <button class="btn" style="font-size: 18px; color:red;"
                                        onclick="deleteProduct('<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>')"><i class="fa-solid fa-trash"></i></button>

                                    <button class="btn" style="font-size: 18px; color:green;"
                                        onclick="editProduct('<?php echo htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>')"><i
                                            class="fa-solid fa-check"></i></button>


                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
            <div class="col-4" style="border-left:2px solid black;">
                <h6>Add Instrument</h6>
                <!-- <form method="POST" action="saveInstrument.php"> -->
                <div class="row">
                    <div class="col-12">
                        <input class="form-control mb-1" type="file" id="image" accept=".jpg .png .jpeg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-7">
                        <input type="text" class="form-control mb-1" placeholder="Instrument Name" id="name">
                        <select class="form-select" aria-label=".form-select-lg example" id="category">
                            <option value="">Select Category</option>
                            <?php while ($row1 = mysqli_fetch_array($data_all2)):
                                ; ?>
                                <option value="<?php echo $row1[1]; ?>">
                                    <?php echo $row1[1]; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <button class="btn btn-warning float-start mt-3" onclick="addInstrument()">
                            Save
                        </button>
                    </div>
                    <div class="col-5">
                        <input type="number" class="form-control mb-1" placeholder="Quantity" id="qty">
                        <input type="number" class="form-control" placeholder="Selling Price" id="price">

                        <div class="viewImg ">
                            <!-- <img src="assets/instrument.png" alt="" style="width: 100px; height: 100px;"> -->
                        </div>
                    </div>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>