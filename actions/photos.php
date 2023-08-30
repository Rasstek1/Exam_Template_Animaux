<?php

session_start();

function setPhoto($nom)
{
    if (isset($_FILES[$nom])) {
        if (!is_dir("../fichiers/{$nom}")) {
            mkdir("../fichiers/{$nom}", 0644);
        }
        if(!empty($_FILES[$nom]["tmp_name"])){
            $timestamp = time();
            $url = "../fichiers/{$nom}/profil_" . $timestamp . '.png'; // Générer un nom de fichier unique

            // Vérifiez si un fichier du même nom existe déjà.
            $existingFile = glob("../fichiers/{$nom}/profil_*.png");
            if (!empty($existingFile)) {
                // Supprimer le fichier existant
                unlink($existingFile[0]);
            }

            // Déplacer le fichier
            move_uploaded_file($_FILES[$nom]["tmp_name"], $url);

            // Sauvegarder le nom du nouveau fichier comme photo de profil actuelle
            $_SESSION['profile_pics'][$nom] = $url;
        }
    }
}

if(isset($_FILES)){
    foreach ($_FILES as $nom => $val) {
        setPhoto($nom);
    }
}

header("Location: ./../index.php", TRUE, 301);






