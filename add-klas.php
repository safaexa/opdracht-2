<?php
include 'klas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $klas_naam = $_POST['klas_naam'];
    $aantal_leerlingen = $_POST['aantal_leerlingen'];
    $Mentor = $_POST['Mentor'];
    $niveau = $_POST['niveau'];

    $klas = new klas();
    $result = $klas->addKlas($klas_naam, $aantal_leerlingen, $Mentor, $niveau);

    if ($result) {
        // Redirect naar view-klas.php na succesvol toevoegen
        header("Location: view-klas.php");
        exit(); // Zorg ervoor dat het script stopt na het doorsturen
    } else {
        $message = "Er is een fout opgetreden bij het toevoegen van de klas.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klas Toevoegen</title>
    <link rel="stylesheet" href="home2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
</head>
<body>

    <div class="navbar">
        <div class="profile">
            <img src="school7.png" alt="Profielfoto" class="profile-img">
        </div>
        <ul class="nav-links">
            <li><a href="dashboard.php">Vandaag</a></li>
            <li><a href="Rooster.php">Agenda</a></li>
            <li><a href="cijfer.php">Cijfers</a></li>
            <li><a href="overzicht.php">Overzicht</a></li>
            <li><a href="Help.php">Help</a></li>
            <li><a href="uitloggen.php">Afmelden</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Klas Toevoegen</h2>
        <div class="form-container">
            <?php if (!empty($message)): ?>
                <p><?php echo $message; ?></p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="klas_naam">Klas naam:</label>
                <input type="text" id="klas_naam" name="klas_naam" required>
                
                <label for="aantal_leerlingen">Aantal leerlingen:</label>
                <input type="text" id="aantal_leerlingen" name="aantal_leerlingen" required>
                
                <label for="Mentor">Mentor:</label>
                <input type="text" id="Mentor" name="Mentor" required>
                
                <label for="niveau">Niveau:</label>
                <input type="text" id="niveau" name="niveau" required>
                
                <input type="submit" value="Toevoegen">
                <a href="view-klas.php">Terug</a>
            </form>
        </div>
    </div>
</body>
</html>
