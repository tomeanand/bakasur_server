<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

     public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
	redirect('client/all');
    }
    
    public function all(){
      $crud = new grocery_CRUD();
      //$crud->set_theme('twitter-bootstrap');	
      $crud->set_table('clients');	
      $crud->set_subject('Client')
	   ->required_fields('client_name','email','address','phone');
      $data['gcrud'] = $crud->render();
      $data['main']='home';
      //$data['navigation']='navigation';
      $data['content'] = 'menu_list/list_all';
      $this->load->view('template',$data);
    }
 
    

//@class ends
}