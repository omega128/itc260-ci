<?php
class Pics_model extends CI_Model {

    public function __construct()
    {
        // we don't actually need much to get this working...
    }
    
    public function get_pics ($tags = "") {
        // original from: http://lifesforlearning.com/connecting-to-the-flickr-api-with-php/
        $api_key = '2e6f1906ce2e3da6e53ffc569a29583e';
        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';

        $response = json_decode(file_get_contents($url));
        return $response;
    }
}
?>
