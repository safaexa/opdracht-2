
<?php if (isset($deleteMessage)): ?>
    <p><?php echo $deleteMessage; ?></p>
<?php endif; ?>

<?php
include 'docenten.php'; 

// Verwijderen van een docent
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $Docent = new Docent(); 
    $deletedRows = $Docent->deleteDocent($_POST['delete_id']); 
    if ($deletedRows === false) {
        $deleteMessage = "Er is een fout opgetreden bij het verwijderen van docent.";
    } else {
        $deleteMessage = "Docent succesvol verwijderd.";
    }
}

// Ophalen van alle docenten
$Docent = new Docent(); 
$data = $Docent->getAllDocent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docent dashboard</title>
    <link rel="stylesheet" href="home2.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="navbar">
        <div class="profile">
            <img src="school7.png" alt="Profielfoto" class="profile-img">
            <h2></h2>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Vandaag</a></li>
            <li><a href="overzicht.php">Overzicht</a></li>
            <li><a href="Help.php">Help</a></li>
            <li><a href="uitloggen.php">Afmelden</a></li>
        </ul>
    </div>

    <div class="container">
        <h1>docenten overzicht</h1>
        <?php if (isset($deleteMessage)): ?>
            <p><?php echo $deleteMessage; ?></p>
        <?php endif; ?>
        <table>
            <tr>
                <th>Docent ID</th>
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Vak</th>
                <th>Aantal Leerlingen</th>
                <th>Actie</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['docentID']; ?></td>
                    <td><?php echo $row['naam']; ?></td>
                    <td><?php echo $row['achternaam']; ?></td>
                    <td><?php echo $row['vak']; ?></td>
                    <td><?php echo $row['aantal_leerlingen']; ?></td>
                    <td class="action-links">
                        <a href="edit-docent.php?id=<?php echo $row['docentID']; ?>">Edit</a>
                        <form method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $row['docentID']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add-docent.php">Nieuwe Docent toevoegen</a>
    </div>
</body>
</html>