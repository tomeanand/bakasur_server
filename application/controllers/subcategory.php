<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){
	redirect('subcategory/all');
    }
    
    public function all(){
	$crud = new grocery_CRUD();
	//$crud->set_theme('twitter-bootstrap');
	$crud->set_table('subcategorylist');	
	$crud->set_subject('Sub Category');	
	$crud->set_field_upload('subcategory_image','assets/uploads/')
	     ->required_fields('subcategory_name','subcategory_image');
	$data['gcrud'] = $crud->render();	
	$data['main']='home';
	//$data['navigation']='navigation';
	$data['content'] = 'category/list_all';
	$this->load->view('template',$data);
    }

    
//@class ends
}