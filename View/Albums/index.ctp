<div class="offset1 span10 margin-bottom">
    <?php foreach ($albums as $album):?>
         <?php
            echo $this->Html->link($album['Album']['name'], array(
            'controller' => 'albums',
            'action' => 'view',
            $album['Album']['id']
        ));?>
        <?php pr($album);?>
        <?php echo $album['Album']['id'];?>
    <?php endforeach; ?>
</div>