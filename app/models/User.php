<?php

namespace app\models;


use RedBeanPHP\R;

class User extends \gr\core\Model
{
    public $attributes = [
        'username' => '',
        'avatar' => '',
        'password' => '',
        'email' => '',
    ];

    public $rules = [
      'required' => [
          ['username'],
          ['password'],
          ['email'],
      ],
        'email' => [
            ['email'],
        ],
        'lengthMin' => [
            ['password', 6],
        ]
    ];

    public function checkUnique()
    {
        $user = R::findOne('users', 'email = ? LIMIT 1', [$this->attributes['email']]);
//        debug($user);
        if ($user){
            if ($user->email == $this->attributes['email']){
                $this->errors['unique'] = ['email' => 'this email is registered'];
            }
            return false;
        }
        return true;
    }

    public function login(){
        $email = !empty(trim($_POST['email'])) ? trim($_POST['email']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;
        if ($email && $password){
            $user = R::findOne('users', 'email = ? LIMIT 1', [$email]);
            if ($user){
                if (password_verify($password, $user->password)){
                    foreach ($user as $k => $v){
                        if($k != 'password') $_SESSION['user'][$k] = $v;
//                        debug($_SESSION);
                    }
                    return true;
                }
            }
        }
        return false;
    }
}