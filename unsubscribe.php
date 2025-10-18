<?php
// unsubscribe.php → redirect to a pretty HTML page with status
$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$code = $_GET['code'] ?? '';
$status = 'error';

if ($email && preg_match('/^[a-f0-9]{32}$/', $code)) {
  $store = __DIR__ . '/waitlist';
  $active = $store . '/active.csv';

  if (is_file($active)) {
    $rows = file($active, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $out = [];
    $removed = false;

    foreach ($rows as $r) {
      [$ts,$em,$ip,$unsub] = array_pad(explode(',', $r), 4, '');
      if ($em === $email && $unsub === $code) { $removed = true; continue; }
      $out[] = $r;
    }

    file_put_contents($active, implode("\n", $out) . (count($out)? "\n" : ''));
    $status = $removed ? 'ok' : 'notfound';
  } else {
    $status = 'notfound';
  }
}

header('Location: /unsubscribed.html?status=' . $status, true, 302);
exit;