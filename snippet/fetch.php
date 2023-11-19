<?php
// https://www.indexnow.org/de_de/documentation
if(array_key_exists('newPage', get_defined_vars()) && array_key_exists('key', get_defined_vars())) {
    if($newPage->isPublished()) {
        $url = $newPage->url();
        $indexnow = "https://api.indexnow.org/indexnow?url={$url}&key={$key}"

        $remote = Remote::request($indexnow, [
            'method' => 'POST',
        ]);
        $remote->fetch();
    }
}
?>