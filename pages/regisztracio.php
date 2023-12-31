<?php

function validSzig($param) {
    $pattern = "/[1-9]{1}[0-9]{5}[A-Za-z]{2}/";
    return preg_match($pattern, $param);
}

if (filter_input(INPUT_POST, "regisztraciosAdatok", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $error = false;
    $errormessage = "";
    $pass1 = filter_input(INPUT_POST, "InputPassword");
    $pass2 = filter_input(INPUT_POST, "InputPassword2");
    $username = htmlspecialchars(filter_input(INPUT_POST, "username"));
    $emailcim = filter_input(INPUT_POST, "useremail", FILTER_VALIDATE_EMAIL);
    if ($pass1 != $pass2) {
        $error = true;
        $errormessage .= '<p>Nem egyeznek a jelszavak!</p>';
    } else if ($username == null) {
        $error = true;
        $errormessage .= '<p>Nem megfelelő felhasználónév</p>';
    }
    
    if ($error) {
        echo $errormessage;
    } else {
        $db->register($emailcim, $username, $pass1);
        header("Location:index.php");
    }
}
?>
<div class="col-8 mt-4 mx-auto">
    <form action="#" method="post" class="row needs-validation" novalidate>
        <div class="row">
            <div class="mb-3 col-11 has-validation">
                <label for="useremail" class="form-labe register-form-text">Email cím</label>
                <input type="email" class="form-control" id="useremail" name="useremail" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-labe register-form-text">Kapcsolattartási célból.</div>
                <div class="invalid-feedback">Email cím megadása nélkül nem tudjuk önnel felvenni a kapcsolatot!</div>
            </div>
        </div>
        <div class="row">
        <div class="mb-3 col-11">
            <label for="username" class="form-label register-form-text">Felhasználó név</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" required>
            <div id="usernameHelp" class="form-labe register-form-text">Bejelentkezéshez használt azonosító.</div>
        </div
        </div>
        <div class="row">
            <div class="mb-3 col-6">
                <label for="InputPassword" class="form-label register-form-text">Jelszó</label>
                <input type="password" class="form-control" id="InputPassword" name="InputPassword" required>
            </div>
            <div class="mb-3 col-6">
                <label for="InputPassword2" class="form-label register-form-text">Jelszó még egyszer</label>
                <input type="password" class="form-control" id="InputPassword2" name="InputPassword2" required>
            </div>
        </div>
        <button type="submit" class="col-2 mx-auto btn btn-primary" name="regisztraciosAdatok" value="true">Regisztráció</button>
    </form>
</div>
<script>
    var passwordInputs = document.querySelectorAll("input[type=password]");
    function validPass(password) {
        console.log(password);
        let theLength = /.{6,32}/;
        let lowerCase = /[a-z]/;
        let upperCase = /[A-Z]/;
        let digit = /[0-9]/;
        let specialChars = /^[a-zA-Z0-9]/;
        if (theLength.test(password) &&
                lowerCase.test(password) &&
                upperCase.test(password) &&
                digit.test(password) &&
                specialChars.test(password)) {
            return true;
        } else {
            return false;
        }
    }

    function passStrength(password) {
        let strength = password.length;

    }

</script>