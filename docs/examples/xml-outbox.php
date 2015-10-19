<?php

/**
 * Пример реализации отправки SMS сообщений.
 *
 * @author  КазИнфоТех АЦП <support@kazinfoteh.kz>
 * @link    http://docs.kazinfoteh.kz/xml/outbox.html
 */

// Логин и пароль, полученные при регистрации:
define('LOGIN', 'demo');
define('PASSWORD', 'demo');

// Адрес сервера:
define('URL', 'http://kazinfoteh.org:809/api');

// XML для отправки:
$XML = '<?xml version="1.0" encoding="utf-8" ?>
<package login="demo" password="demo">
    <message>
        <default sender="INFO_KAZ"/>
        <msg id="1" recipient="77771234567" sender="TEXT_MSG">Test</msg>
    </message>
</package>';

// Инициализация cURL:
$REQUEST = curl_init();

curl_setopt_array($REQUEST, array(
	CURLOPT_URL             => URL,
	CURLOPT_POST            => TRUE,
	CURLOPT_RETURNTRANSFER  => FALSE,
	CURLOPT_POSTFIELDS      => $XML,
	CURLOPT_HEADER          => array(
		'POST /api HTTP/1.1',
		'Host: http://kazinfoteh.org:809',
		'Content-Type: text/xml; charset=utf-8',
		'Content-Length: '.strlen($XML),
	),
));

echo curl_exec($REQUEST);
curl_close($REQUEST);
