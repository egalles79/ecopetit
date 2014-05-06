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


				
				<?php


$idioma = $this->lang->lang();  
                

					if (!empty($result)) {
						
						echo "<table id='llistaRegistres' class='pure-table pure-table-bordered' width=100%><thead><tr>";
						
						echo "<th>Identificador</th>";
						echo "<th>Títol</th>";
						echo "<th>Contingut</th>";
						echo "<th>Tipus</th>";
						echo "<th>Data</th>";
						echo "<th></th>";
						echo "<th></th>";
					

						echo "</tr></thead><tbody>";


					    foreach($result as $entrada) {

					    	echo "<tr>";

					    	foreach ($entrada as $col) {
					    		echo "<td>".$col."</td>";
					    	}
					    	$url = base_url().$idioma.'/admin/entrada/'.$entrada["id"];
					    	echo "<td><a href='".$url."' ><i class='fa fa-eye'></i></a></td>";
					    	echo "</tr>";
						}
						echo "</tbody></table>";
					}


					$url = base_url().$idioma.'/admin/novaEntrada';
					?>
				

				<h4>Nova entrada al blog:</h4>
				<form method="post" enctype="multipart/form-data" action="<?php echo $url; ?>" name="frmNovaEntrada" id="frmNovaEntrada">
					<div class="field">
                        <label for="name"><strong>Títol</strong> (Obligatori)</label>
                        <input type="text" name="titol" id="titol" maxlength=50>
                    </div>
                    <div class="field">
                        <label for="comments"><strong>
						Contingut</strong></label>
                        <textarea name="comments" id="comments" class="fieldsBlog"></textarea>
                    </div>
                    <div class="field">
						<label for="phone"><strong>Tipus entrada</strong></label><br>

						<input type="radio" name="tipus" id="tipus" value="1" checked>Només text<br>
						<input type="radio" name="tipus" id="tipus" value="2">Text i imatges<br>
						<input type="radio" name="tipus" id="tipus" value="3">Text i video<br>
                    </div>
                    <div class="field">
						<input type="file" name="foto" accept="image/*" />
                    </div>
                    
					<input name="enviar" type="submit" value="Grabar" />
				</form>


			</div>
		</div>
	</div>
</div>