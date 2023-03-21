<?php
session_start();
include('server/connection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: welcome.php');
    exit;
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['user_email'];
    $password = ($_POST['user_password']);

    $query = "SELECT user_id, user_name, user_email, user_password, user_phone,
        user_address, user_city, user_photo FROM users
        WHERE user_email = ? AND user_password = ? LIMIT 1";

    $stmt_login = $conn->prepare($query);
    $stmt_login->bind_param('ss', $email, $password);

    if ($stmt_login->execute()) {
        $stmt_login->bind_result(
            $user_id,
            $user_name,
            $user_email,
            $user_password,
            $user_phone,
            $user_address,
            $user_city,
            $user_photo
        );
        $stmt_login->store_result();

        if ($stmt_login->num_rows() == 1) {
            $stmt_login->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_phone'] = $user_phone;
            $_SESSION['user_address'] = $user_address;
            $_SESSION['user_city'] = $user_city;
            $_SESSION['user_photo'] = $user_photo;
            $_SESSION['logged_in'] = true;

            header('location:welcome.php?message=Logged in successfully');
        } else {
            header('location:login.php?error=Could not verify your account');
        }
    } else {
        // Error
        header('location: login.php?error=Something went wrong!');
    }
}
?>
<!-- Login Section Begin -->
<section>
    <div>
        <div>
            <form id="login-form" method="POST" action="login.php">
                <center>
                    <?php if (isset($_GET['error'])) ?>
                    <div role="alert">
                        <?php if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        } ?>
                    </div>
                    <div>
                        <div>
                            <h1>Login</h1>
                            <div>
                                <p>Email</p>
                                <input type="email" name="user_email">
                            </div>
                            <div>
                                <p>Password</p>
                                <input type="password" name="user_password">
                            </div>
                            <div>
                                <br>
                                <input type="submit" class="site-btn" id="login-btn" name="login_btn" value="LOGIN" />
                                <a class="btn btn-primary mt-3" href="register.html" role="button">REGISTER</a>
                                <!-- <button type="button" class="btn btn-primary" href="register.html" role="button">REGISTER</button> -->

                            </div>
                        </div>
                    </div>
                </center>
            </form>
        </div>
    </div>
</section>
<style>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>