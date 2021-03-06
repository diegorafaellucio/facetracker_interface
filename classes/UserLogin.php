<?php

class UserLogin
{

    public $logged_in;
    public $userdata;
    public $login_error;

    public function check_userlogin()
    {

        if (isset($_SESSION['userdata']) && !empty($_SESSION['userdata']) && is_array($_SESSION['userdata']) && !isset($_POST['userdata'])
        ) {
            $userdata = $_SESSION['userdata'];

            $userdata['post'] = false;
        }

        if (isset($_POST['userdata']) && !empty($_POST['userdata']) && is_array($_POST['userdata'])
        ) {
            $userdata = $_POST['userdata'];

            $userdata['post'] = true;
        }

        if (!isset($userdata) || !is_array($userdata)) {

            $this->logout();

            return;
        }

        if ($userdata['post'] === true) {
            $post = true;
        } else {
            $post = false;
        }

        unset($userdata['post']);

        if (empty($userdata)) {
            $this->logged_in = false;
            $this->login_error = null;

            $this->logout();

            return;
        }

        extract($userdata);

        if (!isset($user) || !isset($user_password)) {
            $this->logged_in = false;
            $this->login_error = null;

            $this->logout();

            return;
        }

        $query = $this->db->query(
            'SELECT * FROM users WHERE user = ? LIMIT 1', array($user)
        );

        if (!$query) {
            $this->logged_in = false;
            $this->login_error = 'Internal error.';

            $this->logout();

            return;
        }

        $fetch = $query->fetch(PDO::FETCH_ASSOC);

        $user_id = (int)$fetch['user_id'];

        if (empty($user_id)) {
            $this->logged_in = false;
            $this->login_error = 'User do not exists.';

            $this->logout();

            return;
        }

        if ($this->checkPassword($user_password, $fetch['user_password'])) {

            if (session_id() != $fetch['user_session_id'] && !$post) {
                $this->logged_in = false;
                $this->login_error = 'Wrong session ID.';

                $this->logout();

                return;
            }

            if ($post) {
                session_regenerate_id();
                $session_id = session_id();

                $_SESSION['userdata'] = $fetch;

                $_SESSION['userdata']['user_password'] = $user_password;

                $_SESSION['userdata']['user_session_id'] = $session_id;

                $query = $this->db->query(
                    'UPDATE users SET user_session_id = ? WHERE user_id = ?', array($session_id, $user_id)
                );
            }

            $_SESSION['userdata']['user_permissions'] = unserialize($fetch['user_permissions']);

            $this->logged_in = true;

            $this->userdata = $_SESSION['userdata'];

            if (isset($_SESSION['goto_url'])) {
                $goto_url = urldecode($_SESSION['goto_url']);

                unset($_SESSION['goto_url']);

                echo '<meta http-equiv="Refresh" content="0; url=' . $goto_url . '">';
                echo '<script type="text/javascript">window.location.href = "' . $goto_url . '";</script>';
            }

            return;
        } else {
            $this->logged_in = false;

            $this->login_error = 'Password does not match.';

            $this->logout();

            return;
        }
    }

    protected function logout($redirect = false)
    {
        $_SESSION['userdata'] = array();

        unset($_SESSION['userdata']);

        session_regenerate_id();

        if ($redirect === true) {
            $this->goto_login();
        }
    }

    protected function goto_login()
    {
        if (defined('HOME_URI')) {
            $login_uri = HOME_URI . '/login/';

            $_SESSION['goto_url'] = urlencode($_SERVER['REQUEST_URI']);

            echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
            echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
        }

        return;
    }

    /**
     * Envia para uma página qualquer
     *
     * @final
     */
    final protected function goto_page($page_uri = null)
    {
        if (isset($_GET['url']) && !empty($_GET['url']) && !$page_uri) {
            // Configura a URL
            $page_uri = urldecode($_GET['url']);
        }

        if ($page_uri) {
            // Redireciona
            echo '<meta http-equiv="Refresh" content="0; url=' . $page_uri . '">';
            echo '<script type="text/javascript">window.location.href = "' . $page_uri . '";</script>';
            //header('location: ' . $page_uri);
            return;
        }
    }

    /**
     * Verifica permissões
     *
     * @param string $required A permissão requerida
     * @param array $user_permissions As permissões do usuário
     * @final
     */
    final protected function check_permissions(
        $required = 'any', $user_permissions = array('any')
    )
    {
        if (!is_array($user_permissions)) {
            return;
        }

        // Se o usuário não tiver permissão
        if (!in_array($required, $user_permissions)) {
            // Retorna falso
            return false;
        } else {
            return true;
        }
    }

    function checkPassword($pass, $database_pass)
    {
        $md5_pass = md5($pass);
        if ($md5_pass == $database_pass) {
            return true;
        } else {
            return false;
        }


    }

}
