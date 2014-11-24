<!-- File: /app/View/Posts/view.ctp -->

<h1><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p><?php echo h($post['Post']['body']); ?></p>

<img src="http://192.168.33.10/cakephp/files/P<?php echo str_pad($post['Post']['id'], 5, "0", STR_PAD_LEFT);?>">