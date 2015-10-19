# Интегрированные решения SOAP: структура SMSInfo

Структура `SMSInfo` используется в ответе от методов [`GetAbonents`](/protocols/soap/method-getabonents/) (массив из структур), [`GetInfoByID`](/protocols/soap/method-getinfobyid/), [`GetBulkInfoByID`](/protocols/soap/method-getbulkinfobyid/) (массив из структур). В данной структуре хранится информация по запрашиваемым сообщениям.

## Поля структуры:

Имя | Тип | Описание
----|-----|---------
resultCode | Integer | код статуса сообщения
resultS | AnsiString | текстовая расшифровка статуса
recepient | AnsiString | номер телефона абонента
status | AnsiString | статус сообщения
senderId | AnsiString | SenderID сообщения
senttime | AnsiString | Дата и время отправки сообщения

receivedtime | AnsiString | Дата и время доставки/не доставки сообщения

segments | Integer | Кол-во смс в сообщении
lang | AnsiString | Язык сообщения.
userMsgID | AnsiString | Индификатор сообщения заданный Заказчиком
msgID | AnsiString | Уникальный индификатор сообщения в системе провайдера

## Коды статусов сообщения:

Код | Назначение
---:|:----------
1   | ошибка
0   | успех

## Статусы сообщения:

Код         | Назначение
-----------:|:----------
send        | ожидание отправки
sending     | в процессе отправки
sent        | успешно доставлено до оператора
delivered   | успешно доставлено до абонента
undelivered | сообщение не доставлено
