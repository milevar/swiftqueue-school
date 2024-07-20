<html>
<head>
    <title> <?php echo $title; ?> </title>
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
<div class="container">
    <nav class="navbar navbar-expand-lg shadow-sm p-3 mb-5 bg-body-tertiary rounded">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Swiftqueue School</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'Courses') ? "active" : ""; ?>" href="/courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($activePage == 'Users') ? "active" : ""; ?>"
                           href="/users">Users</a>
                    </li>
                    <?php
                    if ($auth->isLoggedIn()) {
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/auth/logoutAction.php\">Logout</a></li>";
                        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"/auth/logoutAction.php\">Hi, " . $auth->getLoggedInUsername() . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-grid mt-3">
        <h3 class="ps-2 text-body-emphasis"><?php echo $title; ?></h3>
        <?php if ($title != "Courses" && $title != "Users") { ?>
            <div class="row ps-2">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../<?php echo strtolower($activePage); ?>"><?php echo $activePage; ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>
            </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous">
    </script>

