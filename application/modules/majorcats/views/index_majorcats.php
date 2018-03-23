<h2>Major Categories</h2>
<table class="table_style">
    <tr>
        <td><strong>Trade</strong></td>
        <td><strong>Category</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    <?php foreach ($majorcats->result() as $majorcat):?>
    <tr>
        <td><?php echo $majorcat->maincat;?></td>
        <td><?php echo $majorcat->majorcat;?></td>
        <td><?php echo $majorcat->description;?></td>
        <td>
            <?php echo anchor('majorcats/create/'.$majorcat->id, 'Edit'); nbs(4);?>
            <?php echo anchor('majorcats/delete/'.$majorcat->id, 'Delete');?>
            </td>
    </tr>
    <?php endforeach;?>
</table>