<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDII FORM</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
</head>

<body>

    <div class="box">
        <div>
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </div>

        <div class="container">
            <div class="top">
                <span>
                    EDIT ACCOUNT
                </span>
            </div>

            <form action="actionEdit.php" method="POST" class="formuser">
                <div class="input">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?> ">
                    <br>

                </div>
                <div class="input">
                    <input type="text" name="user_name" class="form-control" placeholder="Username" value=" <?php echo $row['user_name']; ?> ">
                    <br>
                   
                </div>
                <div class="input">
                    <input type="email" name="user_email" class="form-control" placeholder="Email" value=" <?php echo $row['user_email']; ?> ">
                    <br>
                    
                </div>
                
                <div class="input">
                    <input type="password" name="user_password" class="form-control" placeholder="Password" value=" <?php echo $row['user_password']; ?> ">
                    <br>
                    
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-primary mt-3" href="welcome.php" role="button">Back to menu</a>
            </form>
        </div>
    </div>
</body>

</html>