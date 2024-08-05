<?php
include 'customerHeader.php';

require_once 'connection.php';

session_start();
// $userName = $_GET['userName']; 

// echo $userName;
// if(isset($_SESSION['user_id'])){
//     $user_id = $_SESSION['user_id'];
//  }else{
//     $user_id = '';
//  };

$sql = "SELECT * FROM sales";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="card m-3 p-5">
    <div class="topic">
        <h3>My Orders</h3>
    </div>
    <div class="contentBody mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Purchase Date</th>
                    <th>Total Quantity</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["saleId"]) ?></td>
                            <td><?php echo htmlspecialchars($row["date"]) ?></td>
                            <td><?php echo htmlspecialchars($row["totQty"]) ?></td>
                            <td><?php echo htmlspecialchars($row["totAmount"]) ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'footer.php';
?>
