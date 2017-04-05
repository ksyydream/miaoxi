<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class News_model extends MY_Model
{

    public function __construct ()
    {
    	parent::__construct();
    }

    public function main_new_list(){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('flag',1);
        $this->db->limit(6, 0 );
        $this->db->order_by('cdate', 'desc');
        return $this->db->get()->result_array();;
    }

    public function get_list($page,$class){
        $page_limit = 1;
        $this->db->select('count(1) num')->from('news a');
        $this->db->where('a.flag',1);
        $this->db->where('a.class',$class);
        $num = $this->db->get()->row();
        $data['total'] = $num->num;
        $data['class'] = $class;
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('flag',1);
        $this->db->where('class',$class);
        $this->db->order_by('cdate', 'desc');
        $this->db->limit($page_limit, $offset = ($page - 1) * $page_limit);
        $data['list'] = $this->db->get()->result_array();
        $data['limit'] = $page_limit;
        return $data;
    }

    public function get_detail($id){
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('flag',1);
        $this->db->where('id',$id);
        return $this->db->get()->row_array();;
    }

}