<div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h1>Proposition</h1>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
            //echo count($mespropositionsavecnom);
                $idechange = "";
                for($i = 0; $i<count($mespropositionsavecnom); $i++) {
                $idechange = $mespropositionsavecnom[$i]["idechange"];
            ?>
                <div class="col">
                    <div class="card">
                        <!-- <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"> -->
                        <div class="card-body p-4">
                            <p class="text-info card-text mb-0" id="title">Article</p>
                            <p class="card-text">Mon <span><?= $mespropositionsavecnom[$i]['objetorigine']; ?></span> à échanger avec <span><?= $mespropositionsavecnom[$i]['objetcible']; ?></span></p>
                            <div class="d-flex justify-content-arround">
                                <div class="col-6">
                                    <p class="fw-bold mb-0"><?= ucfirst($mespropositionsavecnom[$i]['proprinouveau']); ?></p>
                                    <!-- <p class="text-muted mb-0">Erat netus</p> -->
                                </div>
                                <div class="col-6">
                                    <a href="<?php echo site_url("controlleur_user/annuler_proposition?idechange=$idechange"); ?>" class="btn" id="discard">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>        
            
</div>

<div class="container py-4 py-xl-5">
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h1>Proposition de l'extérieur</h1>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <?php 
            $idechange = "";  
            for ($i = 0; $i <count($autrespropositionsavecnom); $i++) {
            $idechange = $autrespropositionsavecnom[$i]['idechange'];
            ?>             
            <div class="col">
                <div class="card">
                    <!-- <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"> -->
                    <div class="card-body p-4">
                        <p class="text-info card-text mb-0" id="title">Article</p>
                        <p class="card-text">Mon <span><?= $autrespropositionsavecnom[$i]['objetcible']; ?></span> à échanger avec <span><?= $autrespropositionsavecnom[$i]['objetorigine']; ?></span></p>
                        <div class="d-flex justify-content-arround">
                            <div class="col-6">
                                <p class="fw-bold mb-0"><?= $autrespropositionsavecnom[$i]['proprioorigine']; ?></p>
                                <!-- <p class="text-muted mb-0">Erat netus</p> -->
                            </div>
                            <div class="col-6">
                                <a href="<?php echo site_url("controlleur_user/accepter_proposition?idechange=$idechange");?>" class="btn btn-link">Accepter</a>
                                <a href="<?php echo site_url("controlleur_user/rejeter_proposition?idechange=$idechange");?>" class="btn" id="discard">Rejeter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
            ?>   
        </div>
    </div>