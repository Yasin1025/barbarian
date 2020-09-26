<?php
	Class ModelLogin extends CI_model
	{
		// sign in cechk------------------------------------------
		public function login($u)
		{
			$this->db->where('username', $u);
			$sql = $this->db->get('login');
			return $sql->result();
		}
		// create account insert in database------------------------------------------
		public function account_ins($data)
		{
			$query = $this->db->insert('login',$data);
			return $query;
		}
		// information retrive in profile---------------------------------------------
		public function profile_retrive($id)
		{
			// $this->db->where('id', $id);
			// $sql =$this->db->get('login');
			// return $sql->result();
			
			// **************************************************************
			$this->db->where('id',$id);
			$query = $this->db->get('login');
			return $query;

		}

		// delete account-----------------------------------------------------
		public function profile_delete($id)
		{
			$this->db->where('id',$id);
			$sql =$this->db->delete('login');
			return $sql;

		}
		// update profile------------------------------------------------------
		public function profile_id($id)
	    {
	        $this->db->where('id', $id);
	        $sql = $this->db->get('login');
	        return $sql->result();
	    }

	    public function update_profile($data, $id)
	    {
	        $this->db->where('id', $id);
	        $sql = $this->db->update('login', $data);
	        return $sql;
	    }
	}
?>