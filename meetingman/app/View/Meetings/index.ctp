<div class="meetings index">
	<h2><?php echo __('Meetings'); ?></h2>

	
	<div>
<?php // 絞り込み条件リンクを作成 （リスト６－１０ (p.164)）
	if (isset($this->params['named']['today'])
	 && $this->params['named']['today']==true ) {
		
		// namedパラメータを削除した「全て」へのリンクを生成
		$str1 = $this->Paginator->link('全て', array('today'=>null));
		$str2 = '今日の会議だけ';
		
	} else {
		
		// namedパラメータを付与した「今日」へのリンクを生成
		$str1 = '全て';
		$str2 = $this->Paginator->link('今日の会議だけ', array('today'=>true));
	}
	echo sprintf("絞り込み条件：[ %s | %s ]", $str1, $str2);
?>
	</div>

	
	<table cellpadding="0" cellspacing="0">
	<tr><!-- 並び替えリンク付の見出しを表示 (p.162) -->
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_time'); ?></th>
			<th><?php echo $this->Paginator->sort('end_time'); ?></th>
			<th><?php echo $this->Paginator->sort('meeting_room_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('gidai'); ?></th>
			<th><?php echo $this->Paginator->sort('gijiroku'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($meetings as $meeting): ?>
	<tr>
		<td><?php echo h($meeting['Meeting']['id']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['start_time']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['end_time']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($meeting['MeetingRoom']['name'], array('controller' => 'meeting_rooms', 'action' => 'view', $meeting['MeetingRoom']['id'])); ?>
		</td>
		<td><?php echo h($meeting['Meeting']['title']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['gidai']); ?>&nbsp;</td>
		<td><?php echo h($meeting['Meeting']['gijiroku']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meeting['Meeting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $meeting['Meeting']['id']), null, __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php // ページカウンターを表示 (p.162)
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		// 前ページへのリンクを表示 (p.162)
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		// 他ページへのリンクを表示 (p.162)
		echo $this->Paginator->numbers(array('separator' => ''));
		// 次ページへのリンクを表示 (p.162)
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Meeting Rooms'), array('controller' => 'meeting_rooms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Meeting Room'), array('controller' => 'meeting_rooms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
