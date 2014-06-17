<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_list extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
	redirect('menu_list/all');
    }
    
    public function all(){
      //$this->output->enable_profiler(true);
      $crud = new grocery_CRUD();
      //$crud->set_theme('twitter-bootstrap');	
      $client_id = $this->session->userdata('client_id');	
      if(($crud->getState() == 'ajax_list')){
	 $crud->where('menulist.client_id',$client_id);
      }
      $crud->set_table('menulist');	
      
      $crud->set_subject('Menu');
      $crud->callback_column('menu_image',array($this,'_callback_image_url'));
      $crud->set_relation('menu_category','categorylist','category_name');   
      $crud->set_relation('menu_cuisine','cuisine','cuisine_name');
      $crud->set_relation('menu_subcategory','subcategorylist','subcategory_name');      
      
      $crud->display_as('menu_category','Type');
      $crud->display_as('menu_cuisine','Cuisine');
      $crud->display_as('menu_subcategory','Category');
      $crud->display_as('menu_price','Price');
      $crud->display_as('menu_name','Name');
      $crud->display_as('menu_servefor','Best for');
      $crud->display_as('menu_image','Image');
      $crud->display_as('menu_description','Description');
      
      $crud->required_fields('menu_name','menu_servefor','menu_cuisine','menu_subcategory','menu_category','menu_price')
	   ->field_type('menu_description','text');

      $crud->unset_texteditor('menu_description','full_text');


      if(($crud->getState() == 'list') ){
	 $crud->where('client_id',$client_id);
      }


      $crud->field_type('menu_image','hidden');
      $crud->field_type('client_id','hidden',$client_id);
      
      $crud->columns('menu_name','menu_servefor','menu_cuisine','menu_subcategory','menu_category','menu_price','menu_image');
    
      $data['gcrud'] = $crud->render();
      $data['main']='home';
      //$data['navigation']='navigation';
      $data['content'] = 'menu_list/list_all';
      $this->load->view('template',$data);
    }
    
  public function _callback_image_url($value,$row){
    return '<a target="_blank" class="btn minis danger" href="'.site_url('image/all/'.$row->menu_id).'">View Images</a>';
  }


  public function get_all_menu_list(){

    $this->load->model('menu_list_model');
    $this->load->model('menu_image_model');
    $menu_query = $this->menu_list_model->get_all_menu();
    if($menu_query->num_rows() > 0)  {
      foreach($menu_query->result() as $menu_row){ 
        $menu_id = $menu_row->menu_id;
        $image_query = $this->menu_image_model->get_all_image($menu_id);
        $image_array = array();
        if($image_query->num_rows > 0)  {
            foreach($image_query->result() as $image_row) {
                array_push($image_array,$image_row->image_name);
            }
        }

        $menu_list = (count($image_array) > 0 ?  implode(',',$image_array) : $menu_row->menu_image);
        $menu_result[] = array("menu_id" => $menu_id,
           "menu_name" => $menu_row->menu_name,
           "menu_image" => $menu_list,
           "menu_category" => $menu_row->menu_category,
           "menu_cuisine" => $menu_row->menu_cuisine,
           "menu_subcategory" => $menu_row->menu_subcategory,
           "menu_description" => $menu_row->menu_description,
           "menu_servefor" => $menu_row->menu_servefor,
           "menu_price" => $menu_row->menu_price,

           );
      }
      echo json_encode($menu_result);

    }
  }  


//@class ends
}