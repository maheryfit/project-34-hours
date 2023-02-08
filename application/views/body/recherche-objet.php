<div class="container py-4 py-xl-5">
    <form action="#" method="post">
        <input name="motcle" type="text" placeholder="Rechercher" class="form-control me-auto">
        <label class="form-label" for="categorie">Choisir la catégorie :</label>
        <select name="categorie" class="form-select" id="categorie" aria-label="Default select example">
            <option value="0">Tous</option>
            <?php
                foreach ($categories as $categorie) { ?>
                    <option value="<?=$categorie["idcategorie"];?>"><?=$categorie["nom"];?></option>   
            <?php } ?>
        </select>
        <button type="submit" class="btn">Rechercher</button>
    </form>
</div>