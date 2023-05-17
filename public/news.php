<!DOCTYPE html>
<html>
<head>
    <title>News</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>News</h1>
    
    <?php
    // Verbindung zur Datenbank herstellen und News abrufen
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "news_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    $query = "SELECT * FROM news ORDER BY date DESC";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['content'] . "</p>";
            echo "<p class='date'>" . $row['date'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "Keine News vorhanden.";
    }

    $conn->close();
    ?>

</body>
</html>
