<?php
class Controller
{
  public $request;
  private $vars = array();
  public $layout = 'default';
  private $rendered = false;

  function __construct($request = null)
  {
    $this->session = new Session();
    $this->form = new Form($this);
    if ($request) {
      $this->request = $request; // On stock la requette dans l'instance
    }
    require ROOT . DS . 'config' . DS . 'hook.php';  // inserer des comportements particulieres au niveau du layaout
  }

  public function render($view)
  {
    if ($this->rendered) {
      return false;
    }
    extract($this->vars);
    //print_r($this->vars);
    //die($view);
    if (strpos($view, '/') === 0) {
      $view = ROOT . DS . 'view' . $view . '.php';
      //die($view);
    } else {
      $view = ROOT . DS . 'view' . DS . $this->request->controller . DS . $view . '.php'; //'view' represente le dossier view
      //die($view);
    }
    ob_start();
    require $view;

    $content_for_layout = ob_get_clean();
    require_once(ROOT . DS . 'view' . DS . 'layaout' . DS . $this->layout . '.php');
    $this->rendered = true;
  }
  public function setvars($key, $value = NULL)
  {
    if (is_array($key)) {
      //print_r($key);
      $this->vars += $key;
    } else {
      //die($key);
      $this->vars[$key] = $value;
    }
  }
  /**
   *creation de la fonction qui permetra de charger les models
   **/
  function lordModel($namemodel)
  {
    $file = ROOT . DS . 'model' . DS . $namemodel . '.php';
    //die($file);
    require_once($file);
    if (!isset($this->$namemodel)) {

      $this->$namemodel = new $namemodel();
      if (isset($this->Form)) {
        $this->$namemodel->form = $this->Form;
      }
    } else {
      echo 'pas charger';
    }
  }
  /**
   *permet de gerer les erreurs 404
   **/
  function e404($message)
  {
    //header("HTTP/1.0 404 Not Found");
    $this->setvars('message', $message);
    $this->render('/errors/404');
    //die();
  }

  /**
   * permet d'appeler un controller depuis une vue.
   **/
  function request_vue($controller, $action)
  {
    $controller .= 'Controller';
    $url = ROOT . DS . 'controller' . DS . $controller . '.php';
    require_once($url);
    $c = new $controller();
    return $c->$action();
  }

  function redirect($url, $code = null)
  {
    if ($code == 301) {
      header("HTTP/1.1 301 Moved Permanently");
    }
    header("Location: " . Router::affiche_url($url));
  }
}
