<div class="offset1 span10 margin-bottom">
  <table class="table table-striped table-hover table-bordered">
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Manage</td>
      <td>Status</td>
      <td>Created</td>
    </tr>
    <?php foreach ($albums as $album):?>
      <tr>
        <td>
          <?php
            echo $this->Html->link($album['Album']['id'], array(
              'controller' => 'albums',
              'action' => 'edit',
              $album['Album']['id'],
              'admin' => true
            ));
          ?>
        </td>
        <td>
          <?php
            echo $this->Html->link($album['Album']['name'], array(
              'controller' => 'albums',
              'action' => 'edit',
              $album['Album']['id'],
              'admin' => true
            ));
          ?>
        </td>
        <td>
          <?php
            echo $this->Html->link($album['Album']['name'], array(
              'controller' => 'photos',
              'action' => 'index',
              $album['Album']['id'],
              'admin' => true
            ));
          ?>
        </td>
        <td><?php echo ucfirst($album['Album']['status']);?></td>
        <td>
          <?php
            echo $this->Html->link(date('F d, Y', strtotime($album['Album']['created'])), array(
              'controller' => 'albums',
              'action' => 'edit',
              $album['Album']['id'],
              'admin' => true
            ));
          ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>