<?php
include 'customerHeader.php';

require_once 'connection.php';
$sql = "SELECT * FROM instrument";
$data_all = $conn->query($sql);
?>

<div class="card m-3 p-3">
    <div class="contentBody mt-3 mx-auto">
        <div class="row justify-content-center">

            <div class="popup" style=" width: 100%; height: 100%;  justify-content: center; align-items: center;">
                <div class="popup-content p-5"
                    style="height: 100%; width: 600px; background: white; position: relative;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="topic">
                        <h2 class="text-start mb-4">Cart Items</h2>
                    </div>
                    <div class="content">
                        <div id="cartTable"></div>
                    </div>

                    <script>
                        var cartItems = JSON.parse(localStorage.getItem('cartItems'));
                        if (cartItems && Array.isArray(cartItems)) {
                            var cartItemsJSON = JSON.stringify(cartItems);
                            var xhr = new XMLHttpRequest();
                            xhr.open('POST', 'process_cart.php', true);
                            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    document.getElementById('cartTable').innerHTML = xhr.responseText;
                                }
                            };
                            xhr.send('cartItems=' + cartItemsJSON);
                        } else {
                            console.error('Invalid cartItems data');
                        }
                    </script>

                </div>
            </div>

        </div>
    </div>
</div>

<?php
include 'footer.php';
?>