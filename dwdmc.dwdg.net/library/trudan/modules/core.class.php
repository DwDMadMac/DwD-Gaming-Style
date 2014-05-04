<?php

function cmp($a, $b) {
    return $a['logTime'] - $b['logTime'];
}

class core {

    function home() {
        global $Tpl, $acpDB;

        // Staff online

        $sql = "SELECT s.`uid`, u.`username`, u.`email` FROM `sessions` s LEFT JOIN `users` u ON s.`uid`=u.`user_id` WHERE s.`uid`!='0'";
        $result = $acpDB->query($sql);
        $staffList = array();
        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
                $staffList[] = array(
                    'username' => $data['username'],
                    'email' => $data['email'],
                );
            }
        }
        $Tpl->assign('staffOnline', $staffList);
    }

    function login() {
        global $Tpl, $Session;


        if (!empty($_POST)) {
            if (isset($_POST['inputUsername'])) {
                if (isset($_POST['inputPassword'])) {
                    $inputUsername = stripslashes(mysql_real_escape_string($_POST['inputUsername']));
                    $inputPassword = stripslashes(mysql_real_escape_string($_POST['inputPassword']));

                    $pass = hash("sha512", $inputPassword);

                    $sql = "SELECT `user_id`,`username`,`email`,`permissions`,`superAdmin`,`group_id` FROM `users` WHERE LOWER(`username`)='" . strtolower($inputUsername) . "' AND `password`='$pass'";

                    $result = $Session->db->query($sql);

                    if ($result->num_rows > 0) {
                        // Log in user
                        $data = $result->fetch_assoc();

                        $_SESSION['user_id'] = $data['user_id'];
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['permissions'] = unserialize(base64_decode($data['permissions']));
                        $_SESSION['superAdmin'] = $data['superAdmin'];
                        $_SESSION['group_id'] = $data['group_id'];
                        $_SESSION['emailhash'] = md5(strtolower(trim($_SESSION['email'])));

                        // get group info
                        $sql = "SELECT `group_id`,`group_name`,`group_permissions`,`superGroup` FROM `groups` WHERE `group_id`='" . $data['group_id'] . "'";

                        $result = $Session->db->query($sql);
                        if ($result->num_rows > 0) {
                            $data = $result->fetch_assoc();

                            $_SESSION['groupName'] = $data['group_name'];
                            $_SESSION['groupPermissions'] = unserialize(base64_decode($data['group_permissions']));
                            $_SESSION['superGroup'] = $data['superGroup'];
                        }

                        header("Location: /home");
                    } else {
                        //$Tpl->assign('noticeMsg', $pass);
                        $Tpl->assign('noticeMsg', "Username or Password is incorrect!");
                        $Tpl->assign('username', $inputUsername);
                    }
                } else {
                    $Tpl->assign('noticeMsg', "You must input a password!");
                }
            } else {
                $Tpl->assign('noticeMsg', "You must input a username!");
            }
        }
    }

    function logout() {
        global $Session;

        session_destroy();
        header("Location: /login");
    }

    function acpusers() {
        global $Tpl, $Session;
        $userList = array();
        $groupList = array();

        $query = $Session->db->query("SELECT u.`user_id`,u.`username`,u.`email`,u.`superAdmin`, g.`group_id`,g.`group_name`,g.`group_permissions` FROM `users` u LEFT JOIN `groups` g ON u.`group_id`=g.`group_id` ORDER BY u.`user_id` ASC");

        while ($row = $query->fetch_assoc()) {
            $userList[] = $row;
        }

        $Tpl->assign('userList', $userList);
    }

    function acpgroups() {
        global $Tpl, $Session;
        $userList = array();

        $query = $Session->db->query("SELECT `group_id`,`group_name`,`group_permissions`,`superGroup` FROM `groups` ORDER BY `group_id` ASC");

        while ($row = $query->fetch_assoc()) {
            $groupList[] = $row;
        }

        $Tpl->assign('groupList', $groupList);
    }

}

?>
