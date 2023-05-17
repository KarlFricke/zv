<!DOCTYPE html>
<html>
<head>
    <title>UCP - Anmeldung</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<div class="overlay" id="successOverlay"></div>

    <header>
        <!-- Header-Inhalt hier -->
    </header>

    <main>
        
        <center>
        <div class="container">
        <h1>Anmeldung</h1>
        <form id="loginForm" action="ucp.php" method="post">
            <label for="username">Benutzername:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Anmelden</button>
        </form>
        <p>Noch kein Konto? <a href="register.php">Jetzt registrieren</a></p>
        <div id="errorDiv"></div>
    </div>
</center>
    </main>

    <footer>
        <!-- Footer-Inhalt hier -->
    </footer>

    
    
</body>
</html>






