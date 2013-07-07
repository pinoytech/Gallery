<div class="offset1 span10 margin-bottom">
  <?php echo $this->Html->link('Add', array(
    'controller' => 'photos',
    'action' => 'add',
    'plugin' => 'gallery',
    $this->request->params['pass'][0]
  ));?>
  <ul class="thumbnails">
    <?php foreach ($photos as $photo):?>
      <li class="span4">
        <div class="thumbnail">
          <img data-src="holder.js/300x200" alt="">
          <h3>Thumbnail label</h3>
          <p>Thumbnail caption...</p>
        </div>
      </li>
    <?php endforeach;?>
  </ul>
</div>