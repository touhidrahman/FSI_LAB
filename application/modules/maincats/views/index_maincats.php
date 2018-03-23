<h2>Trades</h2>
<table class="table_style">
    <tr>
        <td><strong>Trade</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    <?php foreach ($maincats->result() as $maincat):?>
    <tr>
        <td><?php echo $maincat->maincat;?></td>
        <td><?php echo $maincat->description;?></td>
        <td>
            <?php echo anchor('maincats/create/'.$maincat->id, 'Edit'); nbs(4);?>
            <?php echo anchor('maincats/delete/'.$maincat->id, 'Delete');?>
            </td>
    </tr>
    <?php endforeach;?>
</table>