<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Proposition d'échange</h2>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col-6">
            <div>
                <img class="rounded img-fluid d-block w-100 fit-cover" style="height: 350px;" src="<?= site_url($objetcible->urlimage);?>">
                <div class="py-4">
                    <h3><?= ucwords($objetcible->titre);?></h3>
                    <p><?= $objetcible->prix;?> £</p>
                    <p><?= ucfirst($objetcible->description);?></p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <form action="<?= site_url("controlleur_user/traitement_proposition_echange");?>" class="text-center mx-auto col-6" method="post">
                <div class="mb-4">
                    <input type="hidden" value="<?=$objetcible->idobjet;?>" name="idobjetcible">
                    <label class="form-label" for="choice">Choisir l'objet d'échange :</label>
                    <select name="idobjetorigine" class="form-select" id="choice" aria-label="Default select example">
                        <?php
                            foreach ($mesobjetsunique as $mesobjet) { ?>
                                <option value="<?=$mesobjet["idobjet"];?>"><?=$mesobjet["titre"];?></option>   
                            <?php }
                        ?>
                    </select>
                </div>
                <div class="mb-3"><button class="btn d-block w-100" type="submit">Appliquer</button></div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date d'échange</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for($i = 0; $i < sizeof($tablehistorique); $i++) {
                            ?>
                            <tr>
                                <td><?= $tablehistorique[$i]['proprioorigine']; ?></td>
                                <td><?= $tablehistorique[$i]['dateechange']; ?></td>

                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>