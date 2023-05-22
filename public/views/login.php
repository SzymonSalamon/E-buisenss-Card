
    <head>
        <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
        <link rel="stylesheet" type="text/css" href="public/style/login_style.css">
        <title>Login Page</title>
    </head>
<body>
<div class="left">
    <h1>E-buisness card</h1>
<img src="public/style/Icons/id_icon.svg"
alt= "id_icon" />
</div>
<div class="right">
    <div class="paper">
        <div class="upper"></div>
        <form class="login" action="login" method="POST">
        <div class="text">Login:</div>
        <input name="email" type="text">
        <div class="text">Password:</div>
        <input name="password" type="password">
            <button class = "green_button" type="submit">Sign up</button>
    </form>
        <div class="msg">
        <?php
        if(isset($messages)){
            foreach($messages as $message) {
                echo $message;
            }
        }
        ?>
    </div>
    <div class="flex">
        <div class="left bottom_text">You don't have account? <br><a href="register">Register</a></div>
        <div class="left bottom_text">Forgot your password? <br><a href="forgotpswd_site.html">Reset Password</a></div>
</div>
</div>
</div>
</body>
