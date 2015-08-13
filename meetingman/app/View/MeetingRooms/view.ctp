<div class="meetingRooms view">
<h2><?php  echo __('Meeting Room'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meetingRoom['MeetingRoom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($meetingRoom['MeetingRoom']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meeting Room'), array('action' => 'edit', $meetingRoom['MeetingRoom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meeting Room'), array('action' => 'delete', $meetingRoom['MeetingRoom']['id']), null, __('Are you sure you want to delete # %s?', $meetingRoom['MeetingRoom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meeting Rooms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting Room'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Meetings'); ?></h3>
	<?php if (!empty($meetingRoom['Meeting'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('End Time'); ?></th>
		<th><?php echo __('Meeting Room Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Gidai'); ?></th>
		<th><?php echo __('Gijiroku'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($meetingRoom['Meeting'] as $meeting): ?>
		<tr>
			<td><?php echo $meeting['id']; ?></td>
			<td><?php echo $meeting['start_time']; ?></td>
			<td><?php echo $meeting['end_time']; ?></td>
			<td><?php echo $meeting['meeting_room_id']; ?></td>
			<td><?php echo $meeting['title']; ?></td>
			<td><?php echo $meeting['gidai']; ?></td>
			<td><?php echo $meeting['gijiroku']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'meetings', 'action' => 'view', $meeting['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), null, __('Are you sure you want to delete # %s?', $meeting['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
