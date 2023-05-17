<!DOCTYPE html>
<html>
<head>
    <title>News bearbeiten</title>
</head>
<body>
    <h1>News bearbeiten</h1>

    <?php
    // Code zum Abrufen der vorhandenen News aus der Datenbank und Anzeigen in einem Formular

    // Beispielcode:
    // Annahme: Du hast eine Funktion namens getNews() implementiert, die alle News aus der Datenbank abruft
    // Du kannst die Funktion anpassen, um die Daten aus deiner Datenbank abzurufen

    $news = getNews();

    foreach ($news as $newsItem) {
        ?>
        <form action="edit_news.php" method="post">
            <input type="hidden" name="id" value="<?php echo $newsItem['id']; ?>">

            <label for="title">Titel:</label>
            <input type="text" name="title" value="<?php echo $newsItem['title']; ?>" required><br>

            <label for="content">Inhalt:</label>
            <textarea name="content" rows="4" required><?php echo $newsItem['content']; ?></textarea><br>

            <input type="submit" name="submit" value="News speichern">
        </form>
        <?php
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Code zum Speichern der bearbeiteten News

        // Beispielcode:
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        // Hier kannst du den Code zum Aktualisieren der News in der Datenbank schreiben
        // Verwende dazu die entsprechenden Variablen, um Titel und Inhalt in der Datenbank zu aktualisieren
    }
    ?>
</body>
</html>
