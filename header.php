<?php
    class Page {
        public $page_type;
        public $header_html;
        public function set_type($type) {
            $this->page_type = $type;
        }
        public function get_type() {
            return $this->page_type;
        }
        public function set_html($html) {
            $this->header_html = $html;
        }
        public function get_html() {
            return $this->header_html;
        }
    }
    $page = new Page();
    $page->set_html('
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>'.$page_title.'</title>
        <link type="text/css" rel="stylesheet" href="./theme/@i/bootstrap-icons.css">
        <link type="text/css" rel="stylesheet" href="./theme/css/w3.css">
        <link type="text/css" rel="stylesheet" href="./layout.css.php">
    </head>
    <body>');
?>