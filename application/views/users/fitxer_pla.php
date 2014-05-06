<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">


		<div class="clearfix">
			<div class="grid_12">
				<h2><?php echo $title;?></h2>
				
				<div class="clear"></div>
			</div>
		</div>

		 <!-- Part central -->
        <div class="content grid_12" id="content">

			<div class="field clearfix">

				<form method="post" action="admin/exporta_fitxer_pla" enctype="multipart/form-data">
					<input name="enviar" type="submit" value="Exportar" />
				</form>

				<div style="height: 500px; overflow: auto;">
				<?php

					echo "<table id='fitxerPla' class='pure-table pure-table-bordered' width=100%><thead><tr>";
					$columnes = $fitxerPla[0];

					foreach(array_keys($columnes) as $NomCol){
						echo "<th>".$NomCol."</th>";
					}
					echo "</tr></thead><tbody>";


				    foreach($fitxerPla as $producte) {

				    	echo "<tr>";

				    	foreach ($producte as $col) {
				    		echo "<td>".$col."</td>";
				    	}
				    	echo "</tr>";
					}
					echo "</tbody></table>";
					?>
				</div>
			</div>
		</div>
	</div>
</div>