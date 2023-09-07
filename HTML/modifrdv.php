<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- ^^BOOTSTRAP ^^-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/detect_model.js"></script>
    <link rel="icon" type="image/x-icon" href="../HTML/img/logo.png">
    <title>Prestige Motors</title>
</head>
<body>
    <header>
        <title>Prestige Motors</title>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <!--<li class="nav-item active">
            <a class="nav-link" href="index.html">Accueil</a>
          </li> -->
          <li>
              <a class="nav-link" href="reservation.php">Réservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="apropos.php">À propos</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    
    <div id="logo"><img src="../HTML/img/logo2.png" alt="logo Prestige Motors"></div>


    <div class="intro top shadow-sm p-3 mb-5 bg-white rounded">
        <div class ="title"><h1>Bienvenue sur Prestige Motors</h1></div>
        <h3> Vous êtes actuellement sur la page de modification de votre réservation de véhicules</h3>
    </div>

    <!-- Contenu de la page d'accueil -->
    
    
    <form class="main-form" action="../php/update_bdd.php" method="GET">
    <h1>Liste de vos rendez-vous :</h1>
      <div class="form-column">
        <label for="Filtre">Filtre:</label>
        <input type="text" name="Filtre" id="Filtre" required placeholder="Veuillez entrer votre email.">
<br>
        <input type="hidden" name="list_records" value="true">
        <input class="button btn btn-primary" type="submit" value="Voir mes rendez-vous">
    </div>
    </form>
    

    <footer class="footer text-secondary">
      <div class="container">
          <a class="text-secondary" href="apropos.html">À propos</a>
          <span class="text-muted">© 2023 Prestige Auto. Tous droits réservés.</span>
      </div>
    </footer>
</body>
</html>