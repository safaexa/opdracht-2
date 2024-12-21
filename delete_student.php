<?php
session_start();
require_once 'db.php';

// Controleer of de gebruiker is ingelogd en een docent is
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    header('Location: login.php');
    exit;
}

// Controleer of de student_id is doorgegeven via GET
if (!isset($_GET['id'])) {
    // Als student_id niet is opgegeven, stuur terug naar de studentenweergavepagina
    header('Location: view_students.php');
    exit;
}

$id = $_GET['id'];

// Haal de naam van de student op voor bevestiging (optioneel)
$stmt_student = $conn->prepare('SELECT name FROM students WHERE student_id = :id');
$stmt_student->execute(['id' => $id]);
$student = $stmt_student->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    // Als er geen student met deze ID bestaat, stuur terug naar de studentenweergavepagina
    header('Location: view_students.php');
    exit;
}

// Als er een bevestiging nodig is, kun je hier een bevestigingspagina maken voordat je de student daadwerkelijk verwijdert.

// Verwijder de student uit de database
$stmt_delete = $conn->prepare('DELETE FROM students WHERE student_id = :id');
$stmt_delete->execute(['id' => $id]);

// Redirect naar de studentenweergavepagina na verwijderen
header('Location: view_students.php');
exit;
?>
