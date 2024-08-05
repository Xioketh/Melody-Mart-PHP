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
        <div class="popup-content p-5" style="height: 400px; width: 600px; background: beige; position: relative;  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <img src="assets/music.png" alt="Corner Image" style="position: absolute; bottom: 0; right: 0; max-width: 100%; max-height: 60%;">    
        <div class="topic">
                <h2 class="text-center mb-4">~Melody Mart</h2>
            </div>
            <div class="content">
<input type="text" class="form-control mb-3" placeholder="User Name" id="userNameLog">
<input type="password" class="form-control" placeholder="Password" id="passwordLog">

<div class="row">
    <div class="col-6">
    <button class="btn btn-warning mt-3" style="width: 80%;" onclick="login()">
    Login
</button>
    </div>
</div>


<div class="footer mt-4">
    <p>Don't you Have an Account <a href="signup.php">Sign Up</a> </p>
</div>
            
            </div>  

</div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
crossorigin="anonymous"></script>


<script>

    localStorage.clear();
</script>
<script src="script.js"></script>
</body>
</html>