<div class="offset1 span10">
    <?php echo $this->Form->create('Album', array(
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
    <?php
      echo $this->Form->input('status', array(
        'type' => 'select',
        'class' => 'span10',
        'options' => array(
          'draft' => 'Draft',
          'published' => 'Published'
        ),
        'value' => 'draft'
      ));
    ?>
    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn'));?>
    <?php echo $this->Form->end();?>
</div>