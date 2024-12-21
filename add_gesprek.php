
<?php
include 'gesprek.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $Naam_leerling = $_POST['Naam_leerling'];
   $Achternaam_leerling = $_POST['Achternaam_leerling'];
   $Gesprek = $_POST['Gesprek'];
   $gesprek = new Gesprek(); // Gebruik een kleine letter 'g' om naamconflict te vermijden
   $result = $gesprek->addGesprek($Naam_leerling, $Achternaam_leerling, $Gesprek);

   if ($result) {
    // Redirect naar view-docent.php na succesvol toevoegen
    header("Location: viewGesprek.php");
    exit(); // Zorg ervoor dat het script stopt na het doorsturen
} else {
    $message = "Er is een fout opgetreden bij het toevoegen van het gesprek.";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Gesprek Toevoegen</title>
<link rel="stylesheet" href="home2.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  
</head>
<body>

<div class="container">
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

    <main class="content">
    <div class="header">
<h2>Gesprek Toevoegen</h2>
    </div>
<div class="form-container">
<form action="" method="post">
<label for="Naam_leerling">Naam leerling:</label><br>
<input type="text" id="Naam_leerling" name="Naam_leerling" required><br><br>
<label for="Achternaam_leerling">Achternaam leerling:</label><br>
<input type="text" id="Achternaam_leerling" name="Achternaam_leerling" required><br><br>
<label for="Gesprek">Gesprek:</label><br>
<input type="text" id="Gesprek" name="Gesprek" required><br><br>
<input type="submit" value="Toevoegen">
<a href="viewGesprek.php">Terug</a>
</form>
    </div>
    </main>
    </div>
</body>
</html>