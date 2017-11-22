<?php

class User
{
    public $params;
    public $pdo;

    public function __construct()
    {
        $options = [
            /* 常用设置 */
            PDO::ATTR_CASE => PDO::CASE_NATURAL, /*PDO::CASE_NATURAL | PDO::CASE_LOWER 小写，PDO::CASE_UPPER 大写， */
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /*是否报错，PDO::ERRMODE_SILENT 只设置错误码，PDO::ERRMODE_WARNING 警告级，如果出错提示警告并继续执行| PDO::ERRMODE_EXCEPTION 异常级，如果出错提示异常并停止执行*/
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL, /* 空值的转换策略 */
            PDO::ATTR_STRINGIFY_FETCHES => false, /* 将数字转换为字符串 */
            PDO::ATTR_EMULATE_PREPARES => false, /* 模拟语句准备 */
        ];

        $this->pdo = new PDO('mysql:host=wangye.mvp;dbname=information_product', 'root', 'wangye',$options);
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
//    public function remove($rows)
//    {
//        $id = $rows['id'];
//        $sql = "delete from user where id= :id";
//        $sta = $this->pdo->prepare($sql);
//        $sta->execute(['id' => $id]);
//        return ['success' => true];
//    }

    //更新
//    public function updata($rows)
//    {
//        $id = $rows['id'];
//        //首先先在数据库中获取原始数据
//        $sql = 'select * from user where id= :id';
//        $sta = $this->pdo->prepare($sql);
//        $sta->execute(['id' => $id]);
//        $arr = $sta->fetch(PDO::FETCH_ASSOC);
//        $kk = array_merge($arr, $rows);
//        $sqll = "update user set username= :username,password= :password,permission= :permission,data= :data where id= :id";
//        $aa = $this->pdo->prepare($sqll);
//        $aa->execute($kk);
//        return ['success' => true];
//    }

    //查看
//    public function read($rows = [])
//    {
//        if ($rows) {
//            $id = $rows['id'];
//            $sql = "select * from user where id = :id";
//            $sta = $this->pdo->prepare($sql);
//            $sta->execute(['id' => $id]);
//            $row = $sta->fetch(PDO::FETCH_ASSOC);
//            return $row;
//        } else {
//            $page=$this->params['page'] ?:1;
//            $limit=10;
//            $offset=$limit * ($page-1);
//            $sql = "select * from user limit :offset, :limit";
//            $a = $this->pdo->prepare($sql);
//            $a->execute([
//                'offset' => $offset,
//                'limit' => $limit,
//            ]);
//            $aa = $a->fetchAll(PDO::FETCH_ASSOC);
//            return $aa;
//        }
//    }
}

$you = new User;