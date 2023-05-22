<?php
$telegrambot = 'bot6041275936:AAG6Yf_y1NFs8YqN-tMrChGOCXPo5pwhv5c';
$user = '980659267';

function kirim($pesan, $bot, $chat)
{
    $url = 'https://api.telegram.org/' . $bot . '/sendMessage?chat_id=' . $chat . '
        &text=' . $pesan . '&parse_mode=html';
    $result = file_get_contents($url, true);
    return $result;
}
