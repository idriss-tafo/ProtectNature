<?php
if ($this->request->prefix == 'admin') {
    $this->layout = 'default_backend';
    if (!$this->session->islogged()) {
        $this->redirect('users/login');
    } else if ($this->session->whoislogged() !== 'ROLE_ADMIN') {
        $this->redirect('/');
    }
}
