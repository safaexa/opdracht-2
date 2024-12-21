<?php

include 'docenten.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Docent = new Docent();
        $Docent->updateDocent($_POST['naam'], $_POST['achternaam'],$_POST['vak'],$_POST['aantal_leerlingen'], $_GET['docentID']);
        header("Location:view-docent.php?process=update");
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
   
</head>
<body>

<div class="navbar">
        <div class="profile">
            <img src="school7.png" alt="Profielfoto" class="profile-img">
         
        </div>
        <ul class="nav-links">
            <li><a href="Dashboard.php">Vandaag</a></li>
            <li><a href="Rooster.php">Agenda</a></li>
            <li><a href="cijfer.php">Cijfers</a></li>
            <li><a href="overzicht.php">Overzicht</a></li>
            <li><a href="Help.php">Help</a></li>
            <li><a href="uitloggen.php">Afmelden</a></li>
        </ul>
    </div>
    
</head>
<body>
  <div class="container">
<form method="POST">
<h2>Docent Bewerken</h2>
    <div class="form-container">
        <input type="text" name="naam" placeholder="naam">
        <input type="text" name="achternaam" placeholder="achternaam">
        <input type="text" name="vak" placeholder="vak">
        <input type="text" name="aantal_leerlingen" placeholder="aantal_leerlingen">
     
        <input type="submit" value="Toevoegen">
                <a href="view-docent.php">Terug</a>
    </form>
  </div>

  </div>
</body>
</html>






