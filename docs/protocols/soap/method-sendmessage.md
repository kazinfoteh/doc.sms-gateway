# Интегрированные решения SOAP: метод SendMessage

Метод `SendMessage` служит для отправки одиночного сообщения.

## Поля метода:

Имя      | Тип            | Описание
---------|----------------|---------------------------------
login    | AnsiString     | логин
password | AnsiString     | пароль
sms      | Структура SMSM | [структура SMSM](/protocols/soap/structure-smsm.html)

## Возвращаемые значения:

```c#
public SMSResult SendSMSService.SendMessage(AnsiString login, AnsiString password, SMSM sms);
```
Смотрите [описание структуры SMSResult](/protocols/soap/structure-smsresult.html).
