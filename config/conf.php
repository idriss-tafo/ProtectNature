<?php
class Conf
{
  static $google_id = "457627057749-33lftmm72og6k6udeumeppjhms9pcvho.apps.googleusercontent.com";
  static $google_secret = "NRRcRPPjTMAXpa6T2FV3Vrhv";
  static $debug = 1;
  static $database = array(
    'default' => array(
      'host'          => 'localHost',
      'namedatabase'  => 'ProtectNature',
      'login'         => 'ecole',
      'password'      => '123456789'
    )
  );
}
Router::difine_prefixe('banditpolice', 'admin');
Router::connect('/', 'posts/index');
Router::connect('blog/:slug-:id', 'posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)'); //url que l'on souhaite avoir au final.
Router::connect('blog/:action', 'posts/:action');
