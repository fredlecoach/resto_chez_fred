<?php
$username = "root";
$password = "";
$dbname = "ChezFred";
$serverName = "localhost";

$bdd = new PDO("mysql:host=$serverName;dbname=$dbname;charset=utf8", $username, $password);

try {
  $bdd = new PDO("mysql:host=$serverName;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connection réussie";
} catch(PDOException $e) {
  echo "échec de la connexion : " . $e->getMessage();
}

if(isset($_POST['soumettre'])){
  if(!empty(trim($_POST['nom'])) && !empty(trim($_POST['prenom'])) && !empty(trim($_POST['email'])) && !empty(trim($_POST['message']))){
    $nom = $_POST[htmlspecialchars('nom')];
    $prenom =$_POST[htmlspecialchars('prenom')];
    $email =$_POST[htmlspecialchars('email')];
    $message =$_POST[htmlspecialchars('message')];

    $insererNom = $bdd->prepare("INSERT INTO noms (`nom`) VALUES (?)");
    $insererNom->execute(array($nom));

    $insererPrenom = $bdd->prepare("INSERT INTO prenoms (`prenom`) VALUES (?)");
    $insererPrenom->execute(array($prenom));

    $insererEmail = $bdd->prepare("INSERT INTO emails (`email`) VALUES (?)");
    $insererEmail->execute(array($email));

    $insererMessage = $bdd->prepare("INSERT INTO messages (`message`) VALUES (?)");
    $insererMessage->execute(array($message));

    echo "Demande de réservation envoyée !";
    
}
else{
  echo "Veuillez remplir tous les champs !";
}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="spécialités carribéennes, raftout, columbo, patisseries des îles">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Chez Fred</title>
</head>
<body>
    <header>
        <a href="index.html"><img src="./images/logo chez fred.png" alt="logo chez fred" class="logo"></a>
        
        <nav>
            <a href="index.html">Home</a>
            <a href="apropos.html">À propos</a>
            <a href="réservations.html">Réservations</a>
            <a href="contact.html">Contact</a>
        </nav>
    </header>
    <body>
        <fieldset>
            <legend class="requete">Requêtes et suggestions</legend>
            <form method="post" action="">
               
                <label for="name">Nom<input type="text" name="nom" id="nom" placeholder="Entrez votre Nom" selected></label>
                <label for="prenom">Prénom<input type="text" name="prenom" id="prenom" placeholder="Entrez votre Prénom" required></label>
                <label for="email">Email<input type="email" name="email" id="email" placeholder="Entrer son @mail" required></label>

                     <textarea placeholder="Requêtes et suggestions" name="message">
                       
                     </textarea>
                 
            </form>
            <input type="submit" value="soumettre" class="bouton" id="formulaire" name="soumettre">
            
        </fieldset>
    </body>
    <footer>
        <div class="liens">
           <a href=""><i class="fa-regular fa-calendar"></i>Infos et réservations</a><br>
           <a href=""><i class="fa-brands fa-square-instagram"></i>Instagram</a><br>
           <a href=""><i class="fa-solid fa-eye"></i>Les avis</a><br>
           <a href=""><i class="fa-solid fa-book"></i>Mentions légales</a><br>
        </div>
        <div class="infos">
        <h4>Nos horaires d'ouverture</h4>
                <p><strong>lundi au Vendredi</strong><br>
                   12H00-14H30 / 18H30-23H00</p>
                <p><strong>Samedi au Dimanche</strong><br>
                   Brunch: 9H30-14H00<br>
                   Dîner: 18H00-21H30</p>
        
        
        </div>

    </footer>
    
</body>
</html>