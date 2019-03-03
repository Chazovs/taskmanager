<?php 
session_start();
$_SESSION['userid'] = $userid;
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Мой задачник</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<div class="exemple-bs">
	<div class="row">

		<div class="col">
			<h1 class="card-header">Мои задачи</h1>
			<p class="card-info">Здесь мы видим списки задач, стоящие передо мной, на ближайшее время</p>
		</div>

	</div>
	</div>
</div>
<div class="row">
	<div class="col-1"></div>
	<div class="col-10">
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Крайний срок</th>
      <th class="col-8">Текст задачи</th>
      <th class="col-1">Статус</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-success">
      <th scope="row">1</th>
      <td>Mark</td>
      <td>
      	<h5 class="mt-0">Card title
      	</h5>
      	<p class="card-text">
      	This card has supporting text below as a natural lead-in to additional content.
      	</p>
      </td>
      <td class="MyCenterText">
		<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
      </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>
		<h5 class="mt-0">Card title
      	</h5>
      	<p class="card-text">
      	This card has supporting text below as a natural lead-in to additional content.
      	</p>
      </td>
      <td class="MyCenterText">
		<input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
      </td>
    </tr>
  </tbody>
</table>
	</div>
	<div class="col-1"></div>
</div>


<!-- контейнер с кнопкой  -->
<div class="container">
  <div class="row">
    <div class="col">
     
    </div>
    <div class="col">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCentered">
  Поставить новую задачу
</button>
    </div>
    <div class="col">
   
    </div>
  </div>
</div>
<!-- конец контейнера с кнопкой -->

<!-- Modal -->
<div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Заголовок задачи</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Текст задачи</label>
    <input type="text" class="form-control" id="FullTasktext" placeholder="">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Крайний срок</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="дата">
  </div>
  <button type="button" class="btn btn-success">Success</button>
</form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>