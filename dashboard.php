<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <nav class="navbar">
            <div class="profile">
                <img src="school7.png" alt="Profielfoto" class="profile-img">
            </div>
            <ul class="nav-links">
                <li><a href="dashboard.php" id="dashboard-link">Dashboard</a></li>
                <li><a href="#" id="agenda-link">Agenda</a></li>
                <li><a href="cijfers.php" id="cijfers-link">Cijfers</a></li>
                <li><a href="#" id="overzicht-link">Overzicht</a></li>
                <li><a href="help.php" id="help-link">Help</a></li>
                <li><a href="uitloggen.php">Afmelden</a></li>
            </ul>
        </nav>
        <main class="content">
            <div class="header">
                <h1>Dashboard voor studenten</h1>
            </div>
            <div class="main-content">
                <div class="today-schedule">
                    <h2>Vandaag</h2>
                    <ul>
                        <li>09:00 - 10:00 Nederland</li>
                        <li>10:00 - 11:00 Rekenen</li>
                        -
                        <li>11:15 - 12:15 UML</li>
                        <li>12:15 - 13:15 OOP</li>
                        -
                        <li>13:45 - 14:45 beroepsproject</li>
                        <li>14:45 - 15:45 OUT</li>
                        <!-- Voeg meer lessen toe zoals nodig -->
                    </ul>
                </div>
                <div class="recent-grades">
                    <h2>Laatste Behaalde Cijfers</h2>
                    <ul>
                        <li><a href="cijfers.php" id="grade-link">Nederlands: 6</a></li>
                        <li><a href="cijfers.php" id="grade-link">Engels: 8,5</a></li>
                        <!-- Voeg meer cijfers toe zoals nodig -->
                    </ul>
                </div>
                <div class="latest-news">
                    <h2>Laatste Nieuws</h2>
                    <p>Niks voor vandaag</p>
                </div>
            </div>
        </main>
    </div>

   
</body>
</html>
