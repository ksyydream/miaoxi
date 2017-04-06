<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact_model extends MY_Model
{

    public function __construct ()
    {
    	parent::__construct();
    }

    public function save_message(){
        $data = array(
            'content'=>$this->input->post('content'),
            'create_time'=>date('Y-m-d H:i:s',time())
        );
        $this->db->insert('message',$data);
        return true;
    }

}