
<head>
    <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
    <link rel="stylesheet" type="text/css" href="public/style/register_style.css">
    <script defer type="text/javascript" src="./public/js/script.js"></script>
    <title>Register Page</title>
</head>

<body>
<div class="paper">
    <form class="register" action="register" method="POST">
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
<div class="text">Email:</div>
        <input type="text" name="email">
        <div class="text">Password:</div>
        <input type="password" name="password">
        <div class="text">Retype Password:</div>
        <input type="password" name="confirmedPassword">
        <div class="text">Name:</div>
        <input type="text" name="name">
        <div class="text">Surname:</div>
        <input type="text" name="surname">
    <button type="submit" class="green_button">Register</button>
        <div class="flex">
            <div class="left bottom_text">You have account? <br><a href="login">Sign up</a></div>
        </div>
    </form>
</div>
</div>
</body>