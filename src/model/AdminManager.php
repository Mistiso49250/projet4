<?php
declare(strict_types=1);

namespace Oc\Model;

use Oc\Tools\DbConnect;

class AdminManager 
{
    private $db;

    public function __construct()
    {
        $this->db = (new DbConnect())->connectToDb();        
    }

    public function user() : ?user
    {
        $query = $this->db->prepare('SELECT * FROM user WHERE id = :iduser');
        $query->execute([$id]);
        $user = $query->fetch();
        return $user ?: null;
    }

    public function auth(string $name): ?array
    {
        // // Vérification des identifiants
        $req = $this->db->prepare('SELECT * FROM user WHERE name = :name');
        $req->execute(['name' => $name]);
        $user = $req->fetch();

        if ($user === false) {

            return null;
        }
        return $user;
    }

    public function dislike(int $id, $t)
    {
        if(isset($_GET['t'], $_GET['id']) && !empty($_GET['t']) && !empty($_GET['id'])){
            $check = $this->db->prepare('SELECT id_chapitre FROM chaptire where id = :idchapitre');
            $check->execute(['id' => $id]);

            if($check->rowCount() == 1) {
                if($t == 1){
                    $ins = $this->db->prepare('INSERT into signalement (id_chaptire) values (?)');
                    $ins->execute(['id' => $id]);
                }
                header('Location: index.php?action=chapitre&id=' . $id);
            }else{
                exit();
            }
        }
    }

    public function count(int $id)
    {
        $dislike = $this->db->prepare('SELECT id from signalement where id_chapitre = ?');
        $dislike->execute(['id' => $id]);
        $dislike = $dislike->rowCount();
        return $dislike === false ? null : $dislike;
    }
}
