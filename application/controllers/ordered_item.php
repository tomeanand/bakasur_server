<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ordered_item extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('image_CRUD');
    }
    
    
    public function index(){	
	     redirect('ordered_item/all');
    }
    
    public function all(){

      $order_id = $this->uri->segment(3, 0);
      $this->load->model('order_model','omodel');
      $order_query = $this->omodel->get_order_by_id($order_id);

       if($order_query->num_rows() > 0)  {
            $items = $order_query->result();
            $data['ordered_item'] = json_decode($items[0]->order_item);
            $this->load->view('orders/orders_items',$data);
        }


    }
 


//@class ends
}