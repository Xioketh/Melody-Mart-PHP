<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>~Melody Mart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>

    <div class="login">
        <div class="popup"
            style="background-color: white; width: 100%; height: 100%; position: absolute; top: 0; display: flex; justify-content: center; align-items: center;">
            <div class="popup-content p-5"
                style="height: 400px; width: 600px; background: beige; position: relative;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                <!-- <img src="assets/music.png" alt="Corner Image" style="position: absolute; bottom: 0; right: 0; max-width: 100%; max-height: 60%;">     -->
                <div class="topic">
                    <h2 class="text-center mb-4">~Melody Mart</h2>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control mb-3" placeholder="User Name" id="userNameSign">
                            <input type="text" class="form-control mb-3" placeholder="Address" id="addressSign">
                            <input type="password" class="form-control mb-3" placeholder="Password" id="passwrodSign">
                        </div>

                        <div class="col-6">
                            <input type="text" class="form-control mb-3" placeholder="Email" id="emailSign">
                            <input type="number" class="form-control mb-3" placeholder="Telephone Number" id="telSign">
                            <input type="password" class="form-control mb-3" placeholder="Confirm Password" id="rePasswrdSign">
                        </div>
                    </div>
                    <div class="row ps-4 pe-4">
                        <div class="col-12">
                        <button class="btn btn-warning mt-3" style="width: 100%;" onclick="signup()">
                                Sign Up
                            </button>
                        </div>
                    </div>


                    <div class="footer mt-4">
                        <p>Already Have an Account <a href="login.php">Log In</a> </p>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>
</body>

</html>