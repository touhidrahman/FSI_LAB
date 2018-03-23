<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Maincats extends CI_Migration {
    
	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'maincat' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'description' => array(
				'type' => 'TEXT',
			),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('maincats');
	}

	public function down()
	{
		$this->dbforge->drop_table('maincats');
	}
}
?>