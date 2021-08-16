<?php
/* @var string $content */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Custom Php MVC</title>

    <link rel="stylesheet" href="/css/main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="grid flat">
<header class="grid">
    <div class="container flex">
        <a href="/">Home</a>
        <nav class="navbar flex">
            <a href="/Articles">Articles</a>
            <a href="/About">About</a>
            <a href="/User/login">Login</a>
        </nav>
    </div>
</header>
<main class="container flat grid">
    <div class="long-container flat grid">
        {{content}}
    </div>
</main>
<footer class="grid">
    <div class="container flex flat">
        <p>Made By Boniface Yohann</p>
        <a href="https://github.com/Sigmanificient/custom_php_mvc">
            <img src="/svg/github_icon.svg" height="40px" alt="Github">
        </a>
    </div>
</footer>
</body>
</html>
