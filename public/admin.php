<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}

// Funktion zum Hochladen eines Bildes
function uploadImage($file)
{
    $targetDir = 'images/';
    $targetFile = $targetDir . basename($file['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Überprüfen, ob es sich um ein gültiges Bild handelt
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        throw new Exception('Die hochgeladene Datei ist kein Bild.');
    }

    // Überprüfen, ob die Datei bereits existiert
    if (file_exists($targetFile)) {
        throw new Exception('Die Datei existiert bereits.');
    }

    // Überprüfen, ob das Bild erfolgreich hochgeladen wurde
    if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
        throw new Exception('Beim Hochladen des Bildes ist ein Fehler aufgetreten.');
    }

    return $targetFile;
}

// Nachrichten hinzufügen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Überprüfen, ob ein Bild hochgeladen wurde
    if (isset($_FILES['image']) && $_FILES['image']['name'] !== '') {
        try {
            $image = uploadImage($_FILES['image']);
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    // Daten in die Datenbank einfügen
    // Hier müssten Sie Ihren eigenen Code zum Einfügen der Daten in die Datenbank einfügen

    // Erfolgreich hinzugefügt
    $success = 'Die Nachricht wurde erfolgreich hinzugefügt.';
}

// Abmelden
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="admin.php">News verwalten</a></li>
                <li><a href="logout.php">Abmelden</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>News verwalten</h1>

        <?php if (isset($success)) : ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>

        <?php if (isset($error)) : ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="admin.php" method="POST" enctype="multipart/form-data">
            <label for="title">Titel:</label>
            <input type="text" name="title" required>

            <label for="content">Inhalt:</label>
            <textarea name="content" required></textarea>

            <label for="image">Bild:</label>
            <input type="file" name="image">

            <input type="submit" value="Hinzufügen">
        </form>
    </main>
</body>
</html>
