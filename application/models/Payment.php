<?php
class Payment extends CI_Model {

    public function __construct()
    {
	    $this->load->database();
		$this->load->helper('url');
    }

	public function get_model($conditions = [])
	{
		if (!empty($conditions)) {
			$query = $this->db->get_where('payment', $conditions);

        	return $query->row(0, 'Payment');
		} else {
			$query = $this->db->query("SELECT * FROM ci_payment ORDER BY created_date desc");
			return $query->result('Payment');
		}
	}

	public function set_model($data_insert)
	{
	    $data_insert['update_date'] = $data_insert['created_date'] = date('Y-m-d H:i:s');
	    return $this->db->insert('payment', $data_insert);
	}

	public function update_model($id, $data_update = '')
	{
	    $data_update['update_date'] = date('Y-m-d H:i:s');

	    $this->db->where('id', $id);
        $this->db->update('payment', $data_update);
	}


	public function delete_model() {
		$this->db->where('id', $this->id);
  		$this->db->delete('payment');
	}


	public function get_created_date() {
		return date_format(date_create($this->created_date), 'd-m-Y');
	}

	public function get_update_date() {
		return date_format(date_create($this->update_date), 'd-m-Y');
	}
}