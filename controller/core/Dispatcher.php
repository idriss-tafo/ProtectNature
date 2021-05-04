<?php

class dispatcher
{
  var $request;
  function __construct()
  {

    $this->request = new Request();
    Router::parse($this->request->url, $this->request);
    //print_r($this->request);
    $controller = $this->loadcontroller();
    //print_r(get_class_methods($controller));
    $action = $this->request->action;
    if ($this->request->prefix) {
      $action = $this->request->prefix . '_' . $action;
    }
    if (!in_array($action, array_diff(get_class_methods($controller), get_class_methods('Controller')))) {
      $this->error('le controller ' . $this->request->controller . ' n\'a pas
          de methode ' . $this->request->action);
    }
    call_user_func_array(array($controller, $action), $this->request->params);
    //debug($this->request->params);

    //print_r($this->request->params[0]);
    //print_r($this->request->action);
    $controller->render($action);

    //$controller->render($this->request->params[0]);
  }
  function error($message)
  {
    $controller = new controller($this->request);
    $controller->e404($message);
  }

  function loadcontroller()
  {
    $name = ucfirst($this->request->controller) . 'Controller';
    $file = ROOT . DS . 'controller' . DS . $name . '.php';
    require $file;
    $controller = new $name($this->request);

    return $controller;
  }
}
