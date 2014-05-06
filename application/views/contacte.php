<!-- BEGIN CONTENT WRAPPER -->
<div id="content-wrapper" class="content-wrapper">
    <div class="container">
        
        <!-- Google Map -->
        <div class="clearfix">
            <div class="grid_12">
                <h2><?=lang('contacte.titol1');?></h2>
                <!-- Google Map Canvas -->
                <div class="map-wrapper">
                    <div id="map_canvas"></div>
                </div>
                <!-- Google Map Canvas / End -->
            </div>
             
        </div>
        <!-- Google Map / End -->
        
        <div class="clearfix">
            <div class="grid_4">
                <!-- Contact Information -->
                
                
                <h2><?=lang('contacte.titol2');?></h2>
                <p><?=lang('contacte.subtitol2');?></p>
                <ul class='contact-info'>
                <li><i class='fa fa-map-marker'></i><?=lang('contacte.adressa')." Ronda Mossèn Jacint Verdaguer, 13  08304 Mataró (Barcelona)";?>
                </li><li>
                <i class='fa fa-phone'></i><?=lang('contacte.telefon')." 937412496 - 628988917";?>
                </li><li>
                <i class='fa fa-envelope'></i><strong>Email: </strong><a href='mailto:info@ecopetit.cat'>info@ecopetit.cat</a>
                </li><li>
                <i class='fa fa-globe'></i><strong>Web: </strong><a href='http://www.ecopetit.cat'>www.ecopetit.cat</a>
                </li><li>
                <i class='fa fa-time'></i><?=lang('contacte.horari');?>
                </li></ul>
                
             
                
                <!-- Contact Information / End -->
            </div>
            <div class="grid_8" id="formulariContacte">
                
                <!-- Contact Form -->
                <h2><?=lang('contacte.titol3');?></h2>

                <?php
                $idioma = $this->lang->lang();  
                $url = base_url().$idioma.'/sendEmail';
                ?>


                <form method="post" action="<?php echo $url;?>" id="contact-form" class="contact-form input-blocks">
                    <div class="clearfix">
                        <div class="grid_3 alpha">
                            <div class="field">
                                <label for="name"><strong><?=lang('contacte.nom');?></strong> (<?=lang('contacte.obligatori');?>)</label>
                                <input type="text" name="name" id="name">
                            </div>
                            <div class="field">
                                <label for="phone"><?=lang('contacte.telefon');?></label>
                                <input type="text" name="phone" id="phone">
                            </div>
                            <div class="field">
                                <label for="email"><strong><?=lang('contacte.email');?></strong> (<?=lang('contacte.obligatori');?>)</label>
                                <input type="email" name="email" id="email">
                            </div>                            
                        </div>
                        <div class="grid_5 omega">
                            <div class="field">
                                <label for="subject"><strong><?=lang('contacte.assumpte');?></strong></label>
                                <input type="text" name="subject" id="subject">
                            </div>
                            <div class="field">
                                <label for="comments"><strong>
								<?=lang('contacte.missatge');?></strong> (<?=lang('contacte.obligatori');?>)</label>
                                <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
                            </div>
                            <div class="button-wrapper">
                                <input type="submit" name="btnEnviar" id="btnEnviar" value="<?=lang('contacte.envia');?>">
                            </div>
                            <div id="response"></div>
                        </div>
                    </div>
                </form>
                <!-- Contact Form / End -->

                <input type="hidden" id='errorName' value = '<?=lang('contacte.errorNom');?>'>
                <input type="hidden" id='errorMail' value = '<?=lang('contacte.errorMail');?>'>
                <input type="hidden" id='errorComments' value = '<?=lang('contacte.errorComentari');?>'>


                
               
            </div>
        </div>
        
    </div>
</div>
    <!-- END CONTENT WRAPPER -->
        
 