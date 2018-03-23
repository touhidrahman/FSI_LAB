<?php echo form_open('maincats/submit/'.$update_id); ?>



<h3>Add Major Category</h3>

<?php echo validation_errors('<p style="color:red">', '</p>');?>

<table>

        <tr>
            <td>Trade Name</td>
            <td><?php echo form_input('maincat', $maincat);?></td>
        </tr>
        <tr>
            <td valign="top">Description</td>
            <td><?php echo form_textarea('description', $description);?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo form_submit('submit', 'Submit');?></td>
        </tr>
</table>

<?php echo form_close();?>
