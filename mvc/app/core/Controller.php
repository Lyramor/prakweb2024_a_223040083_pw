<?php 

class Controller {

  public function view($view, $data = [0]) {
    require_once '../app/views/' . $view . '.php';
  }
}
?>