# Интегрированные решения SOAP: метод SendBulkMessage

Метод `SendBulkMessage` служит для отправки множества сообщений и добавления SMS рассылки.

## Поля метода:

Имя      | Тип              | Описание
---------|------------------|---------------------------------
login    | AnsiString       | логин
password | AnsiString       | пароль
smsarray | Массив SMSMArray | [структура SMSM](/protocols/soap/structure-smsm.html)

## Возвращаемые значения:

```c#
public SMSResultArray SendSMSService.SendBulkMessage(AnsiString login, AnsiString password, SMSMArray smsarray);
```

Смотрите [описание структуры SMSResult](/protocols/soap/structure-smsresult.html).
