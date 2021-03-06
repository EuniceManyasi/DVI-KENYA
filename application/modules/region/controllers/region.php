<?php
class Region extends MX_Controller 
{

function __construct() {
parent::__construct();
}


public function index()
	{
            $this->load->model('mdl_region');
            $this->load->library('pagination');
            $this->load->library('table');
            $config['base_url'] = base_url().'/region/index';
            $config['total_rows'] = $this->mdl_region->get('id')->num_rows;
            $config['per_page'] = 5;
            $config['num_links'] = 4;
            $config['full_tag_open'] = '<div><ul class="pagination pagination-small pagination-centered">';
            $config['full_tag_close'] = '</ul></div>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            
            $this->pagination->initialize($config);
          // $data['query'] = $this->mdl_region->get('id', $config['per_page'], $this->uri->segment(3));
            $data['records'] = $this->db->get('m_region', $config['per_page'], $this->uri->segment(3));
           //$this->load->view('display', $data);
            $data['module']="region";
            $data['view_file']="list_region_view";
            $data['section'] = "Configuration";
            $data['subtitle'] = "List Regions";
            $data['page_title'] = "Regions";
            echo Modules::run('template/admin', $data);  
	}
   



function create(){
	
            $update_id= $this->uri->segment(3);
            
            if (!isset($update_id )){
                $update_id = $this->input->post('update_id', $id);
            }
            
            if (is_numeric($update_id)){
                $data = $this->get_data_from_db($update_id);
                $data['update_id'] = $update_id;
                
            } else {
            $data= $this->get_data_from_post();
            }
            
    
	$data['module'] = "region";
	$data['view_file'] = "create_region_form";
  $data['section'] = "Configuration";
  $data['subtitle'] = "Add Region";
  $data['page_title'] = "Regions";
	echo Modules::run('template/admin', $data);
}

function get_data_from_post(){
            $data['region_name']=$this->input->post('region_name', TRUE);
            $data['resident_county']=$this->input->post('resident_county', TRUE);
			$data['incharge_name']=$this->input->post('incharge_name', TRUE);
			$data['mobile_number']=$this->input->post('mobile_number', TRUE);
			$data['email_of_contactperson']=$this->input->post('email_of_contactperson', TRUE);
                     
            return $data;
        }

        function get_data_from_db($update_id){
               $query = $this->get_where($update_id);
               foreach ($query->result() as $row){
                   $data['region_name'] = $row->region_name;
                   $data['resident_county'] = $row->resident_county;
				   $data['incharge_name'] = $row->incharge_name;
				   $data['mobile_number'] = $row->mobile_number;
				   $data['email_of_contactperson'] = $row->email_of_contactperson;
                   
               }
            return $data;
        }

          function submit (){
            
        $this->load->library('form_validation');
        $this->form_validation->set_rules('region_name', 'region Name', 'required|xss_clean');
        $this->form_validation->set_rules('resident_county', 'resident county', 'required|xss_clean');
		$this->form_validation->set_rules('incharge_name', 'name of In-charge', 'required|xss_clean');
		$this->form_validation->set_rules('mobile_number', 'mobile phone number', 'required|xss_clean');
		$this->form_validation->set_rules('email_of_contactperson', 'email of contact person', 'required|xss_clean');
                        
        $update_id = $this->input->post('update_id', TRUE);
        if ($this->form_validation->run() == FALSE)
        {   
                    $this->create();         
        }
        else
        {       
                   $data =  $this->get_data_from_post();
                   
                   if(is_numeric($update_id)){
                       $this->_update($update_id, $data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Region details updated successfully!</div>');
            
                   } else {
                       $this->_insert($data);
                       $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">New Region added successfully!</div>');
                   }
                   
                   //$this->session->set_flashdata('success', 'region added successfully.');
                   redirect('region');
        }
        }

        function delete($id){
$this->_delete($id);
$this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Region details deleted successfully!</div>');
redirect('region');
}
  
function getRegion(){
$this->load->model('mdl_region');
$query = $this->mdl_region->getRegion();
return $query;
}


function get($order_by){
$this->load->model('mdl_region');
$query = $this->mdl_region->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_region');
$query = $this->mdl_region->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id){
$this->load->model('mdl_region');
$query = $this->mdl_region->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_region');
$query = $this->mdl_region->get_where_custom($col, $value);
return $query;
}

function _insert($data){
$this->load->model('mdl_region');
$this->mdl_region->_insert($data);
}

function _update($id, $data){
$this->load->model('mdl_region');
$this->mdl_region->_update($id, $data);
}

function _delete($id){
$this->load->model('mdl_region');
$this->mdl_region->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_region');
$count = $this->mdl_region->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_region');
$max_id = $this->mdl_region->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_region');
$query = $this->mdl_region->_custom_query($mysql_query);
return $query;
}

}