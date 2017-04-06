<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobs_model extends MY_Model
{

    public function __construct ()
    {
    	parent::__construct();
    }

    public function get_list($page){
        $page_limit = 1;
        $this->db->select('count(1) num')->from('job a');
        $this->db->where('a.flag',1);
        $num = $this->db->get()->row();
        $data['total'] = $num->num;
        $this->db->select("*,DATE_FORMAT(create_time,'%Y-%c-%e') cdate");
        $this->db->from('job');
        $this->db->where('flag',1);
        $this->db->order_by('create_time', 'desc');
        $this->db->limit($page_limit, $offset = ($page - 1) * $page_limit);
        $data['list'] = $this->db->get()->result_array();
        $data['limit'] = $page_limit;
        return $data;
    }

    public function get_detail($id){
        $this->db->select('*');
        $this->db->from('job');
        $this->db->where('flag',1);
        $this->db->where('id',$id);
        return $this->db->get()->row_array();;
    }

}