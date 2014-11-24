<!-- File: /app/View/Groups/add.ctp -->

<h1>Add Post</h1>
<?php
echo $this->Form->create('Group');
echo $this->Form->input('name');
echo $this->Form->end('Save Post');
?>