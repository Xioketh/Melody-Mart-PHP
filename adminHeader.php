<html>
<title>~Melody Mart</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <div class="header card" style="background-color: beige;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-8">
                    <img src="assets/music.png" alt="" style="width: 100px; height: 100px;">
                    <h4 class="d-inline-block ml-3">~Melody Mart
                        <!-- <br>
                        <p style="font-size: 12px; margin: 0; padding: 0;">Admin</p> -->
                    </h4>
                </div>
                <div class="col-4 text-right">
                    <div class="row">
                        <div class="col-3">
                            <a href="adminHome.php">
                                <button class="btn"
                                    style="width: 100%; font-size: 20px; border: 1px blue solid; color:blue;"><i class="fas fa-music"></i></button>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="adminCategory.php">
                            <button class="btn"
                                    style="width: 100%; font-size: 20px; border: 1px black solid;"><i class="fa-solid fa-table-list"></i></button>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="adminSales.php">
                            <button class="btn"
                                    style="width: 100%; font-size: 20px; border: 1px green solid; color:green;"><i class="fa-solid fa-scale-unbalanced-flip"></i></button>
                            </a>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-danger btn-block" onclick="logout()"
                                style="width: 80px; font-size: 20px;"><i class="fa-solid fa-right-to-bracket"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>