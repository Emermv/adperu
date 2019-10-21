<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="fadeInRight animated" >
    <div class="hide-on-med-and-down">
      <?php require $this->checkTemplate("template/logo");?>
    </div>
    <div class="hide-on-med-and-up">
      <?php $logo_style="logo-primary"; ?>
      <?php require $this->checkTemplate("template/logo");?>
    </div>
  <div class="md-layout " auto-height style="overflow-x: hidden;">
  <div class="md-layout md-flex-80 md-flex-small-100 " >
    <div id="slider" class="slider">
      <?php $counter1=-1;  if( isset($images) && ( is_array($images) || $images instanceof Traversable ) && sizeof($images) ) foreach( $images as $key1 => $value1 ){ $counter1++; ?>
       <?php if( isset($value1["is_video"]) && $value1["is_video"] ){ ?>
       <?php if( $counter1==0 ){ ?>
       <div slider-item active video="<?php echo $value1["src"]; ?>" class="fadeInRight"></div>
       <?php }else{ ?>
       <div slider-item video="<?php echo $value1["src"]; ?>"    class="fadeInRight"></div>
       <?php } ?>
       <?php }else{ ?>
       <?php if( $counter1==0 ){ ?>
       <div slider-item active on-desktop="<?php echo $value1["src"]; ?>" on-small="<?php echo $value1["small"]; ?>" class="fadeInRight"></div>
       <?php }else{ ?>
       <div slider-item on-desktop="<?php echo $value1["src"]; ?>" on-small="<?php echo $value1["small"]; ?>"   class="fadeInRight"></div>
       <?php } ?>
       <?php } ?>
      <?php } ?>
      <div class="slider-next">
          <i class="material-icons primary-text " cursor="pointer" onclick="slider.next()">navigate_next</i>
      </div>
      </div>
  </div>
  <div class="md-layout md-flex-20 md-hide-small" style="position: absolute;z-index: 9;top: 0;right: 0;bottom: 0;background: #fff;">
  
  </div>
  </div>
  <div class="hide-on-med-and-down">
      <?php require $this->checkTemplate("template/footer");?>
  </div>
  <div class="hide-on-med-and-up">
      <?php require $this->checkTemplate("template/white-footer");?>
  </div>
  </div>
  