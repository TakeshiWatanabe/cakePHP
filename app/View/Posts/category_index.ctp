<!-- File: /app/View/Posts/index.ctp -->
<?php  // debug($posts); ?>
<h1>Blog posts</h1>
<div style="float:left;">
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($posts as $post): 
       // debug($post);

    ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($post['Post']['title'],
array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($post); ?>
</table>
</div>
<div style="float:right;">
    <table>
        <?php foreach ($categories as $category): 
       // debug($post);

    ?>
    <tr>
        <td>
            <?php echo $this->Html->link($category['Category']['name'],
array('controller' => 'posts', 'action' => 'category_index',$category['Category']['id'])); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($category); ?>
    </table>
</div>