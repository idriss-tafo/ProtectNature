<?php
class Router
{
  static $route = array();
  static $prefixe = array();
  public $url_css;


  static function difine_prefixe($url, $redirect_prefixe)
  {
    self::$prefixe[$url] = $redirect_prefixe;
  }

  /**
   *permet de parser une url
   *@param $url url a parser
   *@return tableau contenant les parametres
   **/
  static function parse($url, $request)
  {
    $url = trim($url, '/'); // trim permet de retirer les espaces ou des caracteres en debut de chaine
    if (empty($url)) {
      $url = Router::$route[0]['url'];
    } else {
      foreach (Router::$route as $value) {
        if (preg_match($value['catcher'], $url, $match)) {
          //debug($match);
          $request->controller = $value['controller'];
          $request->action = isset($match['action']) ? $match['action'] : $value['action'];
          $request->params = array();
          foreach ($value['params'] as $k => $v) {
            $request->params[$k] = $match[$k];
          }
          if (!empty($match['args'])) {
            $request->params += explode('/', trim($match['args'], '/'));
          }
          return $request;
        }
      }
    }

    $params = explode('/', $url);
    if (in_array($params[0], array_keys(self::$prefixe))) {
      $request->prefix = self::$prefixe[$params[0]];
      array_shift($params);
      //debug($params);
    }
    $request->controller = $params[0];
    $request->action = isset($params[1]) ? $params[1] : 'index';
    $request->params = array_slice($params, 2);
    //print_r($request->params);
    return true;
  }

  static function connect($url_final, $url_original)
  {

    $r = array();
    $r['params'] = array();
    $r['url'] = $url_original;
    $r['final'] = $url_final;
    $r['original'] = str_replace(':action', '(?P<action>([a-z0-9]+))', $url_original);
    $r['original'] = preg_replace('/([a-z0-9]+):([^\/]+)/', '${1}:(?P<${1}>${2})', $r['original']);
    $r['original'] = '/^' . str_replace('/', '\/', $r['original']) . '(?P<args>\/?.*)$/';

    $params = explode('/', $url_original);
    foreach ($params as $key => $value) {
      if (strpos($value, ':')) {
        $p = explode(':', $value);
        $r['params'][$p[0]] = $p[1];
      } else {
        if ($key == 0) {
          $r['controller'] = $value;
        } elseif ($key == 1) {
          $r['action'] = $value;
        }
      }
    }

    $r['catcher'] = $url_final;
    $r['catcher'] = str_replace(':action', '(?P<action>([a-z0-9]+))', $r['catcher']);
    foreach ($r['params'] as $k => $v) {
      $r['catcher'] = str_replace(":$k", "(?P<$k>$v)", $r['catcher']);
    }
    $r['catcher'] = '/^' . str_replace('/', '\/', $r['catcher']) . '(?P<args>\/?.*)$/';
    //debug($r);
    self::$route[] = $r;
  }


  static function affiche_url($url)
  {
    foreach (self::$route as $value) {
      if (preg_match($value['original'], $url, $macth)) {
        //debug("ok");
        foreach ($macth as $k => $v) {
          if (!is_numeric($k)) {
            $value['final'] = str_replace(":$k", $v, $value['final']);
          }
        }
        return BASE_URL . str_replace('//', '/', '/' . $value['final']) . $macth['args'];
      }
    }
    foreach (self::$prefixe as $key => $value) {
      if (strpos($url, $value) === 0) {
        $url = str_replace($value, $key, $url);
      }
    }
    return BASE_URL . '/' . $url;
  }
}
