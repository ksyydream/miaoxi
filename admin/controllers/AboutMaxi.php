<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutMaxi extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('aboutmaxi_model');
		$this->load->library('image_lib');
		$this->load->helper('directory');
	}

	public function list_job($page=1){
		$data = $this->aboutmaxi_model->list_job($page);
		$base_url = "/admin.php/AboutMaxi/list_job/";
		$pager = $this->pagination->getPageLink($base_url, $data['total'], $data['limit']);
		$this->assign('pager', $pager);
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->show('job/list_job');
	}

	/*public function upload_image(){
		$dir = FCPATH . '/upload/news_logo';
		if(!is_dir($dir)){
			mkdir($dir,0777,true);
		}
		$config['upload_path'] = './upload/news_logo/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = true;
		$config['max_size'] = '3200';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile')){
			echo 1;
		}else{
			$pic_arr = $this->upload->data();
			echo $pic_arr['file_name'];
		}
	}*/

	public function save_job(){
		if(!$this->input->post('title')){
			$this->show_message('新闻标题不能为空!');
		}
		$rs =$this->aboutmaxi_model->save_job();
		if($rs == 1){
			$this->show_message('保存成功',site_url('AboutMaxi/list_job'));
		}else{
			$this->show_message('保存失败');
		}
	}
	public function add_job($id=null,$page=1){
		$this->assign('page', $page);
		if($id){
			$detail = $this->aboutmaxi_model->get_job_detail($id);
			$this->assign('detail', $detail);
		}
		$this->show('job/job_detail');
	}
}