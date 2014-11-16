<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

  public function __construct(){  
    parent::__construct();  
    if (!$this->ion_auth->logged_in()){
      redirect('auth', 'refresh');
    }   
    $this->load->library('grocery_CRUD');
  }

  public function index(){  
    redirect('orders/all');
  }

  public function all(){
    $crud = new grocery_CRUD();
    $crud->set_table('cm_orders'); 
 $crud->callback_column('order_item',array($this,'_callback_image_url'));

    $crud->set_subject('Orders List');
    $crud->field_type('order_status','dropdown',
            array('1' => 'Ordered', '2' => 'Delivered', '0' => 'Cancelled' ));

  
    $crud->display_as('order_id','Order id');
    $crud->display_as('order_item','Items');
    $crud->display_as('order_price','Price');
    $crud->display_as('order_date','Ordered date');
    $crud->display_as('order_status','Order Status');

    $crud->field_type('order_item','hidden');
   
    $crud->edit_fields('order_status');

    $crud->columns('order_id','order_price','order_date','order_status','order_item');

   

    $crud->unset_add();
    //$crud->unset_edit();
    //print_r($crud);
    $data['gcrud'] = $crud->render();

    $data['content'] = 'orders/orders_all';  
    $this->load->view('template',$data);
  }

  function just_a_test($primary_key , $row)
{
    return site_url('demo/action/action_photos').'?country='.$row->order_item;
}

  public function _callback_image_url($value,$row){
    return '<a class="button mini icon-basket" alt="'.site_url('ordered_item/all/'.$row->order_id).'"> View Items</a>';
  }



//@class ends
}