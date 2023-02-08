<form action="<?php echo site_url('controlleur_user/traitement_connexion_client'); ?>" class="text-center" method="post">
    <div class="mb-3"><input class="form-control" type="text" name="nom" value="jean" placeholder="Email or username"></div>
    <div class="mb-4"><input class="form-control" type="password" name="pswd" value="jean123" placeholder="Password"></div>
    <div class="mb-3"><button class="btn d-block w-100" type="submit">Login</button></div>
</form>
<a href="<?php echo site_url('controlleur_user/vers_inscription_client'); ?>">Créer un compte</a>