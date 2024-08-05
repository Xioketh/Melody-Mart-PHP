<div id="cartContainer">
    <?php
    session_start();
    if (isset($_POST['cartItems'])) {
        $cartItems = json_decode($_POST['cartItems'], true);
        if (is_array($cartItems)) {
            $tableHTML = '<table class="table table-borderless" style="border:none;" id="cartTable">
                            <tr>
                                <th>Item ID</th>
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>';
    
            $totalPrice = 0; 
            $totalQty = 0;
    
            foreach ($cartItems as $details) {
                $tableHTML .= '<tr>
                    <td>P00' . $details['id'] . '</td>
                    <td>' . $details['name'] . '</td>
                    <td><input class="form-control" style="width:68px;" type="number" value="1" onchange="onQtyChange(this, ' . $details['quantity'] . ')"></td>
                    <td class="price">' . $details['price'] . '</td>
                </tr>';
    
                $totalPrice += $details['price'];
                $totalQty += $details['quantity'];
            }
    
            $tableHTML .= '<tr>
                <th colspan=3><center>Total</center></th>
                <th id="totalPrice">' . $totalPrice . '</th>
            </tr>';
    
            $tableHTML .= '</table><br>';
    
            $tableHTML .= '<button class="btn btn-success" id="purchaseBtn" onclick="buy()">Purchase</button>';
            echo $tableHTML;
        } else {
            echo 'Invalid data format';
        }
    } else {
        echo 'Missing cartItems parameter';
    }
    ?>
</div>
