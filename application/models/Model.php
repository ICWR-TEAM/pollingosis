<?php
/**
 *
 */
class Model extends CI_Model
{
  function rules(){
    return [
      ['field'=>"judul",
       'rules'=>"required"
      ]
      //  ['field'=>"judul",
      //   'rules'=>"judul"
      // ],
      // ['field'=>"judul",
      //  'rules'=>"judul"
      // ]
    ];
  }
  function tampil()
  {
    return $this->db->get("cobak");
  }
  function getid($id){
    return $this->db->get_where("cobak",$id)->row();
  }
  function input($db,$data){
    $this->db->insert($db,$data);
  }
}

 ?>
