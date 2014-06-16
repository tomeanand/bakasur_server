<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct(){  
	parent::__construct();	
	if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
	    redirect('auth', 'refresh');
	}
	
	$this->load->model('category_model','c_model');
	$this->load->library('grocery_CRUD');
    }
    
    
    public function index(){
	//redirect('category/view_all');
	redirect('category/list_all');
    }
    
    public function list_all(){
	$crud = new grocery_CRUD();

	//$crud->set_theme('twitter-bootstrap');
	$crud->set_table('categorylist');	
	$crud->set_subject('Category')
	     ->required_fields('category_name');
	$data['gcrud'] = $crud->render();
	$data['main']='home';
	//$data['navigation']='navigation';
	$data['content'] = 'category/list_all';
	$this->load->view('template',$data);
    }

    /**
     * Function to view all categories
     * @see model/category_model.php
     * @see views/category/view_all.php
     * @return html
     **/
    public function view_all(){
	$get_query = $this->c_model->get_all();
	if($get_query->num_rows() > 0){
	    foreach($get_query->result() as $result){
		$category[$result->category_id] = array("category_id" => $result->category_id,
							 "category_name" => $result->category_name
							 );
	    }
	}	
	$data['category_list'] = $category;
	$this->load->view('category/view_all',$data);
    }
    
    
    /**
     * Function to display category creating form
     * @see views/category/create_category_form.php
     * @return html
     **/
    public function create_category(){
	$data['message'] = (validation_errors() ? validation_errors():$this->session->flashdata('message'));
	$data['title'] = 'Create Category';
	$this->load->view('category/create_category_form',$data);
    }
    
    
    
    /**
     * Function to save the category
     * @see model/category_model.php
     * @see views/category/view_all.php
     * @return INTEGER
    **/
    public function save_category(){
	$config = array(
    			array(
    					'field'   => 'category_name',
    					'label'   => 'Category Name',
    					'rules'   => 'required|xss_clean|trim'
    			)
    		);
    	$this->form_validation->set_error_delimiters('<div class="message alert alert-error">','</div>');
    	$this->form_validation->set_rules($config);
    	if ($this->form_validation->run() == TRUE){
	    $category_array = array('category_name' => $this->input->post('category_name'));
	    $this->c_model->save_category($category_array);
	    $this->session->set_flashdata('message', 'Category Added');
	    redirect('category/create_category');
    	}else{
	    $this->session->set_flashdata('message', validation_errors());
	    redirect('category/create_category');
    	}
    }
    
    
    
    /**
     * Function to delete category
     * @see model/category_model.php
     * @retun html
    /**
    public function delete_category(){
	$category_id = $this->uri->segment(3);
	$this->c_model->delete_category($category_id);
	redirect('category');
    }
    
    /**
     * Function to display the update form
     * @see model/category_model.php
     * @return html
    **/
    public function edit_category(){
	$category_id = $this->uri->segment(3);
	$get_query = $this->c_model->get_category_detail($category_id);
	if($get_query->num_rows() > 0){
	    foreach($get_query->result() as $result){
		$category_id = $result->category_id;
		$category_name =  $result->category_name;
	    }
	}	
	$data['message'] = (validation_errors() ? validation_errors():$this->session->flashdata('message'));
	$data['category'] = array(
		'name'  => 'category_name',
		'id'    => 'category_name',
		'type'  => 'text',
		'value' => $this->form_validation->set_value('first_name',$category_name),
		);
	$data['categoryid'] = array(
		'name'  => 'category_id',		
		'type'  => 'hidden',
		'value' => $category_id
		);	
	$this->load->view('category/edit_category_form',$data);	
    }
    
    
    /**
     * Function to update the category
     * @see model/category_model.php
     * @return html
    **/
    public function update_category(){
	$config = array(
    			array(
    					'field'   => 'category_name',
    					'label'   => 'Category Name',
    					'rules'   => 'required|xss_clean|trim'
    			),
    			array(
    					'field'   => 'category_id',
    					'label'   => 'Category Id',
    					'rules'   => 'required|xss_clean|trim'
    			)
    		);
    	$this->form_validation->set_error_delimiters('<div class="message alert alert-error">','</div>');
    	$this->form_validation->set_rules($config);
    	if ($this->form_validation->run() == TRUE){
	    $category_array = array('category_name' => $this->input->post('category_name'));
	    $this->c_model->update_category($this->input->post('category_id'),$category_array);
	    redirect('category');
    	}else{
	    $this->session->set_flashdata('message', validation_errors());
	    redirect('category/edit_category/'.$this->input->post('category_id'));

    	}
    }

//@class ends
}