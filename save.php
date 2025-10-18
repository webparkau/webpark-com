<?php
// save.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit; }

// Basic CSRF (per-session token)
session_start();
if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'])) { http_response_code(403); exit; }

// Honeypot
if (!empty($_POST['website'])) { http_response_code(204); exit; } // silent drop

// Email validation
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if (!$email) { http_response_code(400); exit; }

// Rate limit (per IP, 1/min)
$ip = $_SERVER['REMOTE_ADDR'];
$rlDir = __DIR__ . '/ratelimit';
if (!is_dir($rlDir)) mkdir($rlDir, 0700);
$rlKey = $rlDir . '/' . md5($ip);
$now = time();
$last = is_file($rlKey) ? (int)file_get_contents($rlKey) : 0;
if ($now - $last < 60) { http_response_code(429); exit; }
file_put_contents($rlKey, (string)$now, LOCK_EX);

// Store pending opt-in
$store = __DIR__ . '/waitlist';
if (!is_dir($store)) mkdir($store, 0700);
$listCsv = $store . '/pending.csv';
$token = bin2hex(random_bytes(16));
$ts = gmdate('c');

// Prevent header injection in mail()
$cleanEmail = str_replace(["\r","\n"], '', $email);

// Append CSV (iso timestamp,email,ip,token)
file_put_contents($listCsv, "$ts,$cleanEmail,$ip,$token\n", FILE_APPEND | LOCK_EX);

// Send confirmation email (adjust From: and domain)
$domain = $_SERVER['HTTP_HOST'];
$confirmUrl = "https://$domain/confirm.php?token=$token";
$headers = "From: WebPark <no-reply@$domain>\r\nReply-To: no-reply@$domain\r\n";
$subject = "Confirm your subscription";
$body = "Tap to confirm: $confirmUrl\n\nIf you didn't sign up, ignore this.";
@mail($cleanEmail, $subject, $body, $headers);

// Redirect to thank-you
header('Location: /thank-you.html', true, 302);