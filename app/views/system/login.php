<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>/css/bootstrap.css">
    <title><?php echo $data['title']?></title>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Raleway:ital,wght@1,300&display=swap"
        rel="stylesheet">
    <style>
    .background {
        margin-top: 10rem;
        border-radius: 2rem;
        background-color: #D0EAEE;
        padding: 2rem 12rem;

    }

    .text-login {
        text-align: center;
        font-family: 'Inter', sans-serif;
    }
    </style>
</head>

<body>
    <p><?php Flasher::flash()?></p>
    <div class="container" style="width:70vw;">
        <div class="background">
            <h3 class="text-login">Form Login</h3>
            <form class="row g-3" action="<?php echo BASE_URL?>/system/cek_login" method="POST">
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <p><?php echo $data['passwordError']?></p>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>