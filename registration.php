<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация в задачнике 0.02</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="jquery-3.3.1.min.js"></script>
	<script src="myjs.js"></script>
</head>
<body>


	<!-- Equal width cols, same on all screen sizes -->
<div class="container">



  <div class="row">
    <div class="col-2">
      
    </div>
    <div class="col-8" >

<div class="jumbotron">
  <h1 class="display-3">Простой Задачник</h1>
  <p class="lead">версия 0.02</p>
  <hr class="my-2">
  <p>Здесь вы сможете легко контролировать свои задачи. Никакой лишней херни только вы и ваши задачи</p>
  <p class="lead" id="mainContain">
   
   <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Логин</label>
    <input type="text" class="form-control" id="loginReg" placeholder="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Пароль</label>
    <input type="password" class="form-control" id="passReg" placeholder="">
  </div>
 <div class="form-group">
    <label for="formGroupExampleInput2">Email</label>
    <input type="text" class="form-control" id="emailReg" placeholder="">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Проверка</label>
    <input type="text" class="form-control" id="answReg" placeholder="Фамилия автора, написавшего 'Евгений Онегин'">
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="button" onClick="newUser()" class="btn btn-primary">Регистрация</button>
    </div>
  </div>
</form>
  </p>
</div>

    </div>
    <div class="col-2">
      
    </div>
  </div>
</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>