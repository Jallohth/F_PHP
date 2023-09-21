<?php
require_once "Post.php";
require_once("../element/header.php");

$conn = new PDO('mysql:host=localhost;dbname=posts', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$error = null;
try {
    if (isset($_POST['username'], $_POST['message'])) {
        $query = $conn->prepare("INSERT INTO post(username, message, createDate) VALUEs(:username, :message, :createDate)");
        $query->execute([
            'username' => $_POST['username'],
            'message' => $_POST['message'],
            'createDate' => date('Y-m-d H:i:s')
        ]);
    }
    $query = $conn->query("SELECT * FROM post");
    $posts = $query->fetchAll(PDO::FETCH_CLASS, "Post");
} catch (PDOException $e) {
    $error = 'Erreur de connexion' . $e->getMessage();
}
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
    <div class="container ">
        <div class="col-md-8 m-auto">
            <form action="" method="post">
                <div class="form-group  m-auto">
                    <input type="text" class="form-control" name="username" placeholder="Your username" required>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="message" placeholder="Your message" rows="5" required></textarea>
                </div>
                <input type="submit" class="btn btn-primary mt-2" name="send" value="Send">
            </form>
        </div>
        <?php if ($error) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php else : ?>
            <ul>
                <h1 class="fw-bold my-3">Liste des articles, auteurs et date de publication</h1>
                <?php foreach (array_reverse($posts) as $post) : ?>

                    <a href="/PDO/edit.php?id=<?= $post->id ?>">Click here to modify...</a>
                    <p class="my-2"><?= nl2br(htmlentities($post->message)) ?>
                    <p>
                    <div class="small text-muted border-bottom d-flex justify-content-between mb-3">
                        <span class="mb-1">Ecris par <a href="/PDO/edit.php?id=<?= $post->id ?>" class="mb-3"><?= htmlentities($post->username) ?></a></span>
                        <span>le <?= $post->createDate->format("d/m/Y à H:i:s"); ?></span>
                    </div>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    </div>