<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Components extends CI_Migration {
    
	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'comp_id' => array(
				'type' => 'CHAR',
				'constraint' => '10',
			),
			'maincat' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
			'majorcat' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
		    'comp_name' => array(
		        'type' => 'VARCHAR',
		        'constraint' => '100',
		    ),
		    'part_no' => array(
		        'type' => 'VARCHAR',
		        'constraint' => '100',
		    ),
		    'ac_type' => array(
		        'type' => 'VARCHAR',
		        'constraint' => '100',
		    ),
			'description' => array(
				'type' => 'TEXT',
			),
			'probable_cause' => array(
				'type' => 'TEXT',
			),
		    'present_status' => array(
		        'type' => 'TINYINT',
		        'constraint' => '1',
		    ),
		    'table_no' => array(
		        'type' => 'INT',
		        'constraint' => '2',
		        'null' => TRUE,
		    ),
		    'tag_no' => array(
		        'type' => 'INT',
		        'constraint' => '6',
		        'null' => TRUE,
		    ),
		    'filename' => array(
		        'type' => 'VARCHAR',
		        'constraint' => '100',
		    ),
		    'filepath' => array(
		        'type' => 'VARCHAR',
		        'constraint' => '255',
		    ),
		));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('components');
	}

	public function down()
	{
		$this->dbforge->drop_table('components');
	}
}
?>