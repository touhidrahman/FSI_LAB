<div class="ink-grid double-top-space">
<?php $this->load->view('_pages_admin_navbar');?>

<div class="column-group gutters">
<div class="all-100">
	<table class="ink-table alternating">
		<tr class="align-left">
			
			<th>Page Heading</th>
			<th>Description</th>
			<th>Publish Date</th>
			<th>Story?</th>
			<th></th>
		</tr>
                <?php 
                foreach ($query->result() as $row):?>
        <tr>
			
			<td><?php echo anchor('/'.$row->page_url, $row->page_headline);?></td>
			<td><?php echo $row->description;?></td>
			<td><?php echo $row->published;?></td>
			<td><?php echo ($row->is_a_story) ? ($row->story_image) ? "<a href='$row->story_image' class='ink-label orange' target='_blank'>Yes</a>" : "" : "";?></td>
			<td><?php echo anchor('pages/create/'.$row->id, 'EDIT', 'class="ink-label blue"');?>
    			<?php echo anchor('pages/delete/'.$row->id, 'DELETE', 'class="ink-label red"');?></td>
		</tr>
                <?php 
                endforeach;
                ?>
	</table>
	<?php echo $links;?>
</div>
</div>
</div>
