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

}