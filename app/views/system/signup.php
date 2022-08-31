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
        margin-top: 5rem;
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
    <div class="container" style="width:70vw;">
        <div class="background">
            <h3 class="text-login">Form Signup</h3>
            <form class="row g-3" action="<?php echo BASE_URL?>/system/signup" method="POST">
                <div class="col-12">
                    <label for="nama_user" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user">
                </div>
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    <?php echo $data['usernameError']; ?>

                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                    <?php echo $data['passwordError']; ?>
                </div>
                <div class="col-12">
                    <label for="passwordconfirm" class="form-label">Confrim password</label>
                    <input type="text" class="form-control" id="passwordconfirm" name="passwordconfirm">
                    <?php echo $data['confirmPasswordError']; ?>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <?php echo $data['emailError']; ?>
                </div>
                <div class="col-6">
                    <label for="level_id" class="form-label">Level</label>
                    <input type="text" class="form-control" id="level_id" name="level_id">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>