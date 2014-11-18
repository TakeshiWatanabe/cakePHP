<!-- File: /app/View/Groups/index.ctp -->

<h1>Groups</h1>
<table>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$groups配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($groups as $group): ?>
    <tr>
        <td><?php echo $group['Group']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($group['Group']['name'],
array('controller' => 'groups', 'action' => 'view', $group['Group']['id'])); ?>
        </td>
        <td><?php echo $group['Group']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>