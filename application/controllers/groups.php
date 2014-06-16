<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

    public function __construct(){  
      parent::__construct();	
      if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	  redirect('auth', 'refresh');
      }	
      $this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
      redirect('groups/all');
    }
    
    public function all(){
      $crud = new grocery_CRUD();

      //$crud->set_theme('twitter-bootstrap');
      $crud->set_table('groups');	
      $crud->set_subject('Groups')
	   ->required_fields('name','description');
      $data['gcrud'] = $crud->render();
      $data['main']='home';
      //$data['navigation']='navigation';
      $data['content'] = 'groups/list_all';
      $this->load->view('template',$data);
    }
    

//@class ends
}