
  
  document.addEventListener('DOMContentLoaded', function() {
    var els=document.querySelectorAll("[auto-height]");
     els.forEach(element=>{
       element.style.height=(window.innerHeight)+"px";
     });
     var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, {});
  });
  function toogleLogo(hide=true){
    document.querySelectorAll(".logo").forEach(el=>{
               if(hide){
                if(!el.classList.contains("hide")){
                  el.classList.add("hide");
                }
               }else{
                 if(el.classList.contains("hide")){
                  el.classList.remove("hide");
                 }
               }
    });
  }
  function toogle_dialog(){
   var  dialog=document.getElementById("menu-dialog");
   if (dialog.classList.contains('hide')){
    dialog.classList.remove('fadeOutLeft');
    dialog.classList.remove('animated');
     dialog.classList.add("fadeInLeft");
     dialog.classList.add("animated");
    dialog.classList.remove('hide');

   }else{
   
    dialog.classList.add('fadeOutLeft');
    dialog.classList.remove("fadeInLeft");
    setTimeout(()=>{
      dialog.classList.add('hide');
    },500);

   }
  }

  class Slider{
     el;
     time=5000;
     active=0;
     isDesktop=(window.innerWidth > 960);
      img_mode=false;
    constructor(el){
      try{
        this.el=document.getElementById(el);
      }catch(err){
      
      }
    }
    empty(el){
      try{
      while (el.firstChild) {
      el.removeChild(el.firstChild);
          
      }
      }catch(err){
      console.warn(err);
        
      }
      }
    isset(el,attr){
     return typeof el.attributes[attr]!="undefined" && el.attributes[attr]!=null;
    }
    getAttr(el,attr){
     if(this.isset(el,attr)){
       return  el.getAttribute(attr);
     }
     return false;
    }
    removeAttr(el,attr){
      if(Object.hasOwnProperty(el.attributes,attr)){
        el.attributes.removeNamedItem(attr);
      }
    }
    setAttr(el,attr,val=true){
     el.setAttribute(attr,val);
    }
    setCss(el,css={}){
      for(var key in css){
        el.style[key]=css[key];
      }
    }
    run(){
    if(this.el){
      this.items=this.el.querySelectorAll("[slider-item]");
      this.built();
      this.play();
 window.onresize= (e) => {
    if (window.innerWidth <= 960) {
      if (!this.isDesktop) return;
      this.isDesktop = false;
      this.built();
    } else {
      if (this.isDesktop) return;
      this.isDesktop = true;
       this.built();
    }
  };
    }
    }
    addClass(el,_class){
      el.classList.add(_class);
    }
    removeClass(el,_class){
      el.classList.remove(_class);
    }
built(){
  var i=0;
  this.items.forEach(item=>{
    item.onmouseover=(e)=>{
       this.pause();
    };
    item.onmouseout=(e)=>{
        this.play(true);
    };
    if(this.isset(item,'video')){
      var video=document.createElement("video");
      var source=document.createElement("source");
      this.setAttr(video,"height",window.innerHeight);
      this.setAttr(video,'width','100%');
      this.setAttr(video,'controls',true);
      this.setAttr(source,'src',this.getAttr(item,'video'));
      this.setAttr(source,'type',"video/mp4");
      video.appendChild(source);
      this.empty(item);
      item.appendChild(video);
    }else{
      if(window.innerWidth>960){
        this.setCss(item,{'background-image':'url('+this.getAttr(item,"on-desktop")+')'});
      }else{
        this.setCss(item,{'background-image':'url('+this.getAttr(item,"on-small")+')'});
      }
    }
   if(!this.isset(item,"active")){
    this.setCss(item,{display:"none"});
   }else{
     this.active=i;
   }
  });
}
pause(){
clearInterval(this.interval);

}
play(handle_next=false){
  if(handle_next){
    setTimeout(()=>{
      this.next();
    },1000);
  }
  this.interval=setInterval(()=>{
    this.next();
     },this.time);
}
    next(){
     // console.log("hide",this.active);
      this.setCss(this.items[this.active],{display:"none"});
      this.removeAttr(this.items[this.active],"active");
      this.removeClass(this.items[this.active],"animated");
      this.active++;
     
       if(this.active<this.items.length){
        // console.log("show",this.active);
        this.setAttr(this.items[this.active],"active");
        this.setCss(this.items[this.active],{display:"block"});
        this.addClass(this.items[this.active],"animated");
            this.autoplayVideo(this.active);

       }else{
        this.active=0;
           //console.log("show first",this.active);
  
         this.setAttr(this.items[this.active],"active");
         this.setCss(this.items[this.active],{display:"block"});
         this.addClass(this.items[this.active],"animated");
         this.autoplayVideo(this.active);
       
       }

    }
    autoplayVideo(active){
      if(this.isset(this.items[active],'video')){
        var video=this.items[active].querySelector("video");
        video.play();
      }
    }
  }

  var slider=new Slider("slider");
  slider.run();

  function  send_contact(form,event){
   event.preventDefault();
   const formSerialize = formElement => {
    const values = new FormData();
    const inputs = formElement.elements;
  
    for (let i = 0; i < inputs.length; i++) {
     if(inputs[i].name!=""){
      values.append(inputs[i].name,inputs[i].value);
     }
    }
    return values;
  }
  
  
  var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      try{
        var data=JSON.parse(xhttp.responseText);
        console.log(data)
        if(data){
          var message=document.getElementById("responseText");
          if(data.state){
            message.classList.add("alert-info");
          }else{
            message.classList.add("alert-danger");
          }
           
           message.innerHTML="<strong>"+data.message+"</strong>";
        }

      }catch(err){console.error(err)}
    }
};
xhttp.open("POST",'send_mail', true);
xhttp.send(formSerialize(form));
  
  }