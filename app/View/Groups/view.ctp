<!-- File: /app/View/Groups/view.ctp -->

<h1><?php echo h($group['Group']['name']); ?></h1>

<table>
<?php foreach ($group['User'] as $Group): ?>
    <tr>
        <td><?php echo $Group['id']; ?></td>
        <td><?php echo $Group['name']; ?></td>
        <td><?php echo $Group['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($Group); ?>
</table>