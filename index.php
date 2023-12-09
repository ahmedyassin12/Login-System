<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styyle.css">
    <title>Ludiflex | Login</title>
</head>
<body>
    <form action="check.php" method="post">
        <div class="box">
            <div class="container">
                <div class="top">
                    <span>Have an account?</span>
                    <header>Login</header>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Username" id="username" name="username" required>
                    <label for="username">Username</label>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" id="password" name="password" required>
                    <label for="password">Password</label>
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login" id="login-button">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" name="remember-me" id="remember-me">
                        <label for="remember-me"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="signup.html">Sign up</a></label>
                    </div>
                </div>
            </div>
        </div> 
    </form>
</body>
</html>
