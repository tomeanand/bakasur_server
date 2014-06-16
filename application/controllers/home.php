<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	var $menu_name ='';
	var $menu_servefor ='';
	var $menu_price ='';
	var $menu_category ='';
	var $menu_cuisine ='';
	var $menu_image ='';
	var $menu_description ='';
	var $category ='';
	var $menuid ='';
	var $result ='';
	var $menu ="";
	var $menulist = "";
	var $cuisine ="";
	var $reservationid ="";
	var $subcategoryid ="";
	var $cuisineid ="";
	function  __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('controllerlist');
		
	}	

	public function index()
	{
		
		$functn['home'] ='';
		$functn = $this->controllerlist->getControllers();
		$data["func"] = $functn['home'];
		$result = $this->db->query("SELECT category_id,category_name FROM categorylist");
		$data["category"] = $result;
		$result = $this->db->query("SELECT * FROM cuisine");
		$data["cuisine"] = $result;
		//subcategory list
		$result = $this->db->query("SELECT subcategory_id,subcategory_name FROM subcategorylist");
		$data["subcategory"] = $result;
		$this->load->view('testing',$data);

	}
	
	public function addmenu() //pg-12 of pdf
	{	
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		 $result = $this->db->query("SELECT category_id,category_name FROM categorylist");
		 $data["category"] = $result;
		 //subcategory list
		$result = $this->db->query("SELECT subcategory_id,subcategory_name FROM subcategorylist");
		$data["subcategory"] = $result;
		$result = $this->db->query("SELECT * FROM cuisine");
		$data["cuisine"] = $result;

		 if(!empty($_POST) && isset($_POST)){
		  if (!$this->upload->do_upload('menu_image')) {
					$error = array('error' => $this->upload->display_errors());					
					$this->load->view('testing', $error);
				}
				else {
					$uploadObj = array('upload_data' => $this->upload->data());
					$imagename = $uploadObj["upload_data"]['file_name'];
					// $updatedTime =  date('Y-m-d h:i:s');
					$postData = $_POST;

					// print_r($postData);
					if(empty ($postData)) {return false;}

        			 // $this->menu_name = isset($postData['menu_name'])?$postData['menu_name']:'';
        			 // $this->menu_servefor = isset($postData['menuservefor'])?$postData['menuservefor']:'';
        			 // $this->menu_price = isset($postData['menuprice'])?$postData['menuprice']:'';
        			 // $this->menu_category = isset($postData['menucategory'])?$postData['menucategory']:'';
        			 // $this->menu_image = isset($imagename)?$imagename:'';
        			 // $this->menu_description = isset($postData['menu_description'])?$postData['menu_description']:'';
        			 // $this->menu_timestamp = isset($updatedTime)?$updatedTime:'';
					$menu=array(
						'menu_name'=>$this->input->post('menu_name'),
						'menu_servefor'=>$this->input->post('menu_servefor'),
						'menu_price'=>$this->input->post('menu_price'),
						'menu_category'=>$this->input->post('menu_category'),
						'menu_cuisine'=>$this->input->post('menu_cuisine'),
						'menu_subcategory'=>$this->input->post('menu_subcategory'),
						'menu_image'=>$imagename,
						'menu_description'=>$this->input->post('menu_description')
						);
						$data['status'] = $this->db->insert('menulist',$menu);
						redirect('/home');

					}
				}
					// $this->load->view('testing',$data);		
	}
public function addcuisine() //pg-12 of pdf
	{	
		if(!empty($_POST) && isset($_POST)){
		  		
		  	$postData = $_POST;

				if(empty ($postData)) {
						return false;
				}

        			 $cuisine=array(
						'cuisine_name'=>$this->input->post('cuisine_name')
									);
						$data['status'] = $this->db->insert('cuisine',$cuisine);
						redirect('/home');

		}
					// $this->load->view('testing',$data);		
	}
	public function addsubcategory() //pg-12 of pdf
	{	
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->load->library('upload', $config);

		 if(!empty($_POST) && isset($_POST)){
		  if (!$this->upload->do_upload('subcategory_image')) {
					$error = array('error' => $this->upload->display_errors());					
					$this->load->view('testing', $error);
				}
				else {
					$uploadObj = array('upload_data' => $this->upload->data());
					$imagename = $uploadObj["upload_data"]['file_name'];
					// $updatedTime =  date('Y-m-d h:i:s');
					$postData = $_POST;

					if(empty ($postData)) {return false;}

					$subcategory=array(
						'subcategory_name'=>$this->input->post('subcategory_name'),
						'subcategory_image'=>$imagename						
						);
						$data['status'] = $this->db->insert('subcategorylist',$subcategory);
						redirect('/home');

					}
				}
					// $this->load->view('testing',$data);		
	}
	public function test1()	
	{
		$this->load->view('test1');	
	}



	public function show_menulist() //pg-11
	{
		
		
			$result = $this->db->query("SELECT * FROM menulist order by menu_name ASC");
			$menu = $result->result_array();
			header('Content-type: text/json');
			header('Content-type: application/json');
			header('Access-Control-Allow-Origin: *');
			print_r( json_encode($menu));
		
		
	}
	public function show_menudetail() //pg-13
	{
		
		
		if(!empty( $_GET['param1']) && isset($_GET['param1'])){
			$result = $this->db->query("SELECT * FROM menulist WHERE menu_id='".$_GET['param1']."'");
			$menu = $result->result_array();
			header('Content-type: text/json');
			header('Content-type: application/json');
			print_r( json_encode($menu));
		}
		else 	{
			print_r('{result:fault}');
		}
		
	}
	public function show_cuisinedetail() //pg-13
	{
		
		$this->cuisineid  = $_POST['param1'];
		$result = $this->db->query("SELECT * FROM cuisine WHERE cuisine_id='$this->cuisineid'");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}
	public function show_subcategorydetail() //pg-13
	{
		
		$this->subcategoryid  = $_POST['param1'];
		$result = $this->db->query("SELECT * FROM subcategorylist WHERE subcategory_id='$this->subcategoryid'");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}
	public function show_menu_subcategory() //pg-13
	{
		
		$result = $this->db->query("SELECT * FROM subcategorylist");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}
	public function show_menu_cuisine() //pg-13
	{
		
		$result = $this->db->query("SELECT * FROM cuisine");
		$cuisine = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($cuisine));
		
	}
	public function show_menu($subcategory_id) //pg-3
	{
		
		// $this->category = $_POST['subcategory_id'];
		$result = $this->db->query("SELECT menu_name,menu_id,menu_price,menu_image FROM menulist WHERE menu_subcategory ='$subcategory_id'");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
	}

	public function expampleCall()	{
		echo "hello there";
	}

	public function show_menulist_ByCat() //pg-11
	{
		//$this->menu_category  = $_POST['param1'];
		$result = $this->db->query("SELECT * FROM menulist  order by menu_name ASC");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}
	public function show_reservationlist() //pg-11
	{
		

		$result = $this->db->query("SELECT * FROM reservationlist order by timestamp ASC");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}
	public function show_cuisinelist() //pg-11
	{
		

		$result = $this->db->query("SELECT * FROM cuisine");
		$menu = $result->result_array();
		header('Content-type: text/json');
		header('Content-type: application/json');
		print_r( json_encode($menu));
		
	}

	public function deletereservation()  {
		$this->reservationid  = $_POST['param1'];
          $this->db->where('reservation_id', $this->reservationid);
          $this->db->delete('reservationlist'); 
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */