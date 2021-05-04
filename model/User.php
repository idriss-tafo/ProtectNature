<?php

class User extends Model
{
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'vous devez presiser un nom'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'vous devez presiser une addresse email valide'
        )
    );

    public $emailvalidate = array(
        'email' => array(
            'rule' => 'email',
            'message' => 'vous devez presiser une addresse email valide'
        )
    );
    function __construct()
    {
        parent::__construct();
    }
}
