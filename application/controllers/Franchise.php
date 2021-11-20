<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Franchise extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $c_url = $this->router->fetch_class();
        
        $this->load->model('Franchise_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $data['title'] = 'Franchise';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Franchise' => '',
        ];
        $data['code_js'] = 'franchise/codejs';
        $data['page'] = 'franchise/franchise_list';
        
        $this->template->load('_template', 'franchise/franchise_list', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Franchise_model->json();
    }

    public function read($id) 
    {
        $row = $this->Franchise_model->get_by_id($id);
        if ($row) {
            $data = array(
		'franshice_id' => $row->franshice_id,
		'nama_franshise' => $row->nama_franshise,
		'kota_franchise' => $row->kota_franchise,
		'tlp_franchise' => $row->tlp_franchise,
	    );
        $data['title'] = 'Franchise';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'franchise/franchise_read';
        
        $this->template->load('_template', 'franchise/franchise_read', $data);

        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('franchise'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('franchise/create_action'),
	    'franshice_id' => set_value('franshice_id'),
	    'nama_franshise' => set_value('nama_franshise'),
	    'kota_franchise' => set_value('kota_franchise'),
	    'tlp_franchise' => set_value('tlp_franchise'),
	);
        $data['title'] = 'Franchise';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'franchise/franchise_form';
        $this->template->load('_template', 'franchise/franchise_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_franshise' => $this->input->post('nama_franshise',TRUE),
		'kota_franchise' => $this->input->post('kota_franchise',TRUE),
		'tlp_franchise' => $this->input->post('tlp_franchise',TRUE),
	    );
}$this->Franchise_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('franchise'));
    }
    
    public function update($id) 
    {
        $row = $this->Franchise_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('franchise/update_action'),
		'franshice_id' => set_value('franshice_id', $row->franshice_id),
		'nama_franshise' => set_value('nama_franshise', $row->nama_franshise),
		'kota_franchise' => set_value('kota_franchise', $row->kota_franchise),
		'tlp_franchise' => set_value('tlp_franchise', $row->tlp_franchise),
	    );
            $data['title'] = 'Franchise';
        $data['subtitle'] = '';
        $data['crumb'] = [
            'Dashboard' => '',
        ];

        $data['page'] = 'franchise/franchise_form';
        $this->template->load('_template', 'franchise/franchise_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('franchise'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('franshice_id', TRUE));
        } else {
            $data = array(
		'nama_franshise' => $this->input->post('nama_franshise',TRUE),
		'kota_franchise' => $this->input->post('kota_franchise',TRUE),
		'tlp_franchise' => $this->input->post('tlp_franchise',TRUE),
	    );

            $this->Franchise_model->update($this->input->post('franshice_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('franchise'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Franchise_model->get_by_id($id);

        if ($row) {
            $this->Franchise_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('franchise'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('franchise'));
        }
    }

    public function deletebulk(){
        $delete = $this->Franchise_model->deletebulk();
        if($delete){
            $this->session->set_flashdata('message', 'Delete Record Success');
        }else{
            $this->session->set_flashdata('message_error', 'Delete Record failed');
        }
        echo $delete;
    }
   
    public function _rules() 
    {
	$this->form_validation->set_rules('nama_franshise', 'nama franshise', 'trim|required');
	$this->form_validation->set_rules('kota_franchise', 'kota franchise', 'trim|required');
	$this->form_validation->set_rules('tlp_franchise', 'tlp franchise', 'trim|required');

	$this->form_validation->set_rules('franshice_id', 'franshice_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "franchise.xls";
        $judul = "franchise";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Franshise");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota Franchise");
	xlsWriteLabel($tablehead, $kolomhead++, "Tlp Franchise");

	foreach ($this->Franchise_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_franshise);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota_franchise);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tlp_franchise);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=franchise.doc");

        $data = array(
            'franchise_data' => $this->Franchise_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('franchise/franchise_doc',$data);
    }

  public function printdoc(){
        $data = array(
            'franchise_data' => $this->Franchise_model->get_all(),
            'start' => 0
        );
        $this->load->view('franchise/franchise_print', $data);
    }

}

/* End of file Franchise.php */
/* Location: ./application/controllers/Franchise.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-17 12:31:49 */
/* http://harviacode.com */