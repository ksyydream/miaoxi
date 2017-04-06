<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutMaxi extends MY_Controller {

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
		$this->load->model('jobs_model');
	}

	public function index($page=null)
	{
		if($page){
			$this->assign('flag', 1);
		}else{
			$this->assign('flag', -1);
			$page=1;
		}
		$list = $this->jobs_model->get_list($page);
		$pager = $this->pagination->getPageLink('/aboutMaxi/get_list', $list['total'], $list['limit']);
		$this->assign('pager', $pager);
		$this->assign('list',$list);//url路径
		$this->display('aboutMaxi.html');
	}

	public function personDetails($id=null){
		$detail = $this->jobs_model->get_detail($id);
		$this->assign('detail',$detail);//url路径
		$this->display('personDetails.html');
	}

	public function get_list($page=1){
		$this->assign('flag', 1);
		$list = $this->jobs_model->get_list($page);
		$pager = $this->pagination->getPageLink('/aboutMaxi/get_list', $list['total'], $list['limit']);
		$this->assign('pager', $pager);
		$this->assign('list',$list);//url路径
		$this->display('aboutMaxi.html');
	}

}
