<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	var $title = "categories";

	function __construct()
	{
		parent::__construct();
        check_login_session();
        $this->load->model('category_m', 'category');
	}
    
	public function index()
	{
        $data['title'] = $this->title;
		$data['row'] = $this->category->get();		
		$this->template->load('_template', 'product/category/category_data', $data);
    }
    
    public function add()
    {
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
            'title' => $this->title,
            'page' => 'add',
			'row' => $category
		);
        $this->template->load('_template', 'product/category/category_form', $data);   
    }

	public function edit($id = null)
	{
		if($id != null) {
			$query = $this->category->get($id);
			if($query->num_rows() > 0) {
				$category = $query->row();
				$data = array(
                    'title' => $this->title,
                    'page' => 'edit',
                    'row' => $category
                );
		        $this->template->load('_template', 'product/category/category_form', $data);  
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='".site_url('category')."';</script>";
			}
		} else {
			echo "<script>window.location='".site_url('category')."';</script>";
		}
	}

    public function process()
	{
		if(isset($_POST['add'])) {
            $data = $this->input->post(null, TRUE);
            $this->category->add($data);
		} else if(isset($_POST['edit'])) {
            $data = $this->input->post(null, TRUE);
            $this->category->edit($data);
		}

		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil disimpan');
			window.location='".site_url('category')."';</script>";
		} else {
			redirect('category');
		}
	}

    public function del($id = null)
	{
		$this->category->del($id);
		
		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='".site_url('category')."';</script>";
		} else {
			echo "<script>window.location='".site_url('category')."';</script>";
		}
	}
}
