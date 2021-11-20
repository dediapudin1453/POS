<?php
class stock_m extends CI_Model {

	var $table = "t_stock";

	public function get($id = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($id != null) {
			$this->db->where('stock_id', $id);
		}
		// $this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function del($id)
	{
		$this->db->where('stock_id', $id);
        $this->db->delete($this->table);
	}


	public function get_stock_in()
	{
		$this->db->select('t_stock.stock_id, 
		p_item.barcode, 
		p_item.name as item_name, 
		qty, date, detail,
		supplier.name as supplier_name,
		p_item.item_id');
		$this->db->from($this->table);
		$this->db->join('p_item', 't_stock.item_id = p_item.item_id');
		$this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
		$this->db->where('type', 'in');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function add_stock_in($data)
	{
		$params = array(
			'item_id' => $data['item_id'],
			'type' => "in",
			'detail' => $data['detail'],
			'supplier_id' => $data['supplier'] == '' ? null : $data['supplier'],
			'qty' => $data['qty'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
        $this->db->insert($this->table, $params);
	}


	public function get_stock_out()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('p_item', 't_stock.item_id = p_item.item_id');
		$this->db->where('type', 'out');
		$this->db->order_by('stock_id', 'desc');
		$query = $this->db->get();
		return $query;
	}
	public function add_stock_out($data)
	{
		$params = array(
			'item_id' => $data['item_id'],
			'type' => "out",
			'detail' => $data['detail'],
			'qty' => $data['qty'],
			'date' => $data['date'],
			'user_id' => $this->session->userdata('userid')
		);
        $this->db->insert($this->table, $params);
	}

}