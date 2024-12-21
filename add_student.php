<?php
require_once 'db/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Hier komt de code voor het toevoegen van een student
    $name = $_POST['name'];
    $class_id = $_POST['class'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash het wachtwoord

    $stmt = $conn->prepare('INSERT INTO students (student_name, class_id, student_password) VALUES (:name, :class_id, :password)');
    $stmt->execute(['name' => $name, 'class_id' => $class_id, 'password' => $password]);

    $message = 'Student succesvol toegevoegd';
}

// Haal de klassen op uit de database
$stmt = $conn->prepare('SELECT class_id, class_name FROM classes');
$stmt->execute();
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Toevoegen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="form">
        <h1>Student Toevoegen</h1>
        
        <form method="post">
            <label for="name">Naam Student:</label>
            <input type="text" name="name" required>
            <label for="class">Klas:</label>
            <select name="class" required>
                <option value="">Selecteer Klas</option>
                <?php foreach ($classes as $class): ?>
                    <option value="<?php echo $class['class_id']; ?>"><?php echo $class['class_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" required>
            <button type="submit">Student Toevoegen</button>
        </form>

        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
