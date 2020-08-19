<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papper Flower</title>
</head>

<body>
    <form method="POST" action="../../backend/user/signup.php">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password</label>
        <input type="text" id="password" name="password"><br>
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama"><br>
        <label for="email">E-Mail</label>
        <input type="text" id="email" name="email"><br>
        <label for="no_hp">No HP</label>
        <input type="text" id="no_hp" name="no_hp"><br>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
        <input type="submit" value="Simpan">
    </form>

</body>

</html>