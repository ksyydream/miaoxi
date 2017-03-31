<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Controller {

	/**
	 * Index Page for this controller.
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$list = $this->news_model->get_list();
		$this->assign('list',$list);//url路径
		$this->display('News.html');
	}

	public function news_detail($id=null){
		$detail = $this->news_model->get_detail($id);
		$this->assign('detail',$detail);//url路径
		$this->display('newsDetails.html');
	}


}
