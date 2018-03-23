<?php echo form_open('components/find_submit/');?>

<h3>Find Component</h3>
<table>
        <tr>
            <td>Component Name</td>
            <td><?php echo form_input('comp_name', $comp_name);?></td>
        </tr>
        <tr>
            <td>Part No</td>
            <td><?php echo form_input('part_no', $part_no);?></td>
        </tr>
        <tr>
            <td>Aircraft Type</td>
            <td><?php 
            $ac_type_options = array('' => ' ');
            foreach ($ac_types->result() as $ac) {
                $ac_type_options["$ac->ac_type"] = $ac->ac_type;
            }
            echo form_dropdown('ac_type', $ac_type_options, $ac_type);?></td>
        </tr>
        <tr>
            <td>Trade</td>
            <td><?php 
            $maincat_options = array('' => ' ');
                    foreach ($maincats->result() as $m) {
                        $maincat_options["$m->maincat"] = $m->maincat;
                    }
            echo form_dropdown('maincat', $maincat_options, $maincat);?></td>

        </tr>
        <tr>
            <td>Category</td>
            <td><?php 
            $majorcat_options = array('' => ' ');
                    foreach ($majorcats->result() as $j) {
                        $majorcat_options["$j->majorcat"] = $j->majorcat;
                    }
            echo form_dropdown('majorcat', $majorcat_options, $majorcat);?>

        </tr>

        <tr>
            <td>Present Status</td>
            <td><?php echo form_radio('present_status', '1');?> Available
                <?php echo form_radio('present_status', '0');?> Unavailable
            </td>
        </tr>
        <tr>
            <td>Table No</td>
            <td><?php echo form_input('table_no', $table_no);?></td>
        </tr>
        <tr>
            <td>Tag No</td>
            <td><?php echo form_input('tag_no', $tag_no);?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Submit');?></td>
        </tr>
</table>

<?php echo form_close();?>
