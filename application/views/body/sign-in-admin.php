<form action="<?php echo site_url('controlleur_user/traitement_connexion_admin'); ?>" class="text-center" method="post">
    <div class="mb-3"><input class="form-control" type="text" value="boss" name="nom" placeholder="Email or username"></div>
    <div class="mb-4"><input class="form-control" type="password" name="pswd" value="boss123" placeholder="Password"></div>
    <div class="mb-3"><button class="btn d-block w-100" type="submit">Sign in</button></div>
</form>