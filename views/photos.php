<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Photos de profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<?php include __DIR__.'/components/header.php'?>
<main class="container mt-4">
    <form method="post" enctype="multipart/form-data" action="../actions/photos.php">
        <div>
            <label for="fichiers" class="form-label">Hubert<sup>*</sup></label>
            <input type="file" id="fichiers" name="Hubert" class="form-control" accept="image" >
        </div>
        <div>
            <label for="fichiers" class="form-label">Martin<sup>*</sup></label>
            <input type="file" id="fichiers" name="Martin" class="form-control" accept="image" >
        </div>
        <div>
            <label for="fichiers" class="form-label">Tonka<sup>*</sup></label>
            <input type="file" id="fichiers" name="Tonka" class="form-control" accept="image" >
        </div>
        <button type="submit" class="btn btn-primary mt-4 w-25">Modifier photos de profil</button>
    </form>
    <a href="../index.php" class="btn btn-secondary w-25 mt-4">Retourner à l'accueil</a>
</main>
</body>
</html>