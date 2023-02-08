<div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Listes des objets</h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
                $idobjet = "";
                foreach ($objetdesautres as $objetdesautre) { 
                    $idobjet = $objetdesautre["idimageobjet"];    
                ?>
                <div class="col">
                    <div>
                        <a href="<?= site_url("controlleur_user/vers_proposition_echange?idobjetcible=$idobjet");?>">
                            <img class="rounded img-fluid d-block w-100 fit-cover" style="height: 350px;" src="<?= site_url($objetdesautre["urlimage"]);?>">
                        </a>
                        <div class="py-4">
                            <h3><?= ucwords($objetdesautre["titre"]);?></h3>
                            <p><?= $objetdesautre["prix"];?> £</p>
                            <p><?= ucfirst($objetdesautre["description"]);?></p>
                        </div>
                    </div>
                </div>
                <?php }
            ?>
        </div>
</div>