<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Album example · Bootstrap v5.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/agenceimmobiliere/">Agence Immobilière</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/agenceimmobiliere/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL; ?>/logements">Logement</a>
                </li>
            </ul>
            <form method="post" action="" class="d-flex">
                <input type="number" name="surfaceMin" placeholder="Surface minimum" class="form-control me-2">
                <input type="number" name="surfaceMax" placeholder="Surface maximum" class="form-control me-2">
                <select name="nbPieces" class="form-select me-2">
                    <option value="">Nombre de pièces</option>
                    <option value="1">1 pièce</option>
                    <option value="2">2 pièces</option>
                    <option value="3">3 pièces</option>
                    <option value="4">4 pièces</option>
                    <option value="5">5 pièces</option>
                    <option value="6">6 pièces</option>
                    <option value="7">7 pièces</option>
                    <option value="8">8 pièces</option>
                    <option value="9">9 pièces</option>
                    <option value="10">10 pièces</option>
                    <option value="11">11 pièces</option>
                    <option value="12">12 pièces</option>
                    <option value="13">13 pièces</option>
                    <option value="14">14 pièces</option>
                    <option value="15">15 pièces</option>
                    <option value="16">16 pièces</option>
                    <option value="17">17 pièces</option>
                    <option value="18">18 pièces</option>
                    <option value="19">19 pièces</option>
                    <option value="20">20 pièces</option>
                </select>
                <input type="number" name="min" placeholder="Prix minimum" class="form-control me-2">
                <input type="number" name="max" placeholder="Prix maximum" class="form-control me-2">
                <input type="search" name="search" placeholder="Rechercher une ville...." class="form-control me-2">
                <button type="submit" name="subsearch" class="btn btn-outline-success">Search</button>
            </form>
        </div>
    </div>
</nav>

<?php

if (isset($_POST['subsearch'])) {
    $search = htmlentities($_POST['search']);
    $min = isset($_POST['min']) ? (int)$_POST['min'] : "";
    $max = isset($_POST['max']) ? (int)$_POST['max'] : "";
    $nbPieces = isset($_POST['nbPieces']) ? (int)$_POST['nbPieces'] : "";
    $surfaceMin = isset($_POST['surfaceMin']) ? (int)$_POST['surfaceMin'] : "";
    $surfaceMax = isset($_POST['surfaceMax']) ? (int)$_POST['surfaceMax'] : "";
    $sql = "SELECT * FROM logement WHERE ";
    
    if (strlen($search) > 0)
        $sql .= "ville LIKE '%$search%' AND ";

    if ($min != "")
        $sql .= "prix > $min AND ";    

    if ($max != "")
        $sql .= "prix < $max AND ";

    if ($nbPieces != "")
        $sql .= "nbPieces = $nbPieces AND ";

    if ($surfaceMin != "")
        $sql .= "surface >= $surfaceMin AND ";    

    if ($surfaceMax != "")
        $sql .= "surface <= $surfaceMax AND ";

    $sql = substr($sql, 0, strlen($sql)-4);

    $requete = $bdd->query($sql);

    $logements = $requete->fetchAll();

    foreach ($logements as $logement) {
        echo "<p>".$logement['adresse']."</p>";
        echo "<p>".$logement['ville']."</p>";
        echo "<p>".$logement['nbPieces']."</p>";
        echo "<p>".$logement['surface']."</p>";
        echo "<p>".$logement['prix']."</p>";
    }
}

?>

<main>
<?= $contents; ?>
</main>

<h2 class="text-center mt-4 mb-3">Liste des logements</h2>
 ,
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page == 1) {
    $start = 0;
} else {
    $start = ($page-1) * 1; // $start = ($page-1) * nombre d'éléments par pages
}

$logements = $bdd->query("SELECT * FROM logement ORDER BY id_l DESC LIMIT $start, 1"); // $start, nombre d'éléments par pages
foreach ($logements as $logement) {

?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-auto">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Pièces</th>
                        <th scope="col">Surfaces</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $logement['id_l']; ?></td>
                        <td><?= $logement['adresse']; ?></td>
                        <td><?= $logement['ville']; ?></td>
                        <td><?= $logement['nbPieces']; ?></td>
                        <td><?= $logement['surface']; ?></td>
                        <td><?= $logement['prix']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php } ?>

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-auto">
            <nav>
                <?php
                $requete = $bdd->query("SELECT COUNT(*) AS nb FROM logement");
                $reponse = $requete->fetch();
                $nb = $reponse['nb'];
                echo pagination($nb, $page);
                ?>
            </nav>
        </div>
    </div>
</div>

<footer class="text-muted py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.0/getting-started/introduction/">getting started guide</a>.</p>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>
</html>