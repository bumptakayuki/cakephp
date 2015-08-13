<div class="meetings form">
<?php echo $this->Form->create('Meeting'); ?>
	<fieldset>
		<legend><?php echo __('Add Meeting'); ?></legend>
	<?php
		echo $this->Form->input('start_time');
		echo $this->Form->input('end_time');
		echo $this->Form->input('meeting_room_id');
		echo $this->Form->input('title');
		echo $this->Form->input('gidai');
		echo $this->Form->input('gijiroku');
		echo $this->Form->input('Member');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Meeting Rooms'), array('controller' => 'meeting_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting Room'), array('controller' => 'meeting_rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
