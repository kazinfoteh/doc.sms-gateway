# Интегрированные решения SOAP: метод GetBulkInfoByID

Метод `GetBulkInfoByID` служит для получение полной информации о многих сообщениях по их `ID`.

## Поля метода:

Имя      | Тип               | Описание
---------|-------------------|---------
login    | AnsiString        | логин
password | AnsiString        | пароль
idsms    | Массив IDSMSArray | [структура IDSMS](/protocols/soap/structure-idsms/)

## Возвращаемые значения:

```c#
public SMSAbonentsArray SendSMSService.GetBulkInfoByID(AnsiString login, AnsiString password, IDSMSArray idsms);
```

Смотрите [описание структуры SMSInfo](/protocols/soap/structure-smsinfo/).
