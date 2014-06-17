<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_image_model extends CI_Model{
    private $__table = 'menu_image';
    
    
    public function get_all_image($menu_id){
	$this->db->where('menu_id',$menu_id);
	return $this->db->get($this->__table);
    }


    
}