    <table>
        <?php foreach ($categories as $category): 
       // debug($post);

    ?>
    <tr>
        <td>
            <?php 
            	if (isset($selectedCategory)){

	                if ($selectedCategory[0]['Category']['id'] == $category['Category']['id']){
	                    echo $category['Category']['name'];
	                }else{
	                    echo $this->Html->link($category['Category']['name'],
	                        array('controller' => 'posts', 'action' => 'category_index',$category['Category']['id'])); 
	                   
	                }
            	}else{

            		 echo $this->Html->link($category['Category']['name'],
	                        array('controller' => 'posts', 'action' => 'category_index',$category['Category']['id'])); 
            	}

 

                ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($category); ?>
    </table>