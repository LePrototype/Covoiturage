<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VRoom</title>
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/jquery.css">
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jqueryui.js"></script>
    <script src="/assets/js/app.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="banner"></div>
            <nav class="nav">
                <div class="left">
                    <span class="btn"><a href="#">Proposer un voyage</a></span>
                </div>
                <div class="right">
                    <span class="btn"><a href="#">Inscription</a></span>
                    <span class="btn"><a href="#">Connexion</a></span>
                </div>
            </nav>
        </header>
        <div class="search">
            <form action="#" method='post'>
                <input type="text" name="start" id="start-city" placeholder="Ville / code postal de départ">
                <input type="text" name="end" id="end-city" placeholder="Ville / code postal d'arrivée">
                <input type="date" name="date" value="<?php echo date('Y-m-d') ?>">
                <input type="submit" value="Rechercher" class="btn">
                <datalist id="cities"></datalist>
            </form>
        </div>
        <div class="main">
            @content
        </div>
    </div>
</body>
</html>
