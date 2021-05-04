<?php
class Model
{
  static $connections = array();
  public $confdb = 'default';
  public $table = false;
  public $db;
  public $primarykey = 'id';
  public $id;
  public $errors = array();
  public $form;
  public function __construct()
  {

    // initialisation de quelque variable.
    if ($this->table === false) {
      $this->table = strtolower(get_class($this));
      //die($this->table);
    }

    // connection a la base
    $config = Conf::$database[$this->confdb];
    if (isset(Model::$connections[$this->confdb])) {
      $this->db = Model::$connections[$this->confdb];
      return true;
    }
    try {
      $pdo = new PDO(
        'mysql:host=' . $config['host'] . ';dbname=' . $config['namedatabase'] . ';',
        $config['login'],
        $config['password'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
      );
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      Model::$connections[$this->confdb] = $pdo;
      $this->db = $pdo;
    } catch (PDOException $error) {
      if (Conf::$debug >= 1) {
        die($error->getMessage());
      } else {
        die('impossible de se connecter a la bd'); // message abitraire du a notre variable debug
      }
    }
  }

  public function find($req)
  {
    //die($this->table);
    $sql = 'SELECT ';
    if (isset($req['champ'])) {
      if (is_array($req['champ'])) {
        $sql .=  implode(',', $req['champ']);
      } else {
        $sql .= $req['champ'];
      }
    } else {
      $sql .= '*';
    }
    $sql .= ' FROM ' . $this->table . ' as ' . get_class($this) . ' ';
    // construsons les conditions
    if (isset($req['condition'])) {
      $sql .= 'WHERE ';
      if (!is_array($req['condition'])) {
        $sql .= $req['condition'];
      } else {
        $cond = array();
        foreach ($req['condition'] as $key => $value) {
          if (!is_numeric($value)) {

            $value = '"' . $value . '"';
          }
          $cond[] = "$key = $value";
        }
        $sql .= implode(' AND ', $cond);
      }
    }

    if (isset($req['limit'])) {
      $sql .= 'LIMIT ' . $req['limit'];
    }
    //die($sql);
    $pre = $this->db->prepare($sql);
    $pre->execute();
    return $pre->fetchALL(PDO::FETCH_OBJ);
  }

  public function findfirst($req)
  {
    return current($this->find($req));
  }

  public function findCount($condition)
  {

    $res = $this->findfirst(array(
      'champ' => ' COUNT(' . $this->primarykey . ') as nombre',
      'condition' => $condition
    ));
    return $res->nombre;
  }

  public function delete($id)
  {
    $sql = "DELETE FROM {$this->table} WHERE {$this->primarykey} = $id";
    $this->db->query($sql);
  }

  public function save($data)
  {
    //debug($data);
    $table = array();
    $d = array();
    $sql = '';
    $key = $this->primarykey;
    if (isset($data->$key)) unset($data->$key);
    foreach ($data as $k => $value) {
      $table[] = "$k=:$k";
      $d[":$k"] = $value;
    }
    if (isset($data->$key) && !empty($data->$key)) {
      $sql = 'UPDATE ' . $this->table . ' SET ' . implode(',', $table) . ' WHERE ' . $key . '=:' . $key;
      $this->id = $data->$key;
      $d['updated_at'] = date('Y-m-d H:i:s');
      $action = 'update';
    } else {

      $sql = 'INSERT INTO ' . $this->table . ' SET ' . implode(',', $table);
      //$this->id = $data->$key;
      $token = bin2hex(openssl_random_pseudo_bytes(24));
      $d[':token'] = $token;
      $d[':password'] = sha1($d[':password']);
      $d['created_at'] = date('Y-m-d H:i:s');
      $d['last_sign_at'] = date('Y-m-d H:i:s');
      $d['updated_at'] = date('Y-m-d H:i:s');
      $d['banned_at'] = null;
      $action = 'insert';
    }
    $pre = $this->db->prepare($sql);
    //debug($sql);
    //debug($d);
    $pre->execute($d);
    /*if($action == 'insert'){
      $this->id = $this->db->lastInsertId();
    }*/
    return true;
  }
  public function valider($data, $validate)
  {
    //debug($data);
    //ie();
    $errors = array();
    foreach ($validate as $key => $value) {
      if (!isset($data->$key)) {
        //$errors[$key] = $value['message'];
      } else {
        if ($value['rule'] == 'notEmpty' && empty($data->$key)) {

          $errors[$key] = $value['message'];
        } elseif ($key == 'email') {
          //debug('/^' . $value['rule'] . '$/');
          //debug($data->$key);
          //die();
          if (!filter_var($data->$key, FILTER_VALIDATE_EMAIL)) {
            $errors[$key] = $value['message'];
          }
        }
      }
    }
    $this->errors = $errors;
    if (isset($this->form)) {
      $this->form->errors = $errors;
    }
    if (empty($errors)) {
      return true;
    }
    return false;
  }
}
