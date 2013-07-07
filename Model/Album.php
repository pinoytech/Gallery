<?php

class Album extends GalleryAppModel {
    public $name = 'Album';
    public $hasMany = array('Photo');
    public $validate = array(
        'name' => array(
            'notEmpty'
        )
    );
}