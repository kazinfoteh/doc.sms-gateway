<?php

/**
 * Пример реализации приема SMS сообщений.
 * 
 * @author  КазИнфоТех АЦП <support@kazinfoteh.kz>
 * @link    http://docs.kazinfoteh.kz/http/inbox.html
 */

// Логин и пароль, полученные при регистрации:
define('LOGIN', 'demo');
define('PASSWORD', 'demo');

// Логин и пароль должны быть обязательно получены, иначе это запрос не от SMS-шлюза:
isset($_REQUEST['userin'], $_REQUEST['passwordin']) || die;

// Логин и пароль должны соответствовать выданым, иначе это запрос не от SMS-шлюза:
$_REQUEST['userin'] === LOGIN && $_REQUEST['passwordin'] === PASSWORD || die;

// Обазятельные параметры:
isset($_REQUEST['sender'], $_REQUEST['short'], $_REQUEST['msgdata']) || die;

define('SENDER', ltrim($_REQUEST['sender'], '+'));
define('SHORT', ltrim($_REQUEST['short'], '+'));
define('MSGDATA', $_REQUEST['msgdata']);

// @TODO выполните все необходимые действия с получеными данными (сохраните в базу данных и т.п.).

// Текст ответа обязательно должен быть в кодировке UTF-8:
define('TEXT', mb_convert_encoding('Спасибо,\\0x0A\\0x0Dваш ответ принят!', 'UTF-8'));
printf('{SMS:TEXT:FORMATTED}{}{%s}{%s}{%s}', SHORT, SENDER, TEXT);
