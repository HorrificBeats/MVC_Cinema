<?php


class Users
{
    //Attributes
    private $id;
    private $email;
    private $password;

    //Constructor
    public function __construct(int $id = null, string $email, string $password)
    {
        if (!is_null($id)) {
            $this->set_id($id);
        }
        $this->setEmail($email);
        $this->setPassword($password);
    }


    //GET N SET
    public function get_id()
    {
        return $this->id;
    }
    public function set_id($id)
    {
        $this->id = $id;
    }


    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
