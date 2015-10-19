# Интегрированные решения SOAP

Веб-служба стандарта `SOAP` работает по спецификации `WSDL`. Для подключения к SMS-шлюзу вам будет предоставлены все необходимые настройки подключения.

## Пример настроек:

| Параметр          | Значение                       |
|-------------------|--------------------------------|
| IP                | isms.center                    |
| Порт              | 80                             |
| Логин             | demo                           |
| Пароль            | demo                           |
| WSDL              | http://isms.center/soap        |
| Обработчик        | http://isms.center/soap/server |
| Пространства имен | http://tempuri.org/            |
| Название сервиса  | SendSMSService                 |
| Порт сервиса      | SendSMSServicePort             |


Для тестирования интеграции мы предоставляем до 20 тестовых SMS с заголовком отправителя `TEXT_MSG`. После успешного тестирования и заключения договора, вам будет предоставлен полный доступ.

## Заголовок отправителя

Также, вы можете заменить заголовок отправителя `TEXT_MSG` на `INFO_KAZ` (предоставляются бесплатно) или же приобрести собственный заголовок. Пожалуйста, свяжитесь с нами, чтобы узнать все подробности: [+7 (727) 292-15-93](tel:+77272921593).

## Методы

* [GetReport](/protocols/soap/method-getreport.html)
* [GetAbonents](/protocols/soap/method-getabonents.html)
* [SendMessage](/protocols/soap/method-sendmessage.html)
* [GetInfoByID](/protocols/soap/method-getinfobyid.html)
* [GetBulkInfoByID](/protocols/soap/method-getbulkinfobyid.html)
* [SendBulkMessage](/protocols/soap/method-sendbulkmessage.html)
* [GetInboxMessage](/protocols/soap/method-getinboxmessage.html)


## Структуры

* [SMSResult](/protocols/soap/structure-smsresult.html)
* [SMSInfo](/protocols/soap/structure-smsinfo.html)
* [SMSReport](/protocols/soap/structure-smsreport.html)
* [SMSM](/protocols/soap/structure-smsm.html)
* [IDSMS](/protocols/soap/structure-idsms.html)
* [SMSInbox](/protocols/soap/structure-smsinbox.html)


## Массивы

* SMSAbonentsArray
* SMSMArray
* SMSResultArray
* IDSMSArray
* SmsInboxArray

## Пример реализации на 1С:

Обертка `WSПрокси`:

```1с
Определение = Новый WSОпределения("http://isms.center/soap");
Прокси = Новый WSПрокси(Определение, "http://tempuri.org/", "SendSMSService", "SendSMSServicePort");
Фабрика = Прокси.ФабрикаXDTO;

Логин = "demo";
Пароль = "demo";
```

Отправка SMS:

```1с
Тип_SMSM = Фабрика.Тип("http://tempuri.org/", "SMSM");
СМСка = Фабрика.Создать(Тип_SMSM);
СМСка.recepient = "77771234567";
СМСка.senderid = "INFO_KAZ";
СМСка.msg = "Test";
СМСка.msgtype = 0;
СМСка.scheduled = "";
СМСка.UserMsgID = "";
СМСка.prioritet = 2;

Результат = Прокси.SendMessage(Логин, Пароль, СМСка);

Сообщить("Результат отправки: " + Результат.StatusCode + "; Описание: "+Результат.Status+";  Номер сообщения: " + Результат.MsgID + "; Число сегментов: " + Результат.Segments+ "; Время доставки на сервер: " + Результат.ResepDateTime+ "; Номер абонента: " + Результат.Recepient+ "; Язык: " + Результат.Lang+ "; UserMsgID: " + Результат.UserMsgID);
```

Проверка статуса SMS:

```1с
Тип_IDSMS = Фабрика.Тип("http://tempuri.org/", "IDSMS");

СМСкаИнфо = Фабрика.Создать(Тип_IDSMS);
СМСкаИнфо.msgid = "1";
Результат = Прокси.GetInfoByID(Логин, Пароль, СМСкаИнфо);

Сообщить("Результат запроса: " + Результат.resultCode + "; Описание: "+Результат.resultS+";  Номер абонента: " + Результат.recepient + "; Статус смс: " + Результат.status+ "; SenderID сообщения: " + Результат.senderId+ "; Время отправки: " + Результат.senttime+ "; Время доставки/не доставки: " + Результат.receivedtime+ "; Кол-во часте в СМС: " + Результат.segments+ "; Язык: " + Результат.lang+ "; MSGID: " + Результат.msgid+ "; UserMSGID: " + Результат.UserMSGID);
```