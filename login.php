<?php
    session_start();
    include('server.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="log&regis.css">
  <title>Login Page</title>
</head>
<body>
    <section>
    <form action="login_db.php" method="post">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
            <br>
        <?php endif ?>
        <div class="form-box">
            <div class="form-value">
                <form action="">
                    <h2>Login</h2>
                    <div class="inputbox">
                     <ion-icon name="person-outline"></ion-icon>
                        <input type="text" required name="username">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                
                    <button type="submit" name="login_user" class="btn">Login</button>
                    <div class="register">
                        <p>Don't have a account? <a href="register.php">Register</a></p>
                    </div>
                
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>