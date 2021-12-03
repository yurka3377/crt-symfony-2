<?php

require_once 'User.php';
require_once 'UserFormValidator.php';

session_start();
$_SESSION["id"] = isset($_POST["id"]) ? $_POST["id"] : "";
$_SESSION["email"] = isset($_POST["email"]) ? $_POST["email"] : "";
$_SESSION["age"] = isset($_POST["age"]) ? $_POST["age"] : "";
$_SESSION["name"] = isset($_POST["name"]) ? $_POST["name"] : "";

if (!empty($_POST)) {
    try {
        $user = new User();
        if (filter_var($_POST["id"], FILTER_VALIDATE_INT)){
            $user->load($_POST["id"]);
            $data = [
                'id'    => $_POST["id"],
                'name'  => $_POST["name"],
                'age'   => $_POST["age"],
                'email' => $_POST["email"],
            ];
            $validator = new UserFormValidator();
            $validator->validate($data);
            if ($user->save($data)){
                echo "данные успешно сохранены";
                clearSession();
            }else{
                throw new Error("данные не сохранены");
            }
        }
    }catch(Error $e){
        echo $e->getMessage();
    }
}

function clearSession(){
    $_SESSION["email"]="";
    $_SESSION["age"]="";
    $_SESSION["name"]="";
    $_SESSION["id"]="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post">
    <p>id: <input type="text" name="id" value="<?php echo $_SESSION['id']; ?>"/></p>
    <p>имя: <input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"/></p>
    <p>возраст: <input type="text" name="age" value="<?php echo $_SESSION['age']; ?>"/></p>
    <p>email: <input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"/></p>
    <p><input type="submit"/></p>
</form>
<br>
<a href="/">Назад</a>
</body>
</html>