<?php
include 'adminHeader.php';

require_once 'connection.php';
$sql = "SELECT * FROM sales";
$data_all = $conn->query($sql);
?>


<div class="card m-3 p-5">
        <div class="topic">
            <div class="row">
                <div class="col-8">
                    <h3>Sales</h3>
                </div>
                <div class="col-2 text-end">
                    <div class="viewImg ">
                        <!-- <img src="assets/sales.png" alt="" style="width: 100px; height: 100px;"> -->
                    </div>
                </div>
            </div>
            
        </div>
        <div class="contentBody mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sale ID</th>
                        <th>Date Sold</th>
                        <th>Total Quantity</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                <?php
			while ($row = mysqli_fetch_assoc($data_all)) {
				?>
                    <tr>
                        <td><?php echo $row["saleId"] ?></td>
                        <td><?php echo $row["date"] ?></td>
                        <td><?php echo $row["totQty"] ?></td>
                        <td><?php echo $row["totAmount"] ?></td>
                    </tr>
                    <?php
			}
			?>
                </tbody>
            </table>
        </div>
    </div>

        	
    <?php
include 'footer.php';
?>