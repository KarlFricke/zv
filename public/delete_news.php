<!DOCTYPE html>
<html>
<head>
    <title>News löschen</title>
</head>
<body>
    <h1>News löschen</h1>

    <?php
    // Code zum Abrufen der vorhandenen News aus der Datenbank und Anzeigen zum Löschen

    // Beispielcode:
    // Annahme: Du hast eine Funktion namens getNews() implementiert, die alle News aus der Datenbank abruft
    // Du kannst die Funktion anpassen, um die Daten aus deiner Datenbank abzurufen

    $news = getNews();

    foreach ($news as $newsItem) {
        ?>
        <form action="delete_news.php" method="post">
            <input type="hidden" name="id" value="<?php echo $newsItem['id']; ?>">

            <h3><?php echo $newsItem['title']; ?></h3>
            <p><?php echo $newsItem['content']; ?></p>

            <input type="submit" name="submit" value="Löschen">
        </form>
        <?php
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Code zum Löschen der News

        // Beispielcode:
        $id = $_POST["id"];

        // Hier kannst du den Code zum Löschen der News aus der Datenbank schreiben
        // Verwende dazu die entsprechende Variable, um die News anhand der ID zu löschen
    }
    ?>
</body>
</html>
