<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Basic Bootstrap Template</title>
    <!-- Bootstrap CSS file -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JS files: jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title><?= $ablakcim['cim'] . (isset($ablakcim['mottó']) ? (' | ' . $ablakcim['mottó']) : '') ?></title>
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <?php if(file_exists('./style/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./style/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
    <script src="js/menu.js" defer></script>
</head>
<body>

<header>
    <?php if(isset($_SESSION['login'])) { ?>
        Bejlentkezve: <strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></strong>
    <?php } ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dog-weiler</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <?php foreach ($oldalak as $url => $oldal) { ?>
                    <?php if((!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1])) { ?>
                        <li class="nav-item<?= ($oldal == $keres ? ' active' : '') ?>">
                            <a class="nav-link" href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
                                <?= $oldal['szoveg'] ?>
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>

<header id=fejlec>
<div class="jumbotron text-center" style="margin-bottom:0">
    <div class="header-text">
    <h1>Dog-weiler</h1>
    <p>Csakúgy mint méretük, ölelésük is óriási <span class="text-danger">
                    boldogságot
                    </span> hoz!</p> 
  </div>
</div>
  </header>

<div class="container-fluid">
    <div id="content-wrapper">
        <div class="container"> 
            <?php 
                // Ellenőrizzük, hogy a főoldalra mutat-e a kérés
                if ($keres == '/') {
                    include("./templates/pages/fooldal.tpl.php");
                } else {
                    include("./templates/pages/{$keres['fajl']}.tpl.php");
                }
            ?>
        </div> 
        <footer class="footer mx-auto">
            <?php include("./logicals/footer.php"); ?>
        </footer>
    </div> <!-- content-wrapper bezárása -->
</div> <!-- container-fluid bezárása -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
