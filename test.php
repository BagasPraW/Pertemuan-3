<?php
    include('connection.php');

    if(count($_POST) > 0){
        mysqli_query($conn,"UPDATE users set user_name='". $_POST['user_name']."', user_email='".
        $_POST['user_email']."' WHERE user_id='".
        $_POST['user_id']."'");
        $message = "<p style='color:green;'> Record Modified Successfully !</p>";
    }

    $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='". $_GET['user_id']. "'");
    $row = mysqli_fetch_array($result);
?>

<html>
    <head>
        <title>UPDATE DATA</title>
    </head>
    <body>
        <form name="frmUsers" method="post" action="">
        <div>
            <?php if(isset($message)) { echo $message; } ?>
        </div>
        <div style="padding-bottom :5px;">
            <a href="welcome.php">USER LIST</a>
        </div>
        <input type="hidden" name="user_id" class="txtField" value="<?php echo $row['user_id'];?> ">
        User Name : <br>
        <input type="text" name="user_name" class="txtField" value=" <?php echo $row['user_name']; ?> ">
        User Email : <br>
        <input type="text" name="user_email" class="txtField" value=" <?php echo $row['user_email'];?> ">
        <br> <br>
        <input type="submit" name="submit" value="Submit" class="button">
        </form>
    </body>
</html>