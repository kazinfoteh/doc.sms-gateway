# Интегрированные решения HTTP: отправка сообщений

Для того, чтобы отправить SMS, необходимо сделать запрос на адрес http://kazinfoteh.org:9507 либо https://kazinfoteh.org:9507. Мы принимаем запросы, отправленные методом `GET` или `POST` (на ваш выбор).

Например:

http://kazinfoteh.org:9507/?action=sendmessage&username=demo&password=demo&recipient=77771234567&messagetype=SMS:TEXT&originator=INFO_KAZ&messagedata=Test+message.

## Параметры запроса:

Обазятельные:

| Параметр    | Назначение                             |
|-------------|----------------------------------------|
| action      | sendmessage                            |
| username    | логин                                  |
| password    | пароль                                 |
| recipient   | номер получателя в формате 77aabbbccdd |
| messagetype | тип SMS                                |
| originator  | заголовок отправителя                  |
| messagedata | текст сообщения                        |

Дополнительные:

| Параметр       | Назначение                                                                                |
|----------------|-------------------------------------------------------------------------------------------|
| originator     | заголовок отправителя, по умолчанию TEXT_MSG                                              |
| sendondate     | время отправки SMS                                                                        |
| responseformat | формат возвращаемого ответа                                                               |
| continueurl    | encoded URL, который автоматически добавится к ответу после отправки SMS                  |
| redirecturl    | encoded URL, на который на который произойтет перенаправление после отправки SMS          |
| reporturl      | encoded URL, который будет вызван при изменении статуса SMS (доставлено/ не доставлено)   |

## Формат даты и времени:

     YYYY-MM-DD HH:mm:ss

GMT+0600 (Asia/Almaty)

## Encode URL:

Часть символов, которые необходимо преобразовывать для URL, указанных в continueurl, redirecturl и reporturl.

| Decoded     | Encoded  |
|-------------|----------|
| пробел      | +        |
| !           | %21      |
| "           | %22      |
| #           | %23      |
| %           | %25      |
| &           | %26      |
| '           | %27      |
| -           | %2A      |
| *           | %2B      |
| ,           | %2C      |
| /           | %2F      |
| :           | %3A      |
| <           | %3C      |
| =           | %3D      |
| >           | %3E      |
| ?           | %3F      |

Пример для PHP:

```php
$encoded_URL = urlencode('http://kazinfoteh.kz/continueurl.php?foo=bar');
```

## Формат ответа:

| Формат     | По умолчанию |
|------------|:------------:|
| xml        | +            |
| html       | -            |
| urlencoded | -            |

## Допустимые типы SMS:

| Тип                       | Описание |
|---------------------------|----------|
| SMS:TEXT                  | текстовое SMS сообщение |
| SMS:TEXT:GSM7BIT:CLASS0   | текстовое SMS сообщение, FLASH SMS |
| SMS:TEXT:GSM7BIT:CLASS1   | текстовое SMS сообщение сохраняется в память мобильного устройства |
| SMS:TEXT:GSM7BIT:CLASS2   | текстовое SMS сообщение сохраняется на SIM карту |
| SMS:BINARY                | бинарное SMS сообщение |
| SMS:BINARY:XML            | бинарное SMS сообщение, содержащее PID, DCS и UDH поля в SMS PDU |
| SMS:WAPPUSH               | WAP PUSH сообщение, содержащее ссылку на мелодию, картинку, видео, интернет страницу и т.п. |
| SMS:WAPPUSH:BOOKMARK      | закладка на интернет страницу |
| SMS:VCARD                 | виртуальная визитная карточка |
| SMS:VCALENDAR             | напоминание в календарь |
| SMS:INDICATION:VOICEMAIL  | индикатор о голосовой почте |
| SMS:INDICATION:EMAIL      | индикатор об электронной почте |
| SMS:INDICATION:FAX        | индикатор о факсе |
| SMS:INDICATION:VIDEO      | индикатор о виде |
| SMS:BINARY:PICTUREMESSAGE | бинарная картинка |

## Параметры в ответе:

| Параметр       | Назначение                                          |
|----------------|-----------------------------------------------------|
| statuscode     | статус-код сообщения, возвращаемый оператором       |
| statusmessage  | текстовый статус сообщения, возвращаемый оператором |
| messageid      | идентификатор сообщения                             |
| recipient      | номер телефона получателя сообщения                 |

Пример ответа:

```xml
<?xml version="1.0" encoding="utf-8" ?>
<acceptreport>
    <statuscode>0</statuscode>
    <statusmessage>Message accepted for delivery</statusmessage>
    <messageid>ERFAV23D</messageid>
    <recipient>06203105366</recipient>
</acceptreport>
```

## Параметры в ответе для redirecturl, continueurl и reporturl:

| Параметр               | Назначение                                        |
|------------------------|---------------------------------------------------|
| statuscode             | статус-код сообщения, присланный оператором       |
| statusmessage          | текстовый статус сообщения, присланный оператором |
| messageid              | идентификатор сообщения                           |
| recipient              | номер телефона получателя сообщения               |
| originator             | заголовок сообщения                               |
| messagetype            | тип переданного сообщения                         |
| messagedata            | текст сообщения                                   |
| submitdate             | дата отправки сообщения с сервера                 |
| deliveredtonetworkdate | дата доставки сообщения до оператора              |
| deliveredtohandsetdate | дата и время доставки сообщения до получателя     |
| status                 | текстовый статус сообщения                        |

## Статусы сообщения:

Если статус сообщения — `deliveryfailed`, тогда параметры `statuscode` и `statusmessage` содержат `errorcode` и `errormessage`, присланный от оператора.

| Статус             | Назначение              |
|--------------------|-------------------------|
| deliveredtonetwork | доставлено до оператора |
| deliveredtohandset | доставлено до абонента  |
| deliveryfailed     | сообщение не доставлено |

## Отправка нескольких сообщений в одном запросе:

Для отправки нескольких сообщений в одном запросе, необходимо указать дополнительный параметр `messagecount` со значением, равным количеству отправляемых сообщений, а для параметров необходимо указывать чиловой постфикс, начиная с `0`.

Например:

http://kazinfoteh.org:9507/?action=sendmessage&messagecount=2&username=demo&password=demo&recipient0=77771234567&messagetype0=SMS:TEXT&originator0=INFO_KAZ&messagedata0=Test+1&recipient1=77051234567&messagetype1=SMS:TEXT&originator1=INFO_KAZ&messagedata1=Test+2
