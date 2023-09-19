<?php
require_once('class/Message.php');
require_once('class/GuestBook.php');
$errors = null;
$success = false;

$guestBook = new GuestBook(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'messages');

if (isset($_POST['username'], $_POST['message'])) {
    $message = new Message($_POST['username'], $_POST['message']);
    if ($message->isValid()) {
        $guestBook->addMessage($message);
        $success = true;
        $_POST = [];
    } else {
        $errors = $message->getErrors();
    }
}
// recuperer les messages
$messages = $guestBook->getMessage();
// fin
$title = "Livre d'or";
require($_SERVER['DOCUMENT_ROOT'] . '/element/header.php');
?>

<div class="container col-md-6 m-auto">
    <h1>Livre d'or</h1>

    <!-- les eurreurs -->
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">Formulaire invalide</div>
    <?php endif ?>
    <!-- success -->
    <?php if ($success) : ?>
        <div class="alert alert-success">Message enregistré avec succès!!</div>
    <?php endif ?>
    <!-- form -->
    <form action="" method="POST">
        <div class="form-group ">
            <input type="text" name="username" placeholder="Your username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" value="<?= htmlentities($_POST['username'] ?? '') ?>">
            <?php if (isset($errors['username'])) : ?>
                <div class="invalid-feedback"><?= $errors['username'] ?></div>
            <?php endif ?>
        </div>
        <div class="form-group">
            <textarea name="message" id="message" rows="3" placeholder="Your message" class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"><?= htmlentities($_POST['message'] ?? '') ?></textarea>
            <?php if (isset($errors['message'])) : ?>
                <div class="invalid-feedback"><?= $errors['message'] ?></div>
            <?php endif ?>
        </div>
        <input type="submit" class="btn btn-primary my-3" value="Send" name="send">
    </form>

    <?php if (!empty($messages)) : ?>
        <h1 class="my-4">Your comments ...</h1>
        <?php foreach ($messages as $message) { ?>
            <?= $message->toHTML() ?>
        <?php } ?>
    <?php endif ?>

</div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/element/footer.php');
?>