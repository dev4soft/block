<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link href="css/minimal_bs.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width">
</head>
<body>

<form style="margin: 1em" method="post" action="<?=$action?>">
        <div class="form-group">
            <label>Логин:</label>
            <input type="text" class="form-control col-3" name="login">
        </div>
        <div class="form-group">
            <label>Пароль:</label>
            <input type="password" class="form-control col-3" name="pass">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary col-2" value="Войти">
        </div>
    </form>
    
</body>
</html>
