
function addInstrument() {
    var name = document.getElementById("name").value;
    var category = document.getElementById("category").value;
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    var imageInput = document.getElementById("image");

    if (imageInput.files.length > 0) {
        var imageName = imageInput.files[0].name;
    } else {
        imageName = "";
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Add Image',
        });
        return;
        return;
    }

    if (name == "" || category == "" || price == "" || qty == "") {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Fill Empty Fields',
        });
        return;
    } else if (qty <= 0) {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Enter Valid Stock',
        });
        return;
    } else if (price <= 0) {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Enter Valid Price',
        });
        return;
    }

    var formData = new FormData();
    formData.append("name", name);
    formData.append("category", category);
    formData.append("price", price);
    formData.append("qty", qty);

    // Check if an image is selected
    if (imageInput.files.length > 0) {
        formData.append("image", imageInput.files[0]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "saveInstrument.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            Swal.fire({
                title: '',
                text: 'Instrument Added Success!',
                icon: 'success',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload()
                }
            });
        }
    };

    xhr.send(formData);
}

function addCategory() {
    // document.querySelector(".popup").style.display="flex";
    var category = document.getElementById("categoryName").value;

    if (category == "") {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Enter Category Name',
        });
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "saveCategory.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            Swal.fire({
                title: '',
                text: 'Category Added Success!',
                icon: 'success',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload()
                }
            });
        }
    };

    var data = "category=" + encodeURIComponent(category);
    xhr.send(data);

}

function logout() {
    Swal.fire({
        title: '',
        text: 'Are you sure to Log Out?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'login.php';
        }
    });
}

function login() {
    var userName = document.getElementById("userNameLog").value;
    var password = document.getElementById("passwordLog").value;

    if (userName == "" || password == "") {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Fill Empty Fields',
        });
        return;
    }

    var goodTogo = false;
    var xhr = new XMLHttpRequest();
    var userData = [];
    var role = ""
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            userData = JSON.parse(xhr.responseText);

            for (var i = 0; i < userData.length; i++) {
                if (userData[i].userName == userName) {
                    if (userData[i].password != password) {
                        goodTogo = false;
                    } else {
                        role = userData[i].role;
                        goodTogo = true;
                    }
                }
            }

            if (goodTogo) {
                if (role == "admin") {
                    window.location.href = 'adminHome.php';
                } else {
                    localStorage.setItem("userName", userName)
                    window.location.href = 'customerHome.php';
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: '',
                    text: 'User Name or Password Incorrect',
                });
            }
        }
    };

    xhr.open("GET", "getAllUsers.php", true);
    xhr.send();



}

function signup() {
    var userName = document.getElementById("userNameSign").value;
    var address = document.getElementById("addressSign").value;
    var email = document.getElementById("emailSign").value;
    var tel = document.getElementById("telSign").value;
    var password = document.getElementById("passwrodSign").value;
    var rePassword = document.getElementById("rePasswrdSign").value;

    if (userName == "" || address == "" || email == "" || tel == "" || password == "" || rePassword == "") {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Please Fill Empty Fields',
        });
        return;
    } else if (password != rePassword) {
        Swal.fire({
            icon: 'warning',
            title: '',
            text: 'Passwords are not the same!',
        });
        return;
    }

    var goodTogo = true;
    var xhr = new XMLHttpRequest();
    var userData = [];
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            userData = JSON.parse(xhr.responseText);

            for (var i = 0; i < userData.length; i++) {
                if (userData[i].userName == userName) {
                    Swal.fire({
                        icon: 'warning',
                        title: '',
                        text: 'Oops! User Name Already Taken',
                    });
                    goodTogo = false;
                    break;
                } else if (userData[i].email == email) {
                    Swal.fire({
                        icon: 'warning',
                        title: '',
                        text: 'Oops! Email Already Taken',
                    });
                    goodTogo = false;
                    break;
                }
            }

            if (goodTogo) {
                xhr.open("POST", "saveUser.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        Swal.fire({
                            title: '',
                            text: 'New User Saved Success!',
                            icon: 'success',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload()
                            }
                        });
                    }
                };

                var data = "userName=" + encodeURIComponent(userName) +
                    "&address=" + encodeURIComponent(address) +
                    "&email=" + encodeURIComponent(email) +
                    "&tel=" + encodeURIComponent(tel) +
                    "&password=" + encodeURIComponent(password) +
                    "&rePassword=" + encodeURIComponent(rePassword);
                xhr.send(data);
            }
        }
    };

    xhr.open("GET", "getAllUsers.php", true);
    xhr.send();


}

function deleteProduct(selectedRowData){
    try {
        var rowData = JSON.parse(selectedRowData);
        var id = rowData.id

        Swal.fire({
            title: '',
            text: 'Are you sure to Delete?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    Swal.fire({
                        title: '',
                        text: 'Delete Success',
                        icon: 'success',
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload()
                        }
                    });
                }
            };
    
            xhr.open("POST", "updateStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + encodeURIComponent(id));
            } 
        });

    } catch (error) {
        console.error('Error parsing JSON:', error);
    }
    
}

function editProduct(selectedRowData) {
    try {
        var rowData = JSON.parse(selectedRowData);
        var id = rowData.id
        var newQty = document.getElementById("newStock_" + id).value;

        if (newQty == "" || newQty < 0) {
            Swal.fire({
                title: '',
                text: 'Please Enter Valid Stock',
                icon: 'warning',
                allowOutsideClick: false
            });
            return;
        }


        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                Swal.fire({
                    title: '',
                    text: 'Update Stock Success',
                    icon: 'success',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload()
                    }
                });
            }
        };

        xhr.open("POST", "updateStock.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id=" + encodeURIComponent(id) + "&newQty=" + encodeURIComponent(newQty));


    } catch (error) {
        console.error('Error parsing JSON:', error);
    }
}

var cartProdcuts = []
function addToCart(selectedRowData) {
    var rowData = JSON.parse(selectedRowData);

    if (cartProdcuts.length == 0) {
        cartProdcuts.push(rowData);
    } else {
        for (var i = 0; i < cartProdcuts.length; i++) {
            if (cartProdcuts[i].id === rowData.id) {
                Swal.fire({
                    title: '',
                    text: 'Already in Cart',
                    icon: 'info',
                    allowOutsideClick: false
                });
                return;
            }
        }
        cartProdcuts.push(rowData);
    }

    console.log(cartProdcuts);
}


function cartOpen() {
    if (cartProdcuts.length > 0) {
        localStorage.setItem("cartItems", JSON.stringify(cartProdcuts));
        window.location.href = 'customerViewCart.php';
    } else {
        Swal.fire({
            title: '',
            text: 'Cart is Empty!',
            icon: 'warning',
            allowOutsideClick: false
        })
    }
}

function onQtyChange(input, rowQty) {

    console.log(rowQty)
    var row = input.closest('tr');
    var priceElement = row.querySelector('.price');
    var qty = parseInt(input.value);

    if (qty <= 0) {
        input.value = 1;
        Swal.fire({
            title: '',
            text: 'Please Enter Valid Stock',
            icon: 'warning',
            allowOutsideClick: false
        })
        return;
    } else if (qty > rowQty) {
        input.value = 1;
        Swal.fire({
            title: 'Available Stock: ' + rowQty,
            text: 'Requested Stock is More than Available Stock',
            icon: 'warning',
            allowOutsideClick: false
        })
        return;
    }

    var pricePerItem = parseInt(priceElement.textContent);
    var totalPrice = pricePerItem * qty;
    priceElement.textContent = totalPrice;
    calculateTotal();
}

function calculateTotal() {
    var total = 0;
    var priceElements = document.querySelectorAll('.price');

    priceElements.forEach(function (element) {
        total += parseInt(element.textContent);
    });
    document.getElementById('totalPrice').textContent = total;
}

function buy() {
    var table = document.getElementById('cartTable');
    var rows = table.getElementsByTagName('tr');
    var rowData = [];
    var totAmount = 0;
    var totQty = 0;
    var userName = localStorage.getItem("userName");

    for (var i = 1; i < rows.length-1; i++) {
        var cells = rows[i].getElementsByTagName('td');

        if (cells.length >= 4) {
            var id = cells[0].innerText;
            var item = cells[1].innerText;
            var qty = cells[2].getElementsByTagName('input')[0].value;
            var price = cells[3].innerText;

            totAmount += parseInt(price);
            totQty += parseInt(qty);
            rowData.push({ id: 1, title: item, quantity: qty, price: price });
        } else {
            console.error('Row does not have enough cells:', rows[i]);
        }
    }

    var xhr = new XMLHttpRequest();
    var url = 'saveSale.php'; 
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            Swal.fire({
                title: '',
                text: 'Click Ok to Download QR Code',
                icon: 'info',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var saleId = response.saleId;
                    generateQRCode(saleId);
                }
            });
            console.log(xhr.responseText);
        }
    };

    var data = {
        totAmount: totAmount,
        totQty: totQty,
        userName: userName,
        rowData: rowData
    };

    var jsonData = JSON.stringify(data);
    xhr.send(jsonData);
}


function generateQRCode(saleId) {
    var container = document.getElementById('qrcode');

    if (!container) {
        container = document.createElement('div');
        container.id = 'qrcode';
        document.body.appendChild(container);
    }

    var qr = new QRCode(container, {
        text: saleId,
        width: 128,
        height: 128
    });

    var downloadLink = document.createElement('a');
    downloadLink.href = qr._el.childNodes[0].toDataURL();
    downloadLink.download = saleId+ '_qrcode.png';
    downloadLink.textContent = 'Download QR Code';

    document.body.appendChild(downloadLink);
    downloadLink.click();
    document.body.removeChild(downloadLink);

    Swal.fire({
        title: '',
        text: 'Sale Save Success!',
        icon: 'success',
        allowOutsideClick: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href= 'customerOrders.php';
        }
    });
    
}



