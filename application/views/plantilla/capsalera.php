<?php
$idioma = $this->lang->lang();  
?>

<body lang="<?php echo $idioma;?>">
    <!--<script type="text/javascript">  
        nieva()  
    </script> 
-->
    <div id="wrapper">
        <div id="top-bar" class="top-bar">
            <div class="container clearfix">
                <div class="grid_12 mobile-nomargin">
                    <?php
                    //$_SERVER['SCRIPT_URI']
                    
                    $url = base_url().$idioma.'/';
                    
                    if ($logged) {
                        
                        echo "<a href='".$url."auth_public/update_account'>".lang('user.titlePerfil')."</a>";

                        echo " - <a href='".$url."auth/logout'>Logout</a>";
                    }
                    else {
                        echo "<a href='".$url."auth'>".lang('user.inici')."</a>";
                        //echo "<a href='".$url."auth/register'>".lang('user.registre')."</a>";
                
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="main-box">
            <!-- BEGIN HEADER -->
            <header id="header" class="header">
                <div itemscope itemtype="http://schema.org/LocalBusiness" class="container clearfix">
                    <div class="grid_8 mobile-nomargin">
                        <!-- BEGIN LOGO -->
                        <div id="logo" class="logo">
                            <!-- Image based Logo -->
                            <a href="http://www.ecopetit.cat">
                            <?php echo img(array('src' => 'images/logo.png', 'alt' => 'ECOPETIT', 'title' => 'ECOPETIT')); ?>
                            </a>
                            <h1><?=lang('capsalera.titol');?></h1>
                        </div>
                        <!-- END LOGO -->
                    </div>
                            
                    <div class="grid_4 mobile-nomargin">
                        <div class="prefix_1">
                            <!-- Header Info -->
                            <div class="header-info">
                                <!-- Phone Number -->
                                <div class="phone-num">
                                    <?=lang('capsalera.truca');?> <strong><span itemprop="telephone">937412496 - 628988917</span></strong>
                                </div>
                                <!-- Phone Number / End -->                            
                                <!-- Social Links -->
                                <ul class="social-links">
                                    <li class="link-twitter">
                                        <a href="http://www.twitter.com/ecopetit" target="_blank" title="Twitter ECOPETIT">
                                            <i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="link-facebook">
                                        <a href="http://www.facebook.com/ecopetit" target="_blank" title="Facebook ECOPETIT">
                                            <i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="link-instagram">
                                        <a href="http://www.instagram.com/ecopetit" target="_blank" title="Instagram ECOPETIT">
                                            <i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li class="link-google">
                                        <a href="http://google.com/+ECOPETITMataró" target="_blank" title="Google+ ECOPETIT">
                                            <i class="fa fa-google-plus"></i></a></li>

                                    <li class="link-pinterest">
                                        <a href="http://pinterest.com/ecopetit" target="_blank" title="Pinterest ECOPETIT">
                                            <i class="fa fa-pinterest"></i></a>
                                    </li>                        
                                </ul>
                                <div class="idiomes">                                                            
                                    <a href="<?= base_url($this->lang->switch_uri('ca')) ?>" id="IdiomaCatala" title="Web en Català">
                                    <?php
                                    echo img(array('src' => 'images/cat.png', 'alt' => 'Web en Català', 'title' => 'Web en Català'));
                                    ?>
                                    </a>&nbsp;&nbsp;
                                    <a href="<?= base_url($this->lang->switch_uri('es')) ?>" id="IdiomaCastella" title="Web en Castellano">
                                    <?php                            
                                    echo img(array('src' => 'images/esp.png', 'alt' => 'Web en Castellano', 'title' => 'Web en Castellano'));
                                    ?>
                                    </a>
                                </div>
                                <!-- Social Links / End -->
                            </div>
                            <!-- Header Info / End -->
                        </div>
                    </div>
                </div> 