<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Форма пользователя</title>
</head>
<body>
<?php
/**
 * Строки 11-13:
 * Выводим на экран содержимое суперглобального массива $_REQUEST для отладки.
 * $_REQUEST содержит данные, переданные через GET, POST и COOKIE.
 * Функция var_dump() выводит тип и значение каждого элемента массива.
 * Теги <pre> используются для форматированного (читаемого) вывода в браузере.
 */
echo "<pre>";
var_dump($_REQUEST);
echo "</pre>";

/**
 * Строка 17:
 * Формируем ассоциативный массив $arUserInfo с данными пользователя из формы.
 * Каждому элементу массива присвоен строковый ключ для идентификации данных.
 * Значения берутся из суперглобального массива $_REQUEST по именам полей формы.
 * 
 * К элементам user_second_name, user_last_name, user_address добавил ключи.
 * Поле "user_address" разбил на 4 отдельных поля: город, улица, дом, квартира.
 */

$arUserInfo = array(
	"name"        => isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : '',
	"second_name" => isset($_REQUEST['user_second_name']) ? $_REQUEST['user_second_name'] : '',
	"last_name"   => isset($_REQUEST['user_last_name']) ? $_REQUEST['user_last_name'] : '',
	"city"        => isset($_REQUEST['user_city']) ? $_REQUEST['user_city'] : '',
	"street"      => isset($_REQUEST['user_street']) ? $_REQUEST['user_street'] : '',
	"house"       => isset($_REQUEST['user_house']) ? $_REQUEST['user_house'] : '',
	"apartment"   => isset($_REQUEST['user_apartment']) ? $_REQUEST['user_apartment'] : '',
);

/**
 * Строка 36:
 * Преобразуем ассоциативный массив $arUserInfo в строку формата JSON.
 * Функция json_encode() кодирует данные в JSON-строку.
 * Флаг JSON_UNESCAPED_UNICODE — сохраняет кириллицу как есть.
 * Флаг JSON_PRETTY_PRINT — форматирует JSON с отступами для удобного чтения.
 */

$strUserInfo = json_encode($arUserInfo, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>

	<form action="" method="POST">
		<strong>Ваше имя<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_name" id="user_name" value=""><br>

		<strong>Ваше отчество<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_second_name" id="user_second_name" value=""><br>

		<strong>Ваша фамилия<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_last_name" id="user_last_name" value=""><br>

		<!-- Поле "адрес" разбито на 4 отдельных поля: город, улица, дом, квартира -->
		<strong>Город<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_city" id="user_city" value=""><br>

		<strong>Улица<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_street" id="user_street" value=""><br>

		<strong>Дом<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_house" id="user_house" value=""><br>

		<strong>Квартира<span class="mf-req">*</span></strong><br>
		<input type="text" name="user_apartment" id="user_apartment" value=""><br>

		<input type="submit" name="submit" id="submit" value="Отправить">
	</form>

<!-- Блок вывода результата в формате JSON -->
<div id="result">
	<pre><?php echo $strUserInfo; ?></pre>
</div>
</body>
</html>