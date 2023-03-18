<?php

if (!function_exists('startChatSession')) {
    function startChatSession($id)
    {
        $messages[] = ['role' => 'user', 'content' => 'Please response in arabic only and in clear and short answers no matter what I ask after that'];
        $messages[] = ['role' => 'user', 'content' => 'I have a game called malee and following what is it and how does it work'];
        $messages[] = ['role' => 'user', 'content' => file_get_contents('maleeDescription.text')];
        $messages[] = ['role' => 'user', 'content' => 'Now i will share with you the player behaviour and actions in the game and i need your advice to help him'];
        file_put_contents('playerChat/player_' . $id . '.json', json_encode($messages));
    }
}
if (!function_exists('logChatAction')) {
    function logChatAction($id, $content)
    {
        $messages = json_decode(file_get_contents('playerChat/player_' . $id . '.json'));
        $messages[] = ['role' => 'user', 'content' => $content];
        file_put_contents('playerChat/player_' . $id . '.json', json_encode($messages));
    }
}
if (!function_exists('logChatRespnce')) {
    function logChatRespnce($id, $content)
    {
        $messages = json_decode(file_get_contents('playerChat/player_' . $id . '.json'));
        $messages[] = ['role' => 'assistant', 'content' => $content];
        file_put_contents('playerChat/player_' . $id . '.json', json_encode($messages));
    }
}
if (!function_exists('getChat')) {
    function getChat($id)
    {
        return json_decode(file_get_contents('playerChat/player_' . $id . '.json'));
    }
}
if (!function_exists('startParentChat')) {

    function startParentChat($id, $messages)
    {
        file_put_contents('parentChat/parent_' . $id . '.json', json_encode($messages));
    }
}
if (!function_exists('logParentChatAction')) {
    function logParentChatAction($id, $content)
    {
        $messages = json_decode(file_get_contents('parentChat/parent_' . $id . '.json'));
        $messages[] = ['role' => 'user', 'content' => $content];
        file_put_contents('parentChat/parent_' . $id . '.json', json_encode($messages));
    }
}
if (!function_exists('getParentChat')) {
    function getParentChat($id)
    {
        return json_decode(file_get_contents('parentChat/parent_' . $id . '.json'));
    }
}
