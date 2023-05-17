<!DOCTYPE html>
<html>
<head>
    <title>Neue News erstellen</title>
</head>
<body>
    <h1>Neue News erstellen</h1>

    <form action="create_news.php" method="post">
        <label for="title">Titel:</label>
        <input type="text" name="title" required><br>

        <label for="content">Inhalt:</label>
        <textarea name="content" rows="4" required></textarea><br>

        <input type="submit" name="submit" value="News erstellen">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Code zum Erstellen der News
        // Du kannst die eingegebenen Daten in die Datenbank einfügen

        // Beispielcode:
        $title = $_POST["title"];
        $content = $_POST["content"];

        // Hier kannst du den Code zum Einfügen der News in die Datenbank schreiben
        // Verwende dazu die entsprechenden Variablen, um Titel und Inhalt in die Datenbank einzufügen
    }
    ?>
</body>
</html>
