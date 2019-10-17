<?php if(!class_exists('Rain\Tpl')){exit;}?><?php if( isset($logo_style) ){ ?>
<a href="./" class="text-decoration-none "><img src="app/assets/img/<?php echo $logo_style; ?>.png" alt="Logo"
    class="logo"></a>
    <?php }else{ ?>
    <a href="./" class="text-decoration-none "><img src="app/assets/img/logo.png" alt="Logo"
        class="logo"></a>
    <?php } ?>