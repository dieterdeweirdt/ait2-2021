<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'user_id';

    public $user_id = 0;
    public $firstname;
    public $lastname;
    public $email;
    public $password;

    

    private function getUserByEmail( string $email) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':email' => $email ] );

        return $pdo_statement->fetchObject();
    }

}