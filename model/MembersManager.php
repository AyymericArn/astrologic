<?php

class MembersManager {

    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function registerMember(array $nuMember) {

        echo '<pre>';
        print_r($nuMember);
        echo '</pre>';

        try {
            $req = $this->db->prepare('INSERT INTO members (username, email, password, zodiac, inscription_date, newsletter_sub) VALUES (:username, :email, :password, :zodiac, CURRENT_DATE, :newsletter_sub)');
    
            $req->execute([
                'username' => $nuMember[0],
                'email' => $nuMember[1],
                'password' => $nuMember[2],
                'zodiac' => $nuMember[3],
                'newsletter_sub' => $nuMember[4]
            ]);
            return true;
        } catch (\Throwable $th) {
            echo '<pre>';
            var_dump($th);
            echo '</pre>';
            exit;;
        }
    }

    public function findMember(array $member) {
        $req = $this->db->prepare('SELECT * FROM members WHERE email=:email AND password=:password');

        $req->execute([
            'email' => $member['email'],
            'password' => $member['password']

        ]);

        return $req->fetch();
    }
}