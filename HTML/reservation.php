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
        <h3> Vous êtes actuellement sur la page de réservation de véhicules</h3>
    </div>

    <!-- Contenu de la page d'accueil -->
    
    <div class="text  masthead-subheading font-weight-light mb-0">
      Voir la liste des véhicules en  <a href="portrait.php" name="ici">image</a>
    </div>


    <form class="main-form" action="../php/formulaire.php" method="POST">
      <h1>Formulaire de réservation</h1>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name"required>
          </div>
            
        <div class="form-group col-md-6">
          <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="monemail@mail.com">
        </div>
      </div>
            
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" placeholder="12345678" ="phone" required>
        </div>
        
        <div class="form-group col-md-6">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" placeholder="1 avenue de l'ouest"="address" required>
        </div>
      </div>
            <label for="appointment-date">Appointment Date:</label>
            <input type="date" class="form-control" name="appointment-date" id="appointment-date" required>
            
        <div class="form-row">
            <div class="sub-component">
                <label for="vehicle-category">Vehicle Category:</label>
                <select class="form-control" name="vehicle-category" id="vehicle-category" required>
                    <option value="citadine">Citadine</option>
                    <option value="suv">SUV</option>
                    <option value="ancienne">Ancienne</option>
                    <option value="luxe">Luxe</option>
                </select>
    
                <label for="vehicle-model">Vehicle Model:</label>
                <select class="form-control" name="vehicle-model" id="vehicle-model" required>
                    <!-- Les options pour la sélection de la marque et du modèle seront ajoutées dynamiquement ici -->
                </select>
                
                <!-- Champ de formulaire caché pour l'ID de la voiture -->
                <input type="hidden" name="vehicle-id" id="vehicle-id">
            </div>
        </div>
            <input class="btn btn-primary" type="submit" name="main-save" value="J'ai fini !">
      </div>
    </form>

    <div class="masthead-subheading font-weight-light mb-0">
      Si vous voulez modifier un de vos rendez-vous c'est par <a href="modifrdv.php" name="ici">ici</a>
    </div>

    <footer class="footer text-secondary">
      <div class="container">
          <a class="text-secondary" href="apropos.html">À propos</a>
          <span class="text-muted">© 2023 Prestige Auto. Tous droits réservés.</span>
      </div>
    </footer>
</body>
</html>