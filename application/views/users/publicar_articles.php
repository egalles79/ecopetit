<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
	<div class="container">

		<form name = "frmArticles" method="post" action="admin" class="pure-form pure-form-stacked">
			<fieldset>
		        <legend>Filtre</legend>
		        <div class="pure-g-r">
		        	<div class="pure-u-1-3">
		                <label>Codi de barres:</label>
		                <input type="text" name="codiBarres" id="codiBarres">
		            </div>
		            <div class="pure-u-1-3">
		                <label>Articles publicats:</label>
		                <select name="publicat" id="publicat">
							<option value="">-- Tots --</option>
							<option value="S">Si</option>
							<option value="N">No</option>
						</select>
		            </div>
					<div class="pure-u-1-3">
						<label>Grup producte:</label>
						<select name="idGrup" id="idGrup">
							<option value='-1'>-- Tots --</option>
							<?php
						    foreach($grupsProd as $grups) {
						    	echo "<option value='".$grups['idGrup']."'>".$grups['NomGrup']."</option>";
						    }
							?>
						</select>
					</div>
					<div class="pure-u-1-3">
						<label>Marca:</label>
						<select name="idMarca" id="idMarca">
							<option value='-1'>-- Tots --</option>
							<?php
						    foreach($llistaMarques as $marques) {
						    	echo "<option value='".$marques['idMarca']."'>".$marques['NomMarca']."</option>";
						    }
							?>
						</select>
					</div>
					<div class="pure-u-1-3">
						<label>Model:</label>
						<input type="text" name="model" id="model" maxlenght=60>
					</div>
				</div>
				<button type="submit" class="pure-button pure-button-primary">Submit</button>
			</fieldset>
		</div>
		</form>

		<table class="pure-table pure-table-bordered">
		<thead>
		    <tr>
		    <th>Article</th>
		    <th align="center">Publicat</th>
		    <th></th>
		    
		</tr></thead>
		<tbody>
			<?php
			$num=0;

		    foreach($result as $productes) {
		    	
		    	if ($num == 1) {
		    		$num = 0;
		    		echo "<tr class='pure-table-odd'>";
		    	} else {
		    		echo "<tr>";
		    		$num = 1;
		    	}
				

			?>

		    
		        <td class="articles"><?php echo $productes['categoria'].' '.$productes['marca'].' '.$productes['model'];?></td>
		        <td align="center">
					<?php 
					if ($productes['publicat'] =="S") 
						echo "<i class='fa fa-check'></i>";
					else
						echo "<i class='fa fa-times'></i>";
					?></td>
		         <td>
		         <?php 
		         //$link = site_url('Article.php?idArticle='.$productes['idArticle']);
		         $link = base_url().'Article.php?idArticle='.$productes['idArticle'];
		         echo "<a class='various' data-fancybox-type='iframe' href='".$link."' >";

					echo "<i class='fa fa-edit'></i></a>";
				?>
		         </td>
		        
		    </tr>
		   
		   <?php
			}
			?>
		   
		</tbody>
		</table>
	</div>
</div>