<?php
require_once '../config/Db.php';
$db = Db::getConnection();
$error = false;
// получение данных
$userId = (int) $_POST['user_id'];
$anecdoteId = (int) $_POST['anecdote_id'];
$type = $_POST['type'];

// проверяем, голосовал ранее пользователь за эту новость или нет
$sql = "SELECT count(*) FROM `likes` WHERE `user_id` = $userId AND `anecdote_id` = $anecdoteId";
$result = $db->prepare($sql);
$result->execute();
$qwerty = $result->fetch(PDO::FETCH_ASSOC);
//var_dump($result);
//print_r($qwerty['count(*)']);
//die();

// если что-то пришло из запроса, значит уже голосовал
//var_dump($result);exit;
if($qwerty['count(*)'] > 0){
$error = 'Вы уже голосовали';
}else { // если пользователь не голосовал, проголосуем

    if (!$error) {// получем поле для голосования - лайк или дизлайк
        if ($type == 'like') $fieldName = 'count_like';
// делаем запись о том, что пользователь проголосовал
        $addLike = "INSERT INTO `likes` (`user_id`, `anecdote_id`) VALUES ($userId, $anecdoteId)";
        $result = $db->prepare($addLike);
        $result->execute();
        $qwerty = $result->fetch();

// делаем запись для новости - увеличиваем количесво голосов(лайк или дизлайк)
        $addCount = "UPDATE `anecdote`.`anecdote` SET `$fieldName`= `$fieldName` + 1 WHERE  `id` = $anecdoteId";
        $result = $db->prepare($addCount);
        $result->execute();
        $qwerty = $result->fetch();
    }
}
// делаем ответ для клиента
    if ($error) {
// если есть ошибки то отправляем ошибку и ее текст
        echo json_encode(array('result' => 'error', 'msg' => $error));
    } else {
// если нет ошибок сообщаем об успехе
        echo json_encode(array('result' => 'success'));
    }
