# Интегрированные решения SOAP: структура SMSReport

Структура `SMSReport` используется в ответе от метода [`GetReport`](/protocols/soap/method-getreport.html). В данной структуре хранится сводная информация по запрашиваемому периоду.

## Поля структуры:

Имя          | Тип        | Описание
-------------|------------|---------
resultCode   | Integer    | код статуса сообщения
resultS      | AnsiString | текстовая расшифровка статуса
RecepCount   | Integer    | количество телефонов абонентов
SmsCount     | Integer    | количество смс сообщений
DelivCount   | Integer    | количество смс сообщений доставленных до абонента
UndelivCount | Integer    | количество смс сообщений не доставленных
SendCount    | Integer    | количество смс сообщений с статусом "ожидание отправки"
SentCount    | Integer    | количество смс сообщений доставленных до оператора, но не получен финальный статус
SendingCount | AnsiString | кол-во сообщений с статусом "в процессе отправки"

## Коды статусов сообщения:

Код | Назначение
---:|:----------
1   | ошибка
0   | успех