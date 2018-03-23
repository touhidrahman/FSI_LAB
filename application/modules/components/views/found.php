<h3>Search Result</h3>
<table class="table_style">
        <tr>
            <td>Component Name</td>
        
            <td>Part No</td>
            
            <td>Aircraft Type</td>
            
            <td>Trade</td>
            
            <td>Category</td>
            
            <td>Present Status</td>
            
            <td>Table No</td>
            
            <td>Tag No</td>
            <td>Action</td>
            
        </tr>

        <?php foreach ($founds->result() as $f) : ?>
            <tr>
            <td><?php echo $f->comp_name; ?></td>
        
            <td><?php echo $f->part_no; ?></td>
            
            <td><?php echo $f->ac_type; ?></td>
            
            <td><?php echo $f->maincat; ?></td>
            
            <td><?php echo $f->majorcat; ?></td>
            
            <td><?php echo ($f->present_status == 1) ? 'Available' : 'Unavailable'; ?></td>
            
            <td><?php echo $f->table_no; ?></td>
            
            <td><?php echo $f->tag_no; ?></td>
            <td><?php echo anchor('components/view/'.$f->id, 'View Details'); ?></td>
            
        </tr>
    <?php endforeach; ?>
</table>
