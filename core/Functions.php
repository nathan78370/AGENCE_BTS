<?php

function connectBDD($hostname, $database, $username, $password) {
    try {
        $bdd = new PDO("mysql:host=".$hostname.";dbname=".$database.";charset=utf8","".$username."","".$password."");
        return $bdd;
    } catch (PDOException $e) {
        die("Erreur de connexion au serveur MySQL : " . $e->getMessage());
    }
}

function auth($lvl) {
    if (isset($_SESSION['lvl']) && $_SESSION['lvl'] >= $lvl)
        return true;
    else
        header("Location: http://localhost/agenceimmobiliere/admin-panel/");
}

function pagination($nb, $page = 1) {
    $classe = "";
    $pages = ceil($nb/1); // $nb/nombre d'éléments par pages
    if ($page == 1)
        $classe = 'disabled';
    $html = "<ul class='pagination'>";
    $html .= "<li class='page-item {$classe}'><a class='page-link' href='".URL."/page/".($page-1)."'>Précédant</a></li>";
    $classe = "";
    for ($i = 1; $i <= $pages; $i++) {
        if ($page == $i)
            $html .= "<li class='page-item active'><a class='page-link' href='".URL."/page/$i'>$i</a></li>";
        else
            $html .= "<li class='page-item'><a class='page-link' href='".URL."/page/$i'>$i</a></li>";
    }
    if ($page == $pages)
        $classe = 'disabled';
    $html .= "<li class='page-item {$classe}'><a class='page-link' href='".URL."/page/".($page+1)."'>Suivant</a></li>";
    $html .= "</ul>";
    return $html;
}

?>