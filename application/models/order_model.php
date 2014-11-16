<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model{
    private $__table = 'cm_orders';
    
    
    public function __construct()
    {
        parent::__construct();
    }

    public function add_order($data){
        $query = $this->db->insert($this->__table, $data);
        $id = $this->db->insert_id(); 
        return $id ;
    }


     public function get_order_by_user($id){
        $this->db->where('order_customer_id',$id);
        return $this->db->get($this->__table);          
     }
         

    
}	