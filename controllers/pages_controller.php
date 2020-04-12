<?php 
class PagesController {
public function home() {
    session_start();
    $agendas=Agenda::get_all();
    require_once('views/pages/index.php');
}
public function error() {
require_once('views/pages/error.php');
}
}
?>