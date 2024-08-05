<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~Melody Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
</head>

<body>
    <div class="header card" style="background-color: beige;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <img src="assets/music.png" alt="" style="width: 100px; height: 100px;">
                    <h4 class="d-inline-block ml-3">~Melody Mart</h4>
                </div>

                <div class="col-12 col-md-4 text-md-right mt-3 mt-md-0">
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <p class="text-dark" style="font-size: 15px; border:none;">Hello Keth Ransi</p>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="customerHome.php">
                                <button class="btn btn-outline-primary" style="font-size: 15px;"><i
                                        class="fas fa-music"></i></button>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="customerOrders.php">
                                <button class="btn btn-outline-success" style="font-size: 15px;"><i
                                        class="fa-solid fa-sack-dollar"></i></button>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <button class="btn btn-danger btn-block" onclick="logout()"
                                style="font-size: 15px;"><i
                                    class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var storedUserName = localStorage.getItem('userName');
        document.querySelector('.text-dark').textContent = "Hello " + storedUserName;
    </script>
</body>

</html>
