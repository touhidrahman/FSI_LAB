    <h2>Component Details</h2>
    <?php foreach ($comp_data->result() as $cd) : ?>
    <table class="table_style">
        <tr>
            <td>Component ID</td>
            <td><?php echo $cd->comp_id;?></td>
        </tr>
        <tr>
            <td colspan="2">Photos</td>
        </tr>
        <tr>
            <td>Trade</td>
            <td><?php echo $cd->maincat;?></td>
        </tr>
        <tr>
            <td>Category</td>
            <td><?php echo $cd->majorcat;?></td>
        </tr>
        <tr>
            <td>Component</td>
            <td><?php echo $cd->comp_name;?></td>
        </tr>
        <tr>
            <td>Aircraft Type</td>
            <td><?php echo $cd->ac_type;?></td>
        </tr>
        <tr>
            <td>Part No</td>
            <td><?php echo $cd->part_no;?></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><?php echo $cd->description;?></td>
        </tr>
        <tr>
            <td>Probable Causes</td>
            <td><?php echo $cd->probable_cause;?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo ($cd->present_status == 1) ? 'Available' : 'Unavailable';?></td>
        </tr>
        <tr>
            <td>Action</td>
            <td>
            <?php echo anchor('components/create/'.$cd->id, 'Edit');?>
            <?php echo anchor('components/delete/'.$cd->id, 'Delete');?>
            </td>
        </tr>
    </table>
    <?php endforeach;?>
    
