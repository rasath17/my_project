<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="{{asset("css/register.css")}}" rel="stylesheet">
    <script src="{{assert('js/register.js')}}"></script>
</head>
<body>
<div class="main">
    <div class="signup">
        @yield('section_1')
    </div>
</div>


<script>

    function valid() {
        var nameErr = "";
        var emailErr = "";
        var phoneErr = "";
        var passwordErr = "";
        var confirm_passwordErr = "";

        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const phone = document.getElementById("phone").value;
        const password = document.getElementById("password").value;
        const confirm_password = document.getElementById("password_confirmation").value;


        //Name

        if (name.trim() === "") {
            nameErr = "Please supply your name";
        } else if (name.trim().length < 3) {
            nameErr = "Minimum 3 letters required"
        } else if (name.trim().length > 100) {
            nameErr = "Maximum 100 letters allowed";
        }

        //E-mail

        const r = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (email.trim() === "") {
            emailErr = "Please supply your E-mail";
        } else if (email.trim() === r) {
            emailErr = "Please enter valid E-mail";
        }

        //Phone

        if (phone.trim() === "") {
            phoneErr = "Please supply your Mobile number";
        } else if (phone.trim().length === 9) {
            phoneErr = "Must be 10 Digit";
        }

        //Password

        var password_length = password.trim().length;

        if (password.trim() === "") {
            passwordErr = "Please supply your password";
        } else if (password_length < 8) {
            passwordErr = "Minimum 8 digit or letter required"
        } else if (password_length > 100) {
            passwordErr = "Maximum 100 digit or letter allowed"
        }


        //Confirm Password

        var confirm_password_length = confirm_password.trim().length;

        if (confirm_password.trim() === "") {
            confirm_passwordErr = "Please supply your Confirm password";
        } else if (confirm_password_length < 8) {
            confirm_passwordErr = "Minimum 8 digit or letter required"
        } else if (confirm_password_length > 100) {
            confirm_passwordErr = "Maximum 100 digit or letter allowed"
        } else if (confirm_password.trim() !== password.trim()) {
            confirm_passwordErr = "Password miss matched"

        }


        document.getElementById("nameErr").innerHTML = nameErr;
        document.getElementById("emailErr").innerHTML = emailErr;
        document.getElementById("phoneErr").innerHTML = phoneErr;
        document.getElementById("passwordErr").innerHTML = passwordErr;
        document.getElementById("password_confirmationErr").innerHTML = confirm_passwordErr;


        if (nameErr === "" && emailErr === "" && phoneErr === "" && passwordErr === "" && confirm_passwordErr === "") {
            alert("Success");
            return true;

        } else {
            alert("Error");
            return false;
        }

    }


</script>
</body>
</html>

