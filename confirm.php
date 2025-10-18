<?php
// confirm.php
$token = $_GET['token'] ?? '';
if (!preg_match('/^[a-f0-9]{32}$/', $token)) { http_response_code(400); exit('Bad token'); }

$store = __DIR__ . '/waitlist';
$pending = $store . '/pending.csv';
$active = $store . '/active.csv';

if (!is_file($pending)) { http_response_code(404); exit('Not found'); }

$rows = file($pending, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$found = false;
$out = [];
foreach ($rows as $r) {
  [$ts,$email,$ip,$t] = array_pad(explode(',', $r), 4, '');
  if ($t === $token) {
    $found = $email;
    $unsub = bin2hex(random_bytes(16));
    file_put_contents($active, gmdate('c') . ",$email,$ip,$unsub\n", FILE_APPEND | LOCK_EX);
  } else $out[] = $r;
}
file_put_contents($pending, implode("\n", $out) . (count($out)? "\n" : ''));

if (!$found) { http_response_code(410); exit('Token used or invalid'); }

$domain = $_SERVER['HTTP_HOST'];
$headers = "From: WebPark <no-reply@$domain>\r\nReply-To: no-reply@$domain\r\n";
@mail($found, "You're subscribed", "Thanks you're on the list.\nUnsubscribe anytime: https://$domain/unsubscribe.php?email=" . urlencode($found) . "&code=$unsub", $headers);

header('Location: /confirmed.html', true, 302);