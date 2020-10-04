<?php

namespace WordPressWebPureData;

class WordPressWebPureData {

    public function __construct() {
        add_filter('upload_mimes', [$this, 'add_pd_mime_type']);
    }

    /**
     * @param string[] $mime_types 
     * 
     * @return string[]
     */
    public function add_pd_mime_type($mime_types) {
        $mime_types['pd'] = 'text/plain';

        return $mime_types;
    }

}