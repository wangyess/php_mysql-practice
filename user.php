<?php

class User
{
    public $params;
    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=wangye.mvp;dbname=information_product', 'root', 'wangye');
        $this->params = array_merge($_GET, $_POST);
        var_dump($this->params);
        $action = $this->params['action'];
        $result = $this->$action();
    }

    //增加
    public function add_user()
    {
        $username = @$this->params['username'];
        $password = @$this->params['password'];
        $permission = @$this->params['permission'];
        $sql = "insert into user(username, password, permission) values('{$username}','{$password}','{$permission}')";
        $row = $this->pdo->prepare($sql);
        $row->execute();
        return ['success' => true];
    }

    //删除
    public function remove($rows)
    {
        $id = $rows['id'];
        $sql = "delete from user where id= :id";
        $sta = $this->pdo->prepare($sql);
        $sta->execute(['id' => $id]);
        return ['success' => true];
    }

    //更新
    public function updata($rows)
    {
        $id = $rows['id'];
        //首先先在数据库中获取原始数据
        $sql = 'select * from user where id= :id';
        $sta = $this->pdo->prepare($sql);
        $sta->execute(['id' => $id]);
        $arr = $sta->fetch(PDO::FETCH_ASSOC);
        $kk = array_merge($arr, $rows);
        $sqll = "update user set username= :username,password= :password,permission= :permission,data= :data where id= :id";
        $aa = $this->pdo->prepare($sqll);
        $aa->execute($kk);
        return ['success' => true];
    }

    //查看
    public function read($rows = [])
    {
        if ($rows) {
            $id = $rows['id'];
            $sql = "select * from user where id = :id";
            $sta = $this->pdo->prepare($sql);
            $sta->execute(['id' => $id]);
            $row = $sta->fetch(PDO::FETCH_ASSOC);
            return $row;
        } else {
            $sql = "select * from user";
            $a = $this->pdo->prepare($sql);
            $a->execute();
            $aa = $a->fetchAll(PDO::FETCH_ASSOC);
            return $aa;
        }
    }
}

$you = new User;
