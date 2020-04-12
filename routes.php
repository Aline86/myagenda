<?php
function call($controller, $action) {

require_once('controllers/' . $controller . '_controller.php');

switch($controller) {
    
case 'pages':
    require_once('models/agenda.php');
    require_once('models/agenda_comment.php');
    $controller = new PagesController();
break;
case 'login':
    require_once('models/agenda.php');
    require_once('models/agenda_comment.php');
    require_once('models/user.php');
    $controller = new LoginController();
    break;
case 'logout':
    $controller = new LogoutController();
    break;
case 'agenda':
    require_once('models/agenda.php');
    require_once('models/agenda_comment.php');
    require_once('models/user.php');
    $controller = new AgendaController();
    break;
case 'comment':
    require_once('models/agenda_comment.php');
    require_once('models/user.php');
    require_once('models/agenda.php');
    $controller = new CommentController();
    break;
}

$controller->{ $action }();
}
$controllers = array('pages' => ['home', 'error'],
                     'login' => ['accountcreation', 'checkdata', 'connexioncheck', 'update_profile', 'edit_profile'],
                     'logout' => ['logout'],
                     'agenda' => ['show_agenda', 'show_back', 'publish_agenda', 'form_agenda', 'form_modify_agenda', 'delete_agenda', 'update_agenda'],
                    'comment' => ['show_comment', 'publish_comment']);
if (array_key_exists($controller, $controllers)) {
if (in_array($action, $controllers[$controller])) {
call($controller, $action);
} else {
call('pages', 'error');
}
} else {
call('pages', 'error');
}