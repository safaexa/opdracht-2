<?php

include 'gesprek.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Gesprek = new Gesprek();
        $Gesprek->updateGesprek($_POST['Naam_leerling'], $_POST['Achternaam_leerling'],$_POST['Gesprek'], $_GET['GesprekID']);
        header("Location:viewGesprek.php?process=update");
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
            <li><a href="index.php">Vandaag</a></li>
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
<h2>Gesprek Bewerken</h2>
    <div class="form-container">
        <input type="text" name="Naam_leerlingen" placeholder="Naam_leerlingen">
        <input type="text" name="Achternaam_leerlingen" placeholder="Achternaam_leerlingen">
        <input type="text" name="Gesprek" placeholder="Gesprek">

     
        <input type="submit" value="Toevoegen">
                <a href="viewGesprek.php">Terug</a>
    </form>
  </div>

  </div>
</body>
</html>






