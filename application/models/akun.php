<?php
public function lihat($id)
{
     $this->db->select('*');
     $this->db->from('user');
     $this->db->where('id_user', $id);

     return $this->db->get();
}
