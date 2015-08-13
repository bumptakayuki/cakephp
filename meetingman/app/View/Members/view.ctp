<div class="members view">
<h2><?php  echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($member['Member']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($member['Member']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delete Flg'); ?></dt>
		<dd>
			<?php echo h($member['Member']['delete_flg']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), null, __('Are you sure you want to delete # %s?', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('controller' => 'meetings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Meetings'); ?></h3>
	<?php if (!empty($member['Meeting'])): ?>
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
		foreach ($member['Meeting'] as $meeting): ?>
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
