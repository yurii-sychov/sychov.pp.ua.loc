<?php

/**
 * Developer: Yurii Sychov
 * Site: http://sychov.pp.ua
 * Email: yurii@sychov.pp.ua
 */

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="card">
	<div class="card-body row">
		<div class="col-5 text-center d-flex align-items-center justify-content-center">
			<div class="">
				<h2>SP<strong>Repair</strong></h2>
				<p class="lead mb-5">84 Andriivska Str., Kropyvnytsyi, 25009<br>
				Phone: +38 0522 11-11-11
				</p>
			</div>
		</div>
		<div class="col-7">
			<form method="POST" id="FormSendMessage">
				<div class="form-group">
					<label for="inputName">Имя</label>
					<input type="text" id="inputName" class="form-control" name="name" placeholder="Введите имя" />
				</div>
				<div class="form-group">
					<label for="inputEmail">Электронная почта</label>
					<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Введите контактный email" />
				</div>
				<div class="form-group">
					<label for="inputSubject">Тема сообщения</label>
					<input type="text" id="inputSubject" class="form-control" name="subject" placeholder="Введите тему сообщения" />
				</div>
				<div class="form-group">
					<label for="inputMessage">Сообщение</label>
					<textarea id="inputMessage" class="form-control summernote" rows="4" name="message" placeholder="Введите текст сообщения"></textarea>
				</div>
					<div class="form-group">
					<button class="btn btn-primary" onClick="sendMessage(event)">Связаться с нами</button>
				</div>
			</form>
		</div>
	</div>
</div>