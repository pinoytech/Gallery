<div class="offset2 span8 margin-bottom body">
    <?php foreach ($albums as $album):?>
         <?php
            echo $this->Html->link($album['Album']['name'], array(
            'controller' => 'albums',
            'action' => 'view',
            $post['Post']['id']
        ));?>
        <?php echo $post['Album']['id'];?>
    <?php endforeach; ?>
</div>