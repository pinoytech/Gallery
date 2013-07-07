<?php

class PhotosController extends GalleryAppController {
    public $uses = array('Gallery.Photo');
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

        $photos = $this->Photo->find('all', array(
            'limit' => 20,
            'fields' => array('name', 'created'),
            'order' => array(
                'Photo.id' => 'DESC'
            )
        ));
        $this->set('photos', $photos);
    }

    public function index($album_id = null) {
        $this->response->cache('-1 minute', '+2 week');

        $photos = $this->Photo->find('all', array(
            'conditions' => array(
                'Photo.album_id' =>  $album_id
            ),
            'fields' => array('id', 'name', 'image'),
            'limit' => 20,
            'order' => array(
                'Photo.id' => 'DESC'
            )
        ));
        $this->set('photos', $photos);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            if ($this->Photo->save($this->request->data)) {
                $this->Session->setFlash('Your Photo has been saved.', 'alert-info');
                $this->redirect(array('action' => 'admin_add'));
            }
        }
    }
}