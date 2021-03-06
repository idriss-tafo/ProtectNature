<?php
class Session
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function setflash($message, $type = 'success')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public function afficheFlash()
    {
        if (isset($_SESSION['flash']['message'])) {
            $html = '<div class="alert-message ' . $_SESSION['flash']['type'] . '"><p>' . $_SESSION['flash']['message'] . '</p></div>';
            $_SESSION['flash'] = array();
            return $html;
        }
    }

    public function write($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function read($key = null)
    {
        if ($key) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else return false;
        }
        return $_SESSION;
    }

    public function islogged()
    {
        return isset($_SESSION['user']->id);
    }

    public function whoislogged()
    {
        if ($this->islogged()) {
            return $_SESSION['user']->roles;
        }
    }
}
