<div class="meetings form">
<?php echo $this->Form->create('Meeting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Meeting'); ?></legend>
	<?php
// FORMデータが引き継がれていることをDEBUGで確認 （リスト６－４ (p.146)）
debug($this->data);

// 入力チェック結果をDEBUGで確認（リスト６－７ (p.160)）
debug($this->Form->validationErrors);
debug($this->Form->isFieldError('Meeting.title'));
		
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Meeting.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Meeting.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Meeting Rooms'), array('controller' => 'meeting_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting Room'), array('controller' => 'meeting_rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
