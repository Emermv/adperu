
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
     interval=5000;
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
   setInterval(()=>{
  this.next();
   },this.interval);
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
    if(this.img_mode){
      var img=document.createElement("img");
      if(window.innerWidth>960){
        this.setAttr(img,"src",this.getAttr(item,"on-desktop"));
      }else{
        this.setAttr(img,"src",this.getAttr(item,"on-small"));
      }
      this.empty(item);
      item.appendChild(img);
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
       }else{
        this.active=0;
           //console.log("show first",this.active);
  
         this.setAttr(this.items[this.active],"active");
         this.setCss(this.items[this.active],{display:"block"});
         this.addClass(this.items[this.active],"animated");
       }



    }
  }

  var slider=new Slider("slider");
  slider.run();