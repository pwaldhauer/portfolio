<?php
function tag_for_image($img) {
    if(is_array($img)) {
        return sprintf('<img src="%s" style="width: %dpx">', $img[0], $img[1]);
    }


    return sprintf('<img src="%s">', $img);
}

function slug($str) {
    return preg_replace('/[^a-z0-9]/i', '_', strtolower($str));
}

function tagname($str) {
    return 'tag__' . slug($str);
}
