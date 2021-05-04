<?php

use GuzzleHttp\Client;

class UsersController extends Controller
{


    /**
     * login
     */
    function login()
    {
        if ($this->request->data) {
            $data = $this->request->data;
            $data->password = sha1($data->password);
            $this->lordModel('User');
            $condition = array('email' => $data->login, 'password' => $data->password);
            $user = $this->User->findfirst(array(
                'condition' => $condition
            ));
            if (!empty($user)) {
                $this->session->write('user', $user);
            }
            $this->request->data->password = '';
            //debug($data->password);
        }
        if ($this->session->islogged()) {
            $role = $this->session->whoislogged();
            if ($role == 'ROLE_ADMIN') {
                $this->redirect('banditpolice/users/index');
            } else {
                $this->redirect('/');
            }
        }
    }

    /**
     * logout
     */
    function logout()
    {
        unset($_SESSION['user']);
        $this->session->setflash('vous est tres bien deconnecter');
        $this->redirect('/');
    }

    /**
     * permet de lister tous les posts
     */
    function admin_index()
    {
        $perPage = 100;
        $this->lordModel('User');
        $d['users'] = $this->User->find(array(
            'limit' => ($perPage * ($this->request->page - 1)) . ',' . $perPage
        ));
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
        $this->lordModel('User');
        $this->Post->delete($id);
        $this->session->setflash('mon contenu a bien ete supprimer');
        $this->redirect('admin/users/index');
    }

    /**
     * permet d'editer un post
     */
    function admin_edit($id = null)
    {
        $dataerrors = array();
        $this->lordModel('User');
        if ($this->request->data) {
            //die();
            if ($this->User->valider($this->request->data, $this->User->validate)) {
                $this->User->save($this->request->data);
                $this->session->setflash('mon contenu a bien ete modifier');
                $id = $this->User->id;
            } else {
                //debug($this->User->errors);
                //die();
                $dataerrors['dataerror'] = $this->request->data;
                $errorForm = $this->User->errors;
                $this->session->setflash('merci de corriger vos informations', 'error');
                $dataerrors['errorform'] = $this->User->errors;
                $this->setvars($dataerrors);
            }
        }
        if ($id) {
            $condition = array('id' => $id);
            $d['user'] = $this->User->find(array(
                'condition' => $condition
            ));
            $this->setvars($d);
        }
    }
    function register()
    {
        $dataerrors = array();
        $this->lordModel('User');
        if ($this->request->data) {
            //debug($this->request->data);
            //die();
            if ($this->User->valider($this->request->data, $this->User->validate)) {
                $this->User->save($this->request->data);
                $this->session->setflash('nouvaux utilisateur ajouter');
                //$id = $this->User->id;
            } else {
                //debug($this->User->errors);
                //die();
                $dataerrors['dataerror'] = $this->request->data;
                $errorForm = $this->User->errors;
                $this->session->setflash('merci de corriger vos informations', 'error');
                $dataerrors['errorform'] = $this->User->errors;
                $this->setvars($dataerrors);
            }
        }
    }
    function forgot()
    {
        $dataerrors = array();
        $this->lordModel('User');
        if ($this->request->data) {

            if ($this->User->valider($this->request->data, $this->User->validate)) {
                $email = htmlspecialchars($this->request->data->email);
                $check = $this->User->db->prepare('SELECT token FROM user WHERE email = ?');
                $check->execute(array($email));
                $data = $check->fetch();
                $row = $check->rowCount();

                if ($row) {
                    $token = bin2hex(openssl_random_pseudo_bytes(24));
                    $token_user = $data['token'];
                    $date_recover = date('Y-m-d H:i:s');
                    $insert = $this->User->db->prepare('INSERT INTO passwordresettoken(token_user, token,date_recover) VALUES(?,?,?)');
                    $insert->execute(array($token_user, $token, $date_recover));
                    $url = 'http://127.0.0.1' . Router::affiche_url('users/recover/u:{' . base64_encode($token_user) . '}/token:{' . base64_encode($token) . '}');
                    $mail = new Mail();
                    $mail->buildMessage($url);
                    $mail->sentMail($email);
                    $this->redirect('users/login');
                } else {
                    $this->session->setflash('compte non existant ');
                    $this->redirect('admin/users/index');
                }
                // $this->session->setflash('un mail a ete envoyer sur cette adresse: ' . $this->request->data->email);
            } else {
                //debug($this->User->errors);
                //die();
                $dataerrors['dataerror'] = $this->request->data;
                $errorForm = $this->User->errors;
                $this->session->setflash('merci de corriger vos informations', 'error');
                $dataerrors['errorform'] = $this->User->errors;
                $this->setvars($dataerrors);
            }
        }
    }
    function recover()
    {
        $para = array();
        $posttoken = array();
        $this->lordModel('User');
        foreach ($this->request->params as $value) {
            $a = explode(':', $value);
            //debug($a);
            for ($i = 0; $i < count($a); $i += 2) {
                $para[$a[$i]] = trim(trim($a[$i + 1], '{'), '}');
            }
        }
        debug($para);
        $u = htmlspecialchars(base64_decode($para['u']));
        $token = htmlspecialchars(base64_decode($para['token']));
        $check = $this->User->db->prepare('SELECT * FROM passwordresettoken WHERE token_user = ? AND token = ?');
        $check->execute(array($u, $token));
        $row = $check->rowCount();
        if ($row) {
            $get = $this->User->db->prepare('SELECT token FROM user WHERE token = ?');
            $get->execute(array($u));
            $data_u = $get->fetch();
            if (hash_equals($data_u['token'],  $u)) {
                $posttoken['settoken'] = $u;
                $this->setvars($posttoken);
                $this->redirect('users/password_change/' . $u);
            } else {
                debug("erreur de compte");
            }
        } else {
            debug("compte non valide");
        }
    }

    function password_change()
    {
        $this->lordModel('User');
        if ($this->request->data) {
            $token = htmlspecialchars($this->request->data->token);
            $password = htmlspecialchars($this->request->data->password);
            $password2 = htmlspecialchars($this->request->data->password2);
            if (!empty($password) && ($password === $password2) && !empty($token)) {
                debug($token);
                $check = $this->User->db->prepare('SELECT * FROM user WHERE token = ?');
                $check->execute(array($token));
                $row = $check->rowCount();
                if ($row) {
                    $password = sha1($password);
                    $update = $this->User->db->prepare('UPDATE user SET password = ? WHERE token = ?');
                    $update->execute(array($password, $token));

                    $delete = $this->User->db->prepare('DELETE FROM passwordresettoken WHERE token_user = ?');
                    $delete->execute(array($token));
                    $this->redirect('users/login');
                } else {
                    debug("compte n'existe pas");
                    die();
                }
            } else {
                debug("erreur");
                debug($this->request->data);
                debug($password);
                debug($password2);
                die();
            }
        }
    }

    function oauthConnect()
    {
        $client = new Client([
            'timeout' => 2.0,
        ]);
        try {
            $response = $client->request('GET', 'https://accounts.google.com/.well-known/openid-configuration');
            $discoveryJSON = json_decode((string)$response->getBody());
            $tokenEndpoint = $discoveryJSON->token_endpoint;
            $userinfoEndpoint = $discoveryJSON->userinfo_endpoint;
            $response = $client->request('POST', $tokenEndpoint, [
                'form_params' => [
                    'code' => $_GET['code'],
                    'client_id' => Conf::$google_id,
                    'client_secret' => Conf::$google_secret,
                    'redirect_uri' => 'http://127.0.0.1/ProtectNature/users/oauthConnect',
                    'grant_type' => 'authorization_code'
                ]
            ]);
            $accesstoken = json_decode($response->getBody())->access_token;
            $response = $client->request('GET', $userinfoEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accesstoken
                ]
            ]);
            $response = json_decode($response->getBody());
            if ($response->email_verified === true) {
                $this->lordModel('User');
                $check = $this->User->db->prepare('SELECT * FROM user WHERE email = ?');
                $check->execute(array($response->email));
                $row = $check->rowCount();
                if ($row) {
                    $resultat = $check->fetchALL(PDO::FETCH_OBJ);
                    $user = $resultat[0];
                    $this->session->write('user', $user);
                    if ($this->session->islogged()) {
                        $role = $this->session->whoislogged();
                        if ($role == 'ROLE_ADMIN') {
                            $this->redirect('banditpolice/users/index');
                        } else {
                            $this->redirect('/');
                        }
                    }
                } else {
                    debug("compte n'existe pas");
                    die();
                }
                //$this->session->write('user', $user);
            }
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            dd($e->getMessage());
        }


        debug(json_decode((string)$response->getBody()));

        die();
    }
}
