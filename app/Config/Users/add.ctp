<!-- File: /app/View/Users/add.ctp -->

<h1>Add User</h1>
<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('group_id',array('options'=>$Groups));
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->end('Save Post');
?>