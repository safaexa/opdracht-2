<?php
include 'docenten.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['naam'];
    $achternaam = $_POST['achternaam'];
    $vak = $_POST['vak'];
    $aantal_leerlingen = $_POST['aantal_leerlingen'];

    $Docent = new Docent();
    $result = $Docent->addDocent($naam, $achternaam, $vak, $aantal_leerlingen);

    if ($result) {
        // Redirect naar view-docent.php na succesvol toevoegen
        header("Location: view-docent.php");
        exit(); // Zorg ervoor dat het script stopt na het doorsturen
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van docent.";
    }
}
?>



<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent Toevoegen</title>
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


    <div class="container">
        <h2>Docent Toevoegen</h2>
        <div class="form-container">
            <?php if (!empty($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>
                
                <label for="achternaam">Achternaam:</label>
                <input type="text" id="achternaam" name="achternaam" required>
                
                <label for="vak">Vak:</label>
                <input type="text" id="vak" name="vak" required>
                
                <label for="aantal_leerlingen">Aantal Leerlingen:</label>
                <input type="text" id="aantal_leerlingen" name="aantal_leerlingen" required>
                
                <input type="submit" value="Toevoegen">
                <a href="view-docent.php">Terug</a>
            </form>
        </div>
    </div>
</body>
</html>
