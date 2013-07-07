<?php
class AlbumsController extends GalleryAppController {
    public $uses = array('Gallery.Album');
    public $components = array('RequestHandler');
}