<?php
session_start();
include('server/connection.php');

if (isset($_POST['cari'])){
    $keyword = $_POST['keyword'];
    $q ="SELECT * FROM users WHERE user_id LIKE '%$keyword%'";
} else{
    $q ='SELECT *FROM users';
}
$result = mysqli_query($conn, $q);

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="box">
        <form action="" method="POST">
            <input type="text" name="keyword" placeholder="Masukan Keyword">
            <button type="submit" class="btn btn-primary" name="cari"> Cari!</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td><?php echo $row['user_id']?></td>
                        <td><?php echo $row['user_name']?></td>
                        <td><?php echo $row['user_email']?></td>
                        <td>
                            <a href="actionDelete.php?user_id=<?php echo $row['user_id'];?>"
                            role="button" onclick="return confirm ('Data ini akan di hapus?')">HAPUS</a>
                        </td>
                        <td>
                            <a href="edit.php?user_id=<?php echo $row['user_id'];?>"
                            role="button">EDIT</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="welcome.php?logout=1" role="button">Log Out</a>
    </div>
    <center>
        <table border="0">
            <tr>
                <h1>
                    Selamat Datang <?php echo $_SESSION['user_name'] ?>
                </h1>


            </tr>
            <tr>
                <td rowspan="4">
                    <img src="photo/<?php echo $_SESSION['user_photo'] ?>" width="200px" height="200px" class="gambar">
                </td>
                <td>
                    E-mail : <?php echo $_SESSION['user_email'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Phone : <?php echo $_SESSION['user_phone'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    City :<?php echo $_SESSION['user_city'] ?>
                </td>
            </tr>
            <tr>
                <td>
                    Address: <?php echo $_SESSION['user_address'] ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <center>
                        <button style="background-color:#0096FF; border-color:#6495ED; color:white" > <a href="welcome.php?logout=1" id="logout-btn" class="btn btn-danger" style="color:white">LOG OUT</a></button>
                    </center>
                </td>
            </tr>
        </table>
    </center>
</body>


</html>
<style>
    h1,h2,h3,h4,h5,h6,p,tr,td{
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>