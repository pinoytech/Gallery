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

    public function admin_index($album_id = null) {

        if (!$this->Photo->Album->exists($album_id)) {
            throw new NotFoundException(__('Invalid Album'));
        }

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
        if (!$this->Photo->Album->exists($album_id)) {
            throw new NotFoundException(__('Invalid Album'));
        }
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

    public function admin_add($album_id = null) {

        if (!$this->Photo->Album->exists($album_id)) {
            throw new NotFoundException(__('Invalid Album'));
        }

        if ($this->request->is('post')) {
            $this->request->data['Photo']['album_id'] = $album_id;
            if ($this->Photo->saveAssociated($this->request->data)) {
                $this->Session->setFlash('Your Photo has been saved.', 'alert-info');
                $this->redirect($this->here);
            }
        }
    }
}