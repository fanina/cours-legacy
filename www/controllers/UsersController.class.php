<?php

class UsersController
{
    private $user;

    public fucntion __construct(Users $user)
    {
        $this->user = $user;
    }
    public function defaultAction()
    {
        echo "users default";
    }
    
    public function addAction()
    {
        $form = $this->user->getRegisterForm();

    
        $v = new View("addUser", "front");
        $v->assign("form", $form);
    }

    public function saveAction()
    {
        $form = $this->user->getRegisterForm();
        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];


        if ($_SERVER['REQUEST_METHOD']==$method && !empty($data)) {
            $validator = new Validator($form, $data);
            $form["errors"] = $validator->errors;

            if (empty($errors)) {
                $user->setFirstname($data["firstname"]);
                $user->setLastname($data["lastname"]);
                $user->setEmail($data["email"]);
                $user->setPwd($data["pwd"]);
                $user->save();
            }
        }

        $v = new View("addUser", "front");
        $v->assign("form", $form);
    }


    public function loginAction()
    {
        $form = $this->user->getLoginForm();



        $method = strtoupper($form["config"]["method"]);
        $data = $GLOBALS["_".$method];
        if ($_SERVER['REQUEST_METHOD']==$method && !empty($data)) {
            $validator = new Validator($form, $data);
            $form["errors"] = $validator->errors;

            if (empty($errors)) {
                $token = md5(substr(uniqid().time(), 4, 10)."mxu(4il");
                // TODO: connexion
            }
        }
    
        $v = new View("loginUser", "front");
        $v->assign("form", $form);
    }


    public function forgetPasswordAction()
    {
        $v = new View("forgetPasswordUser", "front");
    }
}
