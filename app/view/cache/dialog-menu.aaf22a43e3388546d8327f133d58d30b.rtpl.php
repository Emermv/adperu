<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="menu-dialog hide  " id="menu-dialog">
      <?php require $this->checkTemplate("template/logo");?>
      <div class="md-layout">
            <div class="md-layout md-flex-5 md-flex-small-15 md-flex-medium-15 primary md-align-center">
                  <a cursor="pointer" class="menu-button dark-text bold" onclick="toogle_dialog()"><i
                              class="material-icons ">close</i></a>
            </div>
            <div class="md-layout md-flex-95 md-flex-small-85 md-flex-medium-85 md-vertical-align-center"
                  style="height: 100vh;">
                  <div class="md-layout md-flex-100">
                        <div class="md-layout md-flex-100">
                              <a href="about_us"><span class="dark-text rc-font  menu-item">nosotros</span></a>
                        </div>
                        <div class="md-layout md-flex-100">
                              <a href="service"> <span class="dark-text rc-font  menu-item">servicios</span></a>
                        </div>
                        <div class="md-layout md-flex-100">
                              <a href="contact"><span class="dark-text rc-font  menu-item">contacto</span></a>
                        </div>

                        <div class="md-layout md-flex-15 md-flex-small-100 md-align-center md-align-small-start">
                              <a  href="<?php echo $RS["FACEBOOK"]; ?>" target="_blank">
                              <span class="rc-font dark-text" style="font-size:2rem;">facebook</span></a>

                        </div>
                        <div class="md-layout md-flex-15 md-flex-small-100 md-align-center md-align-small-start">
                                    <a  href="<?php echo $RS["INSTAGRAM"]; ?>" target="_blank">
                              <span class="rc-font dark-text" style="font-size:2rem;">instagram</span>
                              </a>
                        </div>
                        <div class="md-layout md-flex-15 md-flex-small-100 md-align-center md-align-small-start">
                                    <a href="{$RS.LINKEDIN" target="_blank" >
                              <span class="rc-font dark-text" style="font-size:2rem;">linkedin</span>
                        </a>
                        </div>
                    


                  </div>
            </div>
      </div>
      <div class="contact-text-container">
           <span style="font-size: 1.5rem;"> Jr Monterrey 389,<br> Chacarilla del Estanque,<br> Surco-Lima, Perú.<br><br></span>
           <span style="font-size: 1.5rem;" class="bold">+51 13720253<br></span>
            <span style="font-size: 1.5rem;" class="bold">+51 12670507</span>
      </div>
      <?php require $this->checkTemplate("template/footer");?>
</div>