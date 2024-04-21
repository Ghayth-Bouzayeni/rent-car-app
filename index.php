<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.111.3">
    <title>Signin Template · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sign-in.css" rel="stylesheet"> <!-- Custom styles -->

    <style>
        /* Additional custom styles */
        .bd-placeholder-img { /* Placeholder image styles */ }
        @media (min-width: 768px) { /* Media query for large screens */ }
        .btn-bd-primary { /* Custom button styles */ }
        .bd-mode-toggle { /* Toggle theme button styles */ }
    </style>
</head>
<body class="text-center">

<!-- Theme toggle dropdown -->
<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <!-- Theme toggle button -->
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <!-- Theme dropdown menu -->
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <!-- Theme options (light, dark, auto) -->
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <!-- Light theme icon and label -->
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                Light
            </button>
        </li>
        <!-- Dark theme option -->
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <!-- Dark theme icon and label -->
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Dark
            </button>
        </li>
        <!-- Auto theme option (default) -->
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <!-- Auto theme icon and label -->
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Auto
            </button>
        </li>
    </ul>
</div>

<main class="form-signin w-100 m-auto">
    <!-- PHP message display -->
    <?php
    if (isset($_GET['message'])) {
        $type = isset($_GET['type']) ? $_GET['type'] : 'danger';
        echo "<div class='alert alert-$type'>".$_GET['message']."</div>";
    }
    ?>
    <!-- Sign-in form -->
    <form method="post" action="authentification.php">
        <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <!-- Email input -->
        <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <!-- Password input -->
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <!-- Password recovery link -->
        <a href="forgotpassword.php">Mot de passe oublié?</a>

        <!-- Remember me checkbox -->
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <!-- Sign-in button -->
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>

        <!-- Sign-up link -->
        <a href="signup.php">Sign up</a>

        <!-- Footer text -->
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
    </form>
</main>

<!-- Bootstrap JS and other scripts -->
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
