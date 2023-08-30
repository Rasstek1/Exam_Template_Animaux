<?php

require_once __DIR__.'/models/Chat.php';
require_once __DIR__.'/models/Chien.php';
require_once __DIR__.'/models/Personne.php';



session_start();
if(!isset($_SESSION['martin'])){
    $martin = new Personne('Martin', 'Programmeur', '1500');
    $chat = new Chat('Hubert');
    $chien = new Chien('Tonka');
    $martin->adopterAnimal($chat);
    $martin->adopterAnimal($chien);
    $_SESSION['martin'] = $martin;
    $_SESSION['temps'] = new DateTime('now', new DateTimeZone('America/New_York'));
    $_SESSION['erreur'] = '';
}
$martin = $_SESSION['martin'];

if(!isset($_SESSION['profile_pics'])){
    $_SESSION['profile_pics'] = [
        'Martin' => 'fichiers/Martin/profil.png',
        'Hubert' => 'fichiers/Hubert/profil.png',
        'Tonka'  => 'fichiers/Tonka/profil.png'
    ];
}


function getProfilePic($name) {
    return isset($_SESSION['profile_pics'][$name]) ? $_SESSION['profile_pics'][$name] : "fichiers/{$name}/profil.png";
}

?>

<style>
    .content {
        margin-bottom: 100px;  /* Ou toute autre valeur qui correspond à la hauteur de votre footer */
    }

</style>

<body>
<?php include __DIR__.'/views/components/header.php'?>
<main class="container content">

    <p><?= $_SESSION['temps']->format('d M Y H:i'); ?></p>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="<?= getProfilePic('Martin') ?>" class="card-img-top img-fluid w-25" alt="Image Martin">
                <div class="card-body">
                    <h2 class="card-title">Martin</h2>
                    <div class="card-text">
                        <ul>
                            <li>Argent disponible : <?=  $martin->getCompte()/100 ?>$</li>
                            <li>Taux horaire : <?= $martin->getSalaire()/100 ?>$</li>
                            <li>Poste : <?= $martin->getTravail() ?></li>
                        </ul>
                        <form action="actions/travailler.php" name="travailler" method="post">
                            <button type="submit" class="btn btn-primary">Travailler 8h</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="<?= getProfilePic('Hubert') ?>" class="card-img-top img-fluid w-25" alt="Image Hubert">
                <div class="card-body">
                    <h2 class="card-title">Hubert</h2>
                    <div class="card-text">
                        <ul>
                            <li>Dernier repas : <?= $martin->getAnimalParNom('Hubert')->dernierRepas->format('d M Y H:i') ?></li>
                            <li>A faim : <?= $martin->getAnimalParNom('Hubert')->isAFaim($_SESSION['temps']) ? 'oui' : 'non' ?></li>
                        </ul>
                        <form action="actions/nourrir.php" name="nourrirHubert" method="post">
                            <input type="hidden" name="nom" value="Hubert">
                            <button type="submit" class="btn btn-primary">Nourrir Hubert</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="<?= getProfilePic('Tonka') ?>" class="card-img-top img-fluid w-25" alt="Image Tonka">
                <div class="card-body">
                    <h2 class="card-title">Tonka</h2>
                    <div class="card-text">
                        <ul>
                            <li>Dernier repas : <?= $martin->getAnimalParNom('Tonka')->dernierRepas->format('d M Y H:i') ?></li>
                            <li>A faim : <?= $martin->getAnimalParNom('Tonka')->isAFaim($_SESSION['temps']) ? 'oui' : 'non' ?></li>
                        </ul>
                        <form action="actions/nourrir.php" name="nourrirTonka" method="post">
                            <input type="hidden" name="nom" value="Tonka">
                            <button type="submit" class="btn btn-primary">Nourrir Tonka</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <a href="views/photos.php" class="btn btn-secondary mt-4">Modifier les photos de profil</a>
    </div>
</main>


<?php include __DIR__.'/views/components/footer.php'?>

</body>
</html>