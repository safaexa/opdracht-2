<?php
include 'gesprek.php'; 

// Verwijderen van een gesprek
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $Gesprek = new Gesprek(); 
    $deletedRows = $Gesprek->deleteGesprek($_POST['delete_id']); 
    if ($deletedRows === false) {
        $deleteMessage = "Er is een fout opgetreden bij het verwijderen van het gesprek.";
    } else {
        $deleteMessage = "Gesprek succesvol verwijderd.";
    }
}

// Ophalen van alle gesprekken
$Gesprek = new Gesprek(); 
$data = $Gesprek->getAllGesprek();
?>

<!DOCTYPE html>
<html lang="nl">
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
        </div>
        <ul class="nav-links">
        <a href="dashboard.php" id="dashboard-link">Dashboard</a>
        <a href="#" id="agenda-link">Agenda</a>
        <a href="cijfers.php" id="cijfers-link">Cijfers</a>
        <a href="#" id="overzicht-link">Overzicht</a>
        <a href="help.php" id="help-link">Help</a>
        <a href="uitloggen.php">Afmelden</a>
    </ul>
    </div>

    <div class="container">
        <h1>Gesprek overzicht</h1>
        <?php if (isset($deleteMessage)): ?>
            <p><?php echo $deleteMessage; ?></p>
        <?php endif; ?>
        <table>
            <tr>
                <th>Gesprek ID</th>
                <th>Naam leerling</th>
                <th>Achternaam leerling</th>
                <th>Gesprek</th>
                <th>Acties</th>
            </tr>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['GesprekID']; ?></td>
                    <td><?php echo $row['Naam_leerling']; ?></td>
                    <td><?php echo $row['Achternaam_leerling']; ?></td>
                    <td><?php echo $row['Gesprek']; ?></td>
                    <td class="action-links">
                        <a href="edit-gesprek.php?id=<?php echo $row['GesprekID']; ?>">Edit</a>
                        <form method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $row['GesprekID']; ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add_gesprek.php">Nieuwe Gesprek toevoegen</a>
    </div>

</body>
</html>
