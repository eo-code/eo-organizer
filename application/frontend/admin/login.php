<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../assets/semantic/semantic.min.css">
    <link rel="stylesheet" href="../../../assets/semantic/style.css">
</head>

<body style="display: flex; align-items: center; position:relative; overflow:hidden;">
    <div class="wrapper"></div>
    <div style="width: 300px; height: 300px; border-radius: 50%; position:absolute; bottom: -120px; left:-80px; background: #8675a9;"></div>
    <div style="width: 300px; height: 300px; border-radius: 50%; position:absolute; top: -120px; right:-80px; background: #8675a9;"></div>
    <div class="ui card" style="margin:0 auto">
        <div class="content">
            <div class="header" style="text-align: center;">
                Admin
            </div>
            <div class="ui form mt-20">
                <form action="../../backend/admin/akun_admin/login.php" method="post">
                    <div class="field">
                        <label for="">Username</label>
                        <input type="text" name="username" placeholder="Username..." required>
                    </div>
                    <div class="field">
                        <label for="">Password</label>
                        <input type="password" name="password" placeholder="Password..." required>
                    </div>
                    <?php
                    if (!empty($_GET['kodeError']) == "1") {
                    ?>
                        <div class="field">
                            <label for="">username tidak terdaftar</label>
                        </div>
                    <?php } elseif (!empty($_GET['kodeError']) == "2") { ?>
                        <div class="field">
                            <label for="">password salah</label>
                        </div>
                    <?php } ?>
                    <button class="ui fluid button" type="submit" style="background: #8567a9; color: #FFF;">Log In</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>