<div class="meetings view">
	<?php 
		// 広告を表示(Element) リスト６－１２(p.166)
		$my_id = $meeting['Meeting']['id'];
		echo $this->element("ad", array('data_id'=>$my_id));
	
		// 広告を表示(MyHelper) リスト６－１６(p.169)
		echo $this->My->ad();

		// 拡張したFormHelperとして広告を表示 リスト６－１９(p.170)
		echo $this->Form->ad(array('id'=>$my_id));
	?>
<h2><?php  echo __('Meeting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Time'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['start_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Time'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['end_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meeting Room'); ?></dt>
		<dd>
			<?php echo $this->Html->link($meeting['MeetingRoom']['name'], array('controller' => 'meeting_rooms', 'action' => 'view', $meeting['MeetingRoom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php // リスト６－２(p.143) 引き渡された検索結果を画面側で参照
				   echo h($meeting['Meeting']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gidai'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['gidai']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gijiroku'); ?></dt>
		<dd>
			<?php echo h($meeting['Meeting']['gijiroku']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Meeting'), array('action' => 'edit', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Meeting'), array('action' => 'delete', $meeting['Meeting']['id']), null, __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Meeting Rooms'), array('controller' => 'meeting_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting Room'), array('controller' => 'meeting_rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Members'); ?></h3>
	<?php if (!empty($meeting['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Delete Flg'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($meeting['Member'] as $member): ?>
		<tr>
			<td><?php echo $member['id']; ?></td>
			<td><?php echo $member['name']; ?></td>
			<td><?php echo $member['email']; ?></td>
			<td><?php echo $member['delete_flg']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), null, __('Are you sure you want to delete # %s?', $member['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
