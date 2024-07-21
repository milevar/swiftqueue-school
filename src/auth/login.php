<?php require_once("../auth/Auth.php"); ?>
<html lang="en-US">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    <link rel="stylesheet" href="../css/app.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"></script>
</head>
<body>

<?php require_once("../common/message.php"); ?>

<div class="container p-5">
    <div class="row">
        <div class="col-xl-5 m-auto pt-5 px-5 bg-body-tertiary border border-bottom-0 border-light-subtle">
            <h3>
                <small class="text-body-secondary">Login into</small>
                Swiftqueue
                <small class="color-title-login text-body-secondary">School</small>!
            </h3>
            <p class="lead fs-6 mb-5">Nice to see you! Please log in with your account.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-5 m-auto pb-5 px-5 border border-top-0 border-light-subtle bg-body-tertiary">
            <form id="loginForm" action="loginAction.php" method="post" name="login">
                <div class="mb-3">
                    <label for="emailField" class="form-label">Email</label>
                    <input id="emailField" type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="passwordField" class="form-label">Password</label>
                    <input id="passwordField" type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 row justify-content-md-center">
                    <div class="mt-4 col-lg-3">
                        <input type="submit" name="submit" value="Login" class="form-control btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function () {
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: "Please enter a valid email",
                password: "Please enter your password",
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });
</script>
</body>
</html>
