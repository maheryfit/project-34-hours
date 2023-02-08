<div class="container py-4 py-xl-5">
    <form action="<?= site_url("controlleur_user/vers_stat_nb_utilisateur");?>" method="post">
        <input name="annee" type="number" placeholder="Année" value="2023" class="form-control me-auto">
        <input name="moisdebut" type="number" placeholder="Mois début" value="2" class="form-control me-auto">
        <input name="moisfin" type="number" placeholder="Mois fin" value="5" class="form-control me-auto">
        <button type="submit" class="btn">Rechercher</button>
    </form>
</div>