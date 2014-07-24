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
//$data['client_id'] = $this->session->userdata('client_id');
    $this->load->view('template',$data);
  }

  public function _callback_image_url($value,$row){
//return '<a target="_blank" class="button mini" href="'.site_url('image/all/'.$row->menu_id).'">View Images</a>';
    return '<a  class="button mini" click="openMe()">View Images</a>';
  }




//@class ends
}