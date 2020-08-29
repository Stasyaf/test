<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Список заявок</title>
	<style type="text/css">
		table {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th {
			background-color: lightgray;
		}
		th, td {
			border:1px solid black;
			padding: 5px 7px;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Дата и время</th>
			<th>Имя</th>
			<th>Телефон</th>
			<th>E-mail</th>

		</tr>
	<?
		// Устанавливаем соединение
        $dbh = "mysql:host=localhost; dbname=portfolio";
        $db = new PDO($dbh, "root", "root");

        // Задаем кодировку
        $db->exec("set names utf8");

        //Пишем запрос
        $sql = "SELECT time, name, phone, email FROM orders";

        //задаем сортировку
        $sql = "SELECT * FROM `orders` WHERE 1 ORDER BY `time` DESC";

        //Подгатавливаем запрос
		$result = $db->prepare($sql);

		//Выполняем запрос
		$result->execute();

		//Перебираем данные после прихода из БД
        $orders = array();
        if ($result) {
            while ($line = $result->fetch()){
                $orders[] = $line;
            }
        }
        
        // Выводим данные экран
		foreach ($orders as $order) {?>
			<tr>
				<td><?=$order['time'] ?></td>
				<td><?=$order['name'] ?></td>
				<td><?=$order['phone'] ?></td>
				<td><?=$order['email'] ?></td>
			</tr>
		<?}
	?>
	</table>
</body>
</html>