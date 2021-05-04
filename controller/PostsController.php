<?php

/**
 *
 */
class PostsController extends Controller
{
    /**
     * permet de voir un poste
     */
    function view($id, $slug)
    {
        $this->lordModel('Post');
        $condition = array('online' => 1, 'id' => $id, 'type' => 'post');
        $d['page'] = $this->Post->findfirst(array(
            'champ' => 'id,name,content,slug',
            'condition' => $condition
        ));

        if (empty($d['page'])) {
            $this->e404('page introuvable');
        }
        if ($slug != $d['page']->slug) {
            $this->redirect("posts/view/id:$id/slug:" . $d['page']->slug, 301);
        }
        //print_r($d);
        $this->setvars($d);
        //$this->setvars('phrase', 'bienvenue sur ma  page');
        //$this->render('view');
    }
    /**
     * permet de lister tous les postes
     */
    function index()
    {
        $perPage = 1;
        $this->lordModel('Post');
        $condition = array('online' => 1, 'type' => 'post');
        $d['posts'] = $this->Post->find(array(
            'condition' => $condition,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));
        $d['total'] = $this->Post->findCount($condition);
        if (empty($d['posts'])) {
            $this->e404('page introuvable');
        }
        $d['nbrPage'] = ceil($d['total'] / $perPage);
        //print_r($d);
        $this->setvars($d);
        //$this->setvars('phrase', 'bienvenue sur ma  page');
        //$this->render('view');
    }
    /**
     * permet de lister tous les posts
     */
    function admin_index()
    {
        $perPage = 100;
        $this->lordModel('Post');
        $condition = array('type' => 'post');
        $d['posts'] = $this->Post->find(array(
            'condition' => $condition,
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));
        $d['total'] = $this->Post->findCount($condition);
        $d['nbrPage'] = ceil($d['total'] / $perPage);
        //print_r($d);
        $this->setvars($d);
        //$this->setvars('phrase', 'bienvenue sur ma  page');
        //$this->render('view');
    }

    /**
     * permet la supression de poste
     */
    function admin_delete($id)
    {
        $this->lordModel('Post');
        //$this->Post->delete($id);
        $this->session->setflash('mon contenu a bien ete supprimer');
        $this->redirect('admin/posts/index');
    }

    /**
     * permet d'editer un post
     */
    function admin_edit($id)
    {
        $this->lordModel('Post');
        $condition = array('id' => $id);
        $d['post'] = $this->Post->find(array(
            'condition' => $condition
        ));
        $this->setvars($d);
    }
}
