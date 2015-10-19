# Интегрированные решения SOAP: метод GetInfoByID

Метод `GetInfoByID` служит для получение полной информации об одиночном сообщении по его `ID`.

## Поля метода:

Имя      | Тип             | Описание
---------|-----------------|---------------------------------
login    | AnsiString      | логин
password | AnsiString      | пароль
ids      | Структура IDSMS | [структура IDSMS](/protocols/soap/structure-idsms.html)

## Возвращаемые значения:

```c#
public SMSInfo SendSMSService.GetInfoByID(AnsiString login, AnsiString password, IDSMS ids);
```

Смотрите [описание структуры SMSInfo](/protocols/soap/structure-smsinfo.html).
