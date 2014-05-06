
<?php


$urlUrl = str_replace(",","%2C",stripslashes("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
?>


<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">    
    <div class="container">        
        <!-- Single Person -->
        <div class="clearfix">
            <div class="grid_12 mobile-nomargin">
                <h2><?php echo $title;?></h2>
            </div>
        </div>
        
        <div class="clearfix">
            <div class="grid_6 portfolio-imgs">
                <!-- Person Photos -->
                <div id="slider" class="flexslider flexslider__bordered">							
                    <ul class="slides">
                    
                    <?php
                    $cont = 1;							
                    foreach($arr_fotos as $foto){
                        $imgWeb = 'http://www.ecopetit.cat/images/productes/450x450/'.$foto['idFoto'];
                        
                        
                        if ($cont == 1) {
                            echo "<li style='width: 100%; float: left; margin-right: -100%; position: relative; display: list-item;' class='flex-active-slide'>";
                        }
                        else
                        {
                            echo "<li style='width: 100%; float: left; margin-right: -100%; position: relative;'>";
                        }
                                                           
                        echo "<img src='".$imgWeb."' height='451' width='450' alt='".$article['titol']."' title='".$article['titol']."'></li>";		
                        $cont = $cont + 1;						
                    }							
                    ?>
                    </ul>
                </div>
                <div id="carousel" class="flexslider flexslider__carousel">							
                    <div class="flex-viewport" style="overflow: hidden; position: relative;">
                    <ul class="slides" style="width: 1200%; -webkit-transition: 0s; transition: 0s; -webkit-transform: translate3d(0px, 0, 0);">
                    
                    <?php
                        $cont = 1;							
                        foreach($arr_fotos as $foto){
                            $imgWeb = 'http://www.ecopetit.cat/images/productes/88x88/'.$foto['idFoto'];
                            
                            if ($cont == 1) {
                                echo "<li style='width: 98px; float: left; display: block;' class='flex-active-slide'>";
                            }
                            else {
                                echo "<li style='width: 98px; float: left; display: block;'>";
                            }
                            
                            echo "<img src='".$imgWeb."' height='88' width='88' alt='".$article['titol']."' title='".$article['titol']."'></li>";		
                            $cont = $cont + 1;						
                        }							
                        ?>
                    </ul>
                    </div>
                    <ul class="flex-direction-nav">
                        <li>
                            <a class="flex-prev flex-disabled" href="#">
                            <i class="fa fa-chevron-left"></i>
                            </a>
                        </li>
                        <li>
                            <a class="flex-next" href="#">
                            <i class="fa fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                </div>
                
                <div class="grid_6 portfolio-info">                            
                    <div class="tabs">
                        <div class="tab-menu clearfix">
                            <ul>
                                <li>
                                    <a href="#tab1" class="active"><?=lang('productes.descripcio');?></a>
                                </li>
                                <li>
                                    <a href="#tab2" class=""><?=lang('productes.titol_mes_info');?></a>
                                </li>                                            
                            </ul>
                        </div>
                        <div class="tab-wrapper">
                            <!-- First Tab -->
                            <div id="tab1" class="tab" style="display: block;">
                                <div class="clearfix">
                                    <div class="sencer">
                                    <?php
                                    echo "<p>";
                                    
                                    if ( $article['PreuVendaActual'] != 0 ) {
                                        echo lang('productes.preu_venda_actual');
                                        echo "<strike class='preuAntic'>".$article['PreuVendaActual']."€</strike><br />";
                                        
                                    }
                                    echo  lang('productes.preu_venda_ecopetit');
                                    echo "<span class='preuNou'>".$article['PreuVenda']."€</span></p>";
                                    
                                    if ( $article['PreuVendaActual'] != 0 ) {
                                        $estalvi = ($article['PreuVendaActual'] - $article['PreuVenda']) / $article['PreuVendaActual'];
                                        
                                        $estalvi = round($estalvi * 100,0);
                                        echo "<p class='estalvi'>".lang('productes.estalviat').$estalvi." %</p>";
                                    }
                                    if ($article['outlet'] == "S") {
                                       
                                        echo "&nbsp;&nbsp;";
                                    
                                        echo img(array(
                                            'src' => 'http://www.ecopetit.cat/images/outlet.png', 
                                            'alt' => 'Outlet', 
                                            'title' => 'Outlet'));

                                    }
                                    ?>
                                    <div class="hr hr__smallest"></div>
                                    <p><?php 								
                                    $linies = explode("\n", $article['contingut']);
                                    $str_linea="";
                                    foreach ($linies as $linea)
                                    {
                                        $str_linea .= "<p class='liniesProducte'>".$linea."</p>";
                                    
                                    };
                                    echo stripslashes($str_linea);
                                    
                                    ?></p>
                                    
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_pinterest_share"></a>
<a class="addthis_button_google_plusone_share"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51ffb49f551a431c"></script>
<!-- AddThis Button END -->


                                    
                                    
                                
                                    <?php
                                                                                
                                        /*echo "<div class='fb-comments' data-href='".$urlUrl."' data-width='400'>";
                                        echo "</div>";*/
                                        
                                        /*echo "<div id='fb-root'></div>";
                                        
                                        echo "<script src='http://connect.facebook.net/es_ES/all.js#xfbml=1'></script>";*/
                                        echo "<fb:comments href='".$urlUrl."' num_posts='10' width='400'></fb:comments>";
                                    ?>

                                    
                                    </div>
                                </div>
                            </div>
                            <!-- First Tab / End -->
                            <!-- Second Tab -->
                            <div id="tab2" class="tab" style="display:none;">
                                <div id="formulariContacte" >
                                    <span class="name"><?=lang('productes.vols_mes_info');?></span>

                                    <?php
                                    $idioma = $this->lang->lang();  
                                    $url = base_url().$idioma.'/sendEmail';
                                    ?>


                                
                                    <form method="post" action="<?php echo $url;?>" id="contact-form" class="contact-form input-blocks">
                                        <div class="clearfix">
                                            <div class="grid_5 alpha">
                                                <div class="field">
                                                    <label for="name">
                                                    <?php 
                                                    echo "<strong>".lang('contacte.nom')."</strong> (";
                                                    echo lang('contacte.obligatori').")";
                                                    ?>
                                                    </label>
                                                    <input type="text" name="name" id="name">
                                                </div>
                                                <div class="field">
                                                    <label for="phone"><strong><?=lang('contacte.telefon');?></strong></label>
                                                    <input type="text" name="phone" id="phone">
                                                </div>
                                                <div class="field">
                                                    <label for="email">
                                                    <?php 
                                                        echo "<strong>".lang('contacte.email');
                                                        echo "</strong> (".lang('contacte.obligatori').")";
                                                    ?>
                                                    </label>
                                                    <input type="email" name="email" id="email">
                                                </div>
                                                <div class="field">
                                                    <label for="subject">
                                                    <?php 
                                                    echo "<strong>".lang('contacte.assumpte')."</strong>";
                                                    ?>
                                                    </label>
                                                    
                                                    <?php
                                                    
                                                    $titol_web = stripslashes($article['titol']);
                                                    
                                                    echo "<input type='text' name='subject' id='subject' value='";
                                                    echo lang('productes.assumpte_info').": ".$titol_web."'>";																										
                                                    ?>
                                                </div>
                                                <div class="field">
                                                    <label for="contact-message">
                                                    <?php 
                                                    echo "<strong>".lang('contacte.missatge')."</strong> (";
                                                    echo lang('contacte.obligatori').")";
                                                    ?>
                                                    </label>														
                                                    <textarea name="comments" id="comments" cols="30" rows="10"> <?=lang('productes.mes_info');?>
                                                    </textarea>
                                                </div>
                                                <div class="button-wrapper">
                                                    <?php 
                                                    echo "<input type='submit' name='btnEnviar' id='btnEnviar' value='";
                                                    echo lang('contacte.envia')."'>";
                                                    ?>
                                                </div>
                                                <div id="response"></div>
                                            </div>												
                                        </div>

                                        <input type="hidden" id="urlProducte" name="urlProducte" value ='<?php echo $urlUrl;?>'>
                                    </form>

                                    <input type="hidden" id='errorName' value = '<?=lang('contacte.errorNom');?>'>
                                    <input type="hidden" id='errorMail' value = '<?=lang('contacte.errorMail');?>'>
                                    <input type="hidden" id='errorComments' value = '<?=lang('contacte.errorComentari');?>'>
                                </div>
                            </div>
                        </div>
                        <!-- Second Tab / End -->
                        
                </div>
            </div>						
        </div>
    </div>
                                                                    
</div>



<!-- END WRAPPER -->