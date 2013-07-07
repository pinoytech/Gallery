<?php

class Photo extends GalleryAppModel {
    public $name = 'Photo';
    public $belongsTo = array('Album');
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'image_dir'
                )
            )
        )
    );
    public $validate = array(
        'name' => array(
            'notEmpty'
        )
    );
}