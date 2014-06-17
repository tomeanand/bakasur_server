<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class menu_list_model extends CI_Model{
    private $__table = 'menulist';
    
    
    public function get_all_menu(){
		return $this->db->get($this->__table);
    }


}