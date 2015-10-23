<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Note extends CI_Model {

	public function create($post){
		$query = "INSERT INTO notes (title, description, created_at, updated_at) VALUES (?, '', NOW(), NOW())";
		$values = $post['title'];

		$this->db->query($query,$values);
		$id = $this->db->insert_id();

		return $this->db->query("SELECT id, title, description FROM notes WHERE id = $id")->row_array();
	}

	public function update($post, $id){
		$query = "UPDATE notes SET description = ? WHERE id = ?";
		$values = array($post['content'], $id);

		$this->db->query($query,$values);

		return $this->db->query("SELECT id, title, description FROM notes WHERE id = $id")->row_array();
	}

	public function delete($id){
		$query = "DELETE FROM notes WHERE id = ? ";
		$values = $id;

		$this->db->query($query, $values);
	}

}