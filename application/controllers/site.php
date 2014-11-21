<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct()
    {
	parent::__construct();
	//$this->output->enable_profiler(TRUE);
	//load default views
	// $this->load->model('city_model','city_model');
	// $this->load->model('taxi_model','taxi_model');
	$this->load->helper('url');
	$this->_data = array("navigation" => "common/navigation","footer" => "common/footer");
	
    
    }

	public function index()
	{
		redirect('site/home','refresh');
		
	}
	public function home()	{
		$data = $this->_data;
		$this->load->view('home_template', $data);		
	}
	public function send_query()	{
		$message = 'Name:         '.$this->input->post('fname')
		.'<br>Phone:        '.$this->input->post('phone').'<br>Email:        '.$this->input->post('email').'<br>Message:      '.$this->input->post('comments')
		.'<br><br>Thanks,<br>Administrator';
		$config['mailtype'] = 'html';

		$this->load->library('email');
		$this->email->initialize($config);

		$this->email->from($this->input->post('email'), $this->input->post('fname'));
		$this->email->to('teletaxi2010@gmail.com'); 
		// $this->email->to('info@mxbit.co.in'); 
		//$this->email->cc('another@another-example.com'); 
		// $this->email->bcc('them@their-example.com'); 

		$this->email->subject($this->input->post('fname'). ' contacted through wesite.');
		$this->email->message($message);	

		$this->email->send();

		echo true;	

	}
		
									
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */