<?php
class Category_m extends CI_Model {

	var $table = "p_category";

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('category_id', $id);
		}
		$this->db->order_by('name', 'asc');
		$query = $this->db->get();
		return $query;
	}

	public function add($data)
	{
		$params = array(
			'name' => $data['name']
		);
        $this->db->insert($this->table, $params);
	}

	public function edit($data)
	{
        $params = array(
			'name' => $data['name'],
			'updated' => date('Y-m-d H:i:s')
		);
		$this->db->where('category_id', $data['id']);
        $this->db->update($this->table, $params);
	}

	public function del($id)
	{
		$this->db->where('category_id', $id);
        $this->db->delete($this->table);
	}

}