<?php echo form_open('majorcats/submit/'.$update_id); ?>
<h3>Add Major Category</h3>

<?php echo validation_errors('<p style="color:red">', '</p>');?>

<table>
        <?php 
        $trade = urldecode($this->uri->segment(3));
        if (!is_numeric($trade)) :
        ?>
        <tr>
            <td>Trade</td>
            <td><?php echo $trade;?></td>
            <?php echo form_hidden('maincat', $trade);?>
        </tr>
        <?php else : ?>
         <tr>
            <td>Trade</td>
            <td><?php echo $maincat;?></td>
            <?php echo form_hidden('maincat', $maincat);?>
        </tr>
        <?php endif; ?>
        <tr>
            <td>Category</td>
            <td><?php echo form_input('majorcat', $majorcat);?></td>
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