<?php

/**
 *
 */
class PagesController extends Controller
{

  function view($id)
  {
    $this->lordModel('Post');
    $d['page'] = $this->Post->findfirst(array(
      'condition' => array('online' => 1, 'id' => $id, 'type' => 'page')
    ));
    if (empty($d['page'])) {
      $this->e404('page introuvable');
    }
    //print_r($d);
    $this->setvars($d);
    $this->setvars('phrase', 'bienvenue sur ma  page');
    //$this->render('view');
  }

  function index()
  {
    //$this->render('index');
  }

  /**
   *getmenu permet de recuperer les pages pour le menu
   **/

  function getmenu()
  {
    $this->lordModel('Post');
    return $this->Post->find(array(
      'condition' => array('online' => 1, 'type' => 'page')
    ));
  }
}
