<?php
$conn = new PDO('mysql:dbname=posts;host=localhost', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$error = null;
$success = null;
try {
    if (isset($_POST['username'], $_POST['message'], $_POST['id'])) {
        $query = $conn->prepare("UPDATE post SET username = :username, message = :message WHERE id = :id");
        $query->execute([
            'username' => $_POST['username'],
            'message' => $_POST['message'],
            'id' => $_POST['id'],
        ]);
        $success = "Modification effectuée avec succès";
        header('location:index.php');
        exit();
    }
    if (isset($_GET['id'])) {
        $query = $conn->prepare("SELECT * FROM post WHERE id = :id");
        $query->execute(['id' => $_GET['id']]);
        $post = $query->fetch();
    }
} catch (PDOException $e) {
    $error =  "Erreur de connexion " . $e->getMessage();
}

require_once "../element/header.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Présentation de THD">
    <title>
        <?= isset($title) ? $title : "Mon site web" ?>
    </title>
    <!-- les feuilles de styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../index.css">
</head>

<body>

    <div class="container col-md-8 m-auto">
        <?php if ($success) : ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif ?>
        <?php if ($error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php else : ?>
            <a href="index.php">Preview</a>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" value="<?= htmlentities($post['username']) ?>" placeholder="Your username">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="message" placeholder="Your message" rows="5"><?= htmlentities($post['message']) ?></textarea>
                </div>
                <input type="submit" class="btn btn-primary mt-2" name="send" value="Update">
            </form>
        <?php endif ?>
    </div>

    