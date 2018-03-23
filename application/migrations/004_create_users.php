<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Users extends CI_Migration {
    
	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
		
		//insert first user
		$data = array(
		    'username' => 'Admin' ,
		    'password' => md5('12345') ,
		);
		$this->db->insert('users', $data);
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
?>