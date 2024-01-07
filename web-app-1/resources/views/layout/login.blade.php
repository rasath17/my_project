<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="signup">

        @yield('section_1')
    </div>

</div>
<script>

    function valid() {

        var emailErr = "";
        var passwordErr = "";

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;


        //E-mail

        const r = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (email.trim() === "") {
            emailErr = "Please supply your E-mail";
        } else if (email.trim() === r) {
            emailErr = "Please enter valid E-mail";
        }

        document.getElementById("emailErr").innerHTML = emailErr;

        //Password

        var password_length = password.trim().length;

        if (password.trim() === "") {
            passwordErr = "Please supply your password";
        } else if (password_length < 8) {
            passwordErr = "Minimum 8 digit or letter required"
        } else if (password_length > 100) {
            passwordErr = "Maximum 100 digit or letter allowed"
        }

        document.getElementById("passwordErr").innerHTML = passwordErr;


        if (emailErr === "" && passwordErr === "") {
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

