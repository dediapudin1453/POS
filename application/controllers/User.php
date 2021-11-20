<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	var $title = "users";

	function __construct()
	{
		parent::__construct();
        check_login_session();
		$this->load->model('user_m', 'user');
	}
    
	public function index()
	{
        $data['title'] = $this->title;
        $data['row'] = $this->user->get()->result();
		$this->template->load('_template', 'user/user_data', $data);
    }
    
    public function add()
    {
		if(isset($_POST['add'])) {
			
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
			$this->form_validation->set_rules('level', 'Level', 'required');

			$this->form_validation->set_message('required', '{field} masih kosong, silakan diisi');
			$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
			$this->form_validation->set_message('is_unique', '%s ini sudah dipakai, ganti yang lain');
			$this->form_validation->set_message('matches', '%s tidak sesuai dengan password');

			$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');



			if($this->form_validation->run() == FALSE) {
				$this->template->load('_template', 'user/user_form_add', array('title' => $this->title));  
			} else {
				$data = $this->input->post(null, TRUE);

				// config upload
				$config['upload_path']          = './uploads/users';
		        $config['allowed_types']        = 'gif|jpg|png|jpeg';
		        $config['max_size']             = 50000;
		        $config['file_name']            = 'user-'.date('ymd').'-'.substr(md5(rand()), 0,10);
		        $this->load->library('upload', $config);

		        /*upload gambar*/
                if (@$_FILES['image']['name'] != null) {
                	if ($this->upload->do_upload('image')) {
                		$data['image'] = $this->upload->data('file_name');
                		$this->user->add($data);
                		echo "<script>alert('Data berhasil disimpan');
						window.location='".site_url('user')."';</script>";
                	}else {
                		$error = array('error' => $this->upload->display_errors());
                	}
                	
                }else{
                	$post['image'] = null;
                	$this->user->add($data);
                	echo "<script>alert('Data berhasil disimpan');
					window.location='".site_url('user')."';</script>";
                }
				echo "<script>alert('Data berhasil disimpan');
				window.location='".site_url('user')."';</script>";

				//$this->user->add($data);
				/*if($this->db->affected_rows() == 1) {
					echo "<script>alert('Data berhasil disimpan'); window.location='".site_url('user')."';</script>";
				} else { redirect('user'); }*/
			}

		} else {

			$this->template->load('_template', 'user/user_form_add', array('title' => $this->title));   
		}
	}

	public function edit($id = null)
	{
		$user_data = $this->user->get($id)->row_array();
		if (!empty($user_data['image'])) {
			$filename = $user_data['image'];
		} else {
			$filename = 'user-'.date('ymd').'-'.substr(md5(rand()), 0,10);
		}
		// config upload
		$config['upload_path']          = './uploads/users';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 50000;
        $config['file_name']            = $filename;
        $this->load->library('upload', $config);

		if(isset($_POST['edit'])) {

			$data = $this->input->post(null, TRUE);
			$check_username = $this->db->query("SELECT * FROM user 
												WHERE username = '$data[username]' 
												AND user_id != '$data[user_id]'");
			if($check_username->num_rows() > 0) {
				echo "<script>alert('Username ini sudah dipakai, ganti yang lain'); window.location='';</script>";
			} else {
				// $this->user->edit();
				// if($this->db->affected_rows() == 1) {
				// 	echo "<script>alert('Data berhasil disimpan'); window.location='".site_url('user')."';</script>";
				// } else { redirect('user'); }

				if (@$_FILES['image']['name'] != null) {
                	if ($this->upload->do_upload('image')) {
                		/*replace image jika sama*/
                		$item = $this->user->get($data['user_id'])->row();
                		if ($item->image != null) {
                			$target_file = './uploads/users/'.$item->image;
                			unlink($target_file); // hapus file nya
                		}

                		$data['image'] = $this->upload->data('file_name');
                		$this->session->set_userdata(array('update_photo'=>$data['image']));
                		
                		$this->user->edit();
                		echo "<script>alert('Data berhasil disimpan Ya');
						window.location='".site_url('user')."';</script>";
                	}else {
                		$error = array('error' => $this->upload->display_errors());
                	}
                	
                }else{
                	$data['image'] = null;
                	$this->user->edit($data);
                	echo "<script>alert('Data berhasil disimpan');
					window.location='".site_url('user')."';</script>";
                }
			}

		} else {
			$query = $this->user->get($id);
			if($query->num_rows() > 0) {
				$user = $query->row();
				$data = array(
					'title' => $this->title,
					'row' => $user,
					'page' => 'edit'
				);
				$this->template->load('_template', 'user/user_form_edit', $data);  
			} else {
				echo "<script>alert('Data tidak ditemukan');
				window.location='".site_url('user')."';</script>";
			}
		}

	}

    public function del($id = null)
	{
		$this->user->del($id);
		
		if($this->db->affected_rows() == 1) {
			echo "<script>alert('Data berhasil dihapus');
			window.location='".site_url('user')."';</script>";
		} else {
			echo "<script>window.location='".site_url('user')."';</script>";
		}
	}
}
