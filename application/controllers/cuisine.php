<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cuisine extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	    redirect('auth', 'refresh');
	}	
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){	
	redirect('cuisine/all');
    }
    
    public function all(){
	$crud = new grocery_CRUD();

	//$crud->set_theme('twitter-bootstrap');
	$crud->set_table('cuisine');	
	$crud->set_subject('Cuisine')
	     ->required_fields('cuisine_name');
	$data['gcrud'] = $crud->render();
	$data['main']='home';
	$data['client_id'] = $this->session->userdata('client_id');
	//$data['navigation']='navigation';
	//$data['content'] = 'cuisine/list_all';
	$this->load->view('template',$data);
    }
    

//@class ends
}