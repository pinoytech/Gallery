<?php

class Photo extends GalleryAppModel {
    public $name = 'Album';
    public $actsAs = array(
        'Upload.Upload' => array(
            'image' => array(
                'fields' => array(
                    'dir' => 'img_dir'
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