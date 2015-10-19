# Интегрированные решения SOAP: метод GetReport

Метод `GetReport` служит для получение сводной информации за определенный период.

## Поля метода:

Имя      | Тип        | Описание
---------|------------|---------
login    | AnsiString | логин
password | AnsiString | пароль
begind   | AnsiString | дата и время начала периода
endd     | AnsiString | дата и время конца периода

## Возвращаемые значения:

```c#
public SMSReport SendSMSService.GetReport(AnsiString login, AnsiString password, AnsiString begind, AnsiString endd);
```

Смотрите [описание структуры SMSReport](/protocols/soap/structure-smsreport/).
