<?php

class Album extends GalleryAppModel {
    public $name = 'Album';
    public $validate = array(
        'name' => array(
            'notEmpty'
        )
    );
}