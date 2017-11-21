<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>这个天才又来啦❤️</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            border: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
        div{
            box-sizing: border-box;
        }
    </style>
</head>
<body>
<div style="width: 25%;height: 780px; background-color: #d9d9d9;display: inline-block;vertical-align: top">
    <div style="margin-left: 20px">
        <form action="./user.php" method="post"><br>
            用户: <input type="text" name="username"><br>
            密码: <input type="password" name="password"><br>
            权限: <input type="text" name="permission"><br>
            <input type="hidden" name="action" value="add_user">
            <button type="submit" style="width: 128px;margin-left: 40px">提交</button>
        </form>
    </div>
</div>
<div style="width: 74%;height: 780px;background-color: lemonchiffon;display: inline-block;vertical-align: top">

</div>
</body>
</html>