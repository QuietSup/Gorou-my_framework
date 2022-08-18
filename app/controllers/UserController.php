<?php

namespace app\controllers;

use app\models\Set;
use app\models\User;
use gr\core\View;
use RedBeanPHP\R;

class UserController extends \gr\core\Controller
{
    public function registrationAction()
    {
        if (isset($_SESSION['user']['id'])) redirect('');

        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
//            debug($user->checkUnique());
            $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            if ($user->save('users')){
                $_SESSION['success'] = "You're successfully registered";
                redirect('/user/login');
            }else{
                $_SESSION['error'] = "Oops! Unexpected error. Please, try later ";
                redirect();
            }
            die;
        }
        $this->view->render('registration');
    }

    public function loginAction()
    {
        if (isset($_SESSION['user']['id'])) redirect('');
        if (!empty($_POST)){
            $user = new User();
            if ($user->login()){
                if ($_SESSION['user']['avatar'] == ('' or null) or !isset($_SESSION['user']['avatar'])) $_SESSION['user']['avatar'] = 'defaultAvatar.png';
                redirect('/set/find');
            }
            else{
                $_SESSION['error'] = "invalid email/password";
                redirect();
            }
        }
        $this->view->render('login');
    }

    public function logoutAction()
    {
        if ($_SESSION['user']) unset($_SESSION['user']);
        redirect('/user/login');
    }

    public function accountAction()
    {
        new User();
        if ($_SESSION['user']['id'] !== $this->slug($slug)) View::errorCode(403);

        $user = $_SESSION['user'];
        if ($_SESSION['user']['avatar'] == ('' or null)) $_SESSION['user']['avatar'] = 'defaultAvatar.png';
        $user_id = $this->slug($slug);
        $created =  R::getCell("SELECT COUNT(*) FROM sets WHERE user_id=?", [$user['id']]);
        $studying = R::getCell("SELECT COUNT(*) FROM saved WHERE user_id=?", [$user['id']]);


            if(!empty($_POST)){
            $user=new User();


            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data, $data['password'] == '' ? ['password'] : [])
                || !(!($data['email'] != $_SESSION['user']['email']) || $user->checkUnique())){
                $user->getErrors();
//                $_SESSION['form_data'] = $data;
                redirect();
            }

//            debug($_FILES);
//            debug($_FILES);
        if(!empty($_FILES["avatar"]['name'])){
//                debug($user);

                $targetDir = "uploads/";
                $fileName = basename($_FILES["avatar"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                $targetFilePath = $targetDir . $user_id . ".$fileType";


            // Allow certain file formats
                $allowTypes = array('jpg','png','jpeg');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)){
//                        rename("/uploads/$fileName", "/uploads/$user_id");
                        $user->attributes['avatar'] = "$user_id.$fileType";
//                        debug($user->attributes);
                        // Insert image file name into database
//                        $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
//                        $user->attributes['avatar'] =
                    }else{
                        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                    }
                }else{
                    $_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
                }
            }



            if ($data['password'] != '') $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);

            $escape = [
                empty($_FILES["avatar"]['name']) ? 'avatar' : '',
                $data['password'] == '' ? 'password' : ''
            ];

            if ($user->update('users', $_SESSION['user']['id'], $escape)){
//                $_SESSION['success'] = "Data changed";
                $user = R::getRow("SELECT * FROM users WHERE id=$user_id");
//                debug($user);
                foreach ($user as $k => $v){
                    if($k != 'password') $_SESSION['user'][$k] = $v;
                    }
//                if ($_SESSION['user']['avatar'] == ('' or null)) $_SESSION['user']['avatar'] = '/public/img/avatar.png';
//                else $_SESSION['user']['avatar'] = '/uploads/'.$_SESSION['user']['avatar'];
                $_POST = array();
                if ($_SESSION['user']['avatar'] == ('' or null) or !isset($_SESSION['user']['avatar'])) $_SESSION['user']['avatar'] = 'defaultAvatar.png';

                redirect();
            }else{
                $_SESSION['error'] = "Oops! Unexpected error. Please, try again later ";
            }
//            debug($_SESSION);
        }
        $this->view->render('user',
            compact('user', 'created', 'studying', 'slug')
        );
    }
}
