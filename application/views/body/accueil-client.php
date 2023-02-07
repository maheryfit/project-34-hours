<div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Listes de mes objets</h2>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
                foreach ($listeobjets as $listeobjet) { ?>
                <div class="col">
                    <div>
                        <a href="">
                            <img class="rounded img-fluid d-block w-100 fit-cover" style="height: 350px;" src="<?= site_url($listeobjet["urlimage"]);?>">
                        </a>
                        <div class="py-4">
                            <h3><?= ucwords($listeobjet["titre"]);?></h3>
                            <p><?= $listeobjet["prix"];?> £</p>
                            <p><?= ucfirst($listeobjet["description"]);?></p>
                        </div>
                    </div>
                </div>
                <?php }
            ?>
        </div>