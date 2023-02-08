<div class="container py-4 py-xl-5">
    <form action="<?= site_url("controlleur_user/vers_stat_nb_utilisateur");?>" method="post">
        <input name="annee" type="number" placeholder="Année" value="2023" class="form-control me-auto">
        <input name="moisdebut" type="number" placeholder="Mois début" value="2" class="form-control me-auto">
        <input name="moisfin" type="number" placeholder="Mois fin" value="5" class="form-control me-auto">
        <button type="submit" class="btn">Rechercher</button>
    </form>
</div>

<script  defer>
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title:{
			text: "Suivi utilisateur"
		},
		axisY: {
			title: "Nombre utilisateur"
		},
		axisX: {
			title: "Mois"
		},
		data: [{        
			type: "column",  
			showInLegend: true, 
			legendMarkerColor: "grey",
			//legendText: "MMbbl = one million barrels",
			dataPoints: [      
				<?php
					for($i = 0; $i<count($donneesstat) - 1;$i++) {
						if($donneesstat[$i][1] == null) {
							$donneesstat[$i][1] = 0;
						}
						?> { y: <?php echo $donneesstat[$i][1]; ?>, label: "<?php echo $donneesstat[$i][0]; ?>" }, <?php
					}
				?>
				{ y: <?php echo $donneesstat[count($donneesstat) - 1][1]; ?>,  label: <?php echo $donneesstat[count($donneesstat) - 1][0]; ?> }
			]
		}]
	});
	chart.render();

}
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src ="<?php echo site_url('assets/js/canvasjs.min.js') ;?>"></script>