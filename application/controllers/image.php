<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('image_CRUD');
    }
    
    
    public function index(){	
	redirect('menu_list/all');
    }
    
    public function all(){
      $image_crud = new image_CRUD();		
      $image_crud->set_primary_key_field('menu_image_id');
      $image_crud->set_url_field('image_name');
      $image_crud->set_table('menu_image')
	->set_ordering_field('priority')
	->set_image_path('assets/uploads');


      $image_crud = new image_CRUD();
	
      $image_crud->set_primary_key_field('menu_image_id');
      $image_crud->set_url_field('image_name');
      $image_crud->set_table('menu_image')
      ->set_relation_field('menu_id')
      ->set_ordering_field('priority')
      ->set_image_path('assets/uploads');
      $data['gcrud'] = $image_crud->render();
      $data['main']='home';
      //$data['navigation']='navigation';
      $data['content'] = 'image/list_all';
      $this->load->view('template',$data);
    }
 


//@class ends
}