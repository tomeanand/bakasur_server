<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Menu extends REST_Controller
{

    public function all_get()   {
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
        }
        $this->response($menu_result, 200); 
    }

	
}