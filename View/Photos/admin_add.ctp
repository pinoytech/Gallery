<div class="offset1 span10">
    <?php echo $this->Form->create('Photo', array(
            'type' => 'file',
            'inputDefaults' => array(
                'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                'div' => array('class' => 'control-group'),
                'label' => array('class' => 'control-label'),
                'between' => '<div class="controls">',
                'after' => '</div>',
                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline'))
                ))); ?>
    <?php echo $this->Session->flash();?>
    <?php echo $this->Form->input('name', array('class' => 'span10'));?>
    <?php echo $this->Form->input('image', array('class' => 'span10', 'type' => 'file'));?>
    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn'));?>
    <?php echo $this->Form->end();?>
</div>