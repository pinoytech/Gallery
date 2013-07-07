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

    public function index() {
        $this->response->cache('-1 minute', '+2 week');

        $albums = $this->Post->find('all', array(
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
}