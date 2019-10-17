<?php
namespace core\helper;
class Tree{
  private $trees;
  private $childs;
  private $link;
  private $args;
  
  function __construct($args=array(),$link){
    $this->trees=array();
    $this->childs=array();
    $this->args=$args;
    $this->link=$link;

  }



  private function build($root){
     foreach ($this->childs as $key => $children) :
     if($children->parent_id==$root->id):
      $children->children=array();
      array_push($root->children,$children);
      unset($this->childs[$key]);
     endif;
   endforeach;
   if(!empty($root->children)):
    $root->is_tree=true;
     //$root->icon_folder=($root->hide_childs)?'folder_close':'folder_open';
     //$root->icon_toggle=($root->hide_childs)?'add_circle':'remove_circle';
    foreach ($root->children as $key => $children) :
      $this->build($children);
    endforeach;
   endif;

  }
  public function get($callback=null){
    $result=mysqli_query($this->link,$this->args['sql']);
  
    while($row=mysqli_fetch_object($result)):
     
     $row->is_tree=false;
     if(!is_null($callback)):
      $callback($row);
     endif;
             //$row->parsed_name=$this->built_uri($row->Nombre);
     $row->name=urldecode($row->name);
        if($row->parent_id==0){
          $row->children=array();
          $this->trees[]=$row;
         }else{

          $this->childs[]=$row;
         }
  endwhile;
  if(!empty($this->childs)):
      foreach ($this->trees as $key => $tree):
     $this->build($tree);
      endforeach;
      endif;
     return $this->trees;

  }



}


 ?>