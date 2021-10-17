<?php

    $countriesJson = file_get_contents('resources/countries.json');
    $countriesArray = json_decode($countriesJson, true);
    $countries = array_column($countriesArray, "name", "code");

    $errors =
        [
            'login' => '',
            'email' => '',
            'country' => '',
            'pass' => '',
            'pass_confirm' => ''
        ];

    function isValidated($errors)
    {
        foreach($errors as $error => $value){
            if(!empty($value)){
                return false;
            }
        }
        return true;
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['login']) || !preg_match("/[a-zA-Z0-9_\-]{4,}/", $_POST['login'])){
            $errors['login'] = "Incorrect login pattern!";
        }
        if(empty($_POST['email']) || !preg_match("/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]+\.[a-z]{2,3}$/", $_POST['email'])){
            $errors['email'] = "Incorrect email pattern!";
        }
        if(empty($_POST['pass']) || !preg_match("/[a-zA-Z0-9_\-]{4,}/", $_POST['pass'])){
            $errors['pass'] = "Incorrect password pattern!";
        }
        if (empty($_POST['pass_confirm'])){
            $errors['pass_confirm'] = "Re-enter the password please";
        }
        if (strcmp($_POST['pass'], $_POST['pass_confirm']) !== 0){
            $errors['pass_confirm'] = "Passwords don't match!";
        }

    }

    if(isset($_POST['submit']) && isValidated($errors)){
        header('Location: ?action=main');
    }

?>

<section class="content">

    <form action="?action=registration" method="post">

        <label for="login">Login</label>
        <input type="text" name="login" id="login"> <br />
        <div class="error"> <?= $errors['login']?> </div>

        <label for="email">Email</label>
        <input type="text" name="email" id="email"> <br />
        <div class="error"> <?= $errors['email'] ?> </div>

        <label for="country">Country</label>
        <select name="country" id="country">
            <?php
            foreach($countries as $code => $name){ ?>
                <option value=<?php echo $code?>> <?php echo $name?> </option>
            <?php } ?>
        </select>
        <div class="error"> <?= $errors['country'] ?> </div>

        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass"> <br />
        <div class="error"> <?= $errors['pass'] ?> </div>

        <label for="pass_confirm">Confirm password</label>
        <input type="password" name="pass_confirm" id="pass_confirm"> <br />
        <div class="error"> <?= $errors['pass_confirm'] ?> </div>

        <input type="submit" class="submit" id="submit" name="submit" value="Register">

        <p class="content">


        </p>

    </form>

</section>
