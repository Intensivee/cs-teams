<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <title>Register page</title>
</head>
<body>
    <div class="container">

        <div class="logo">
            <img src="public/img/logo.svg" alt="logo">
        </div>
<!---->
        <form class="login register" action="register" method="post">
            <p>Register</p>
            <div class="message">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <input name="email" type="text" placeholder="email">
            <input name="username" type="text" placeholder="login">
            <input name="password1" type="password" placeholder="password">
            <input name="password2" type="password" placeholder="password">
            <select name="rank">
                <?php foreach($ranks as $rank){ ?>
                <option value="<?php echo $rank->getId() ?>"><?php echo $rank->getRank() ?></option>
                <?php } ?>
              </select>
            <button>Sign up</button>
        </form>

    </div>
</body>