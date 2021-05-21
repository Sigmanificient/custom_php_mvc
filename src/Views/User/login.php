<?php

$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);

?>

<h1 class="title">Connexion</h1>
<form class="form container grid" action="<?= SITE . '/User/process_login'?>" method="POST">
    <label for="name">
        <input name="name" type="text" placeholder="Nom" required>
    </label>
    <label for="password">
        <input name="password" type="password" placeholder="Mot de passe" required>
    </label>

    <?php if ($error === 'invalid'):?>
        <p class="splash">Mauvais identifiant ou mot de passe !</p>
    <?php endif; ?>

    <label for="actions">
        <input class="button" type="submit" value="Valider">
        <input class="button" type="reset" value="Annuler" accesskey="r">
    </label>
</form>