<?php echo form_open('components/submit/');?>

<h3>Add Component</h3>
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
            <td><?php echo form_input('ac_type', $ac_type);?></td>
        </tr>
        <tr>
            <td>Trade</td>
            <td><?php echo $maincat;?></td>
            <?php echo form_hidden('maincat', $maincat);?>
        </tr>
        <tr>
            <td>Category</td>
            <td><?php echo $majorcat;?></td>
            <?php echo form_hidden('majorcat', $majorcat);?>
        </tr>
        <tr>
            <td valign="top">Description</td>
            <td><?php echo form_textarea('description', $description);?></td>
        </tr>
        <tr>
            <td valign="top">Probable Cause</td>
            <td><?php echo form_textarea('probable_cause', $probable_cause);?></td>
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