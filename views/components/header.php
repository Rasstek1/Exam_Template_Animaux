<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Rasstek, Tonka et Hubert</title>
    <style>
        .navbar {
            min-height: 80px;
        }

        .margin {
            margin-bottom: 150px;
        }

        .navbar-collapse {
            position: absolute;
            top: 100%;
            right: 15.5%; /* Aligné avec le bouton hamburger */
            left: auto;  /* Aligné avec le bouton hamburger */
            background: #fff;
            z-index: 1000;
        }
    </style>
</head>
<body>

<nav class="navbar margin navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-size: 36px;">Martin, Tonka et Hubert</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">À Propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
