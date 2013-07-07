<?php

class AlbumsController extends GalleryAppController {
    public $uses = array('Gallery.Album');
    public $components = array('RequestHandler');
    public function beforeFilter() {
        $this->Auth->allow('index', 'view');
    }

    public function isAuthorized($user) {
        // Only admins can access admin functions
        if (isset($this->request->params['admin'])) {
            return (bool)($user['role'] === 'admin');
        }
        return parent::isAuthorized($user);
    }

    public function admin_index() {
        $this->response->cache('-1 minute', '+2 week');

        $albums = $this->Album->find('all', array(
            'limit' => 20,
            'fields' => array('name', 'created'),
            'order' => array(
                'Album.id' => 'DESC'
            )
        ));
        $this->set('album', $albums);
    }

    public function index() {
        $this->response->cache('-1 minute', '+2 week');

        $albums = $this->Album->find('all', array(
            'conditions' => array(
                'Album.status' => 'published'
            ),
            'limit' => 20,
            'fields' => array('name', 'created'),
            'order' => array(
                'Album.id' => 'DESC'
            )
        ));
        $this->set('album', $albums);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->Album->save($this->request->data)) {
                $this->Session->setFlash('Your Album has been saved.', 'alert-info');
                $this->redirect(array('action' => 'admin_add'));
            }
        }
    }
}