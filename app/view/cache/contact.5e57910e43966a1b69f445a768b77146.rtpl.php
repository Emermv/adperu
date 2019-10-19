<?php if(!class_exists('Rain\Tpl')){exit;}?><?php require $this->checkTemplate("template/logo");?>
<div class="md-layout md-vertical-align-center fadeInRight animated" style="height: 100vh;">
       
      
                <div class="row contact-form ">
                        <form class="col s12 m8 l8 ">
                                <div class="card z-depth-0 " >
                          <div class="row">
                            <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">account_circle</i>
                              <input  id="name" type="text" class="validate" onfocus="toogleLogo()">
                              <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">account_circle</i>
                              <input id="last_name" type="text" class="validate"  onfocus="toogleLogo()">
                              <label for="last_name">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">phone</i>
                                <input id="phone" type="tel" class="validate"  onfocus="toogleLogo()">
                                <label for="phone">Teléfono</label>
                              </div>
                            <div class="input-field col s12 m6 l6">
                                    <i class="material-icons prefix">email</i>
                                <input id="email" type="email" class="validate"  onfocus="toogleLogo()">
                                <label for="email">Correo</label>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                    <i class="material-icons prefix">comment</i>
                                    <textarea id="message" class="materialize-textarea"  onfocus="toogleLogo()"></textarea>
                                    <label for="message">Mensaje</label>
                                 </div>
                                 <div class="col s12 m12 l12 ">
                                        <button class="btn waves-effect waves-light right primary z-depth-0 bold"  type="submit" name="action">ENVIAR
                                                <i class="material-icons right">send</i>
                                         </button>
                                 </div>
                    
                          </div>
                    
                        </form>
                        </div>
                      </div>
                  
                    
 <?php require $this->checkTemplate("template/footer");?>
                    
     
                 
       
</div>