# Интегрированные решения SOAP: метод GetAbonents

Метод `GetAbonents` служит для получение информации об сообщениях за определенный период.

## Поля метода:

Имя      | Тип        | Описание
---------|------------|---------
login    | AnsiString | логин
password | AnsiString | пароль
begind   | AnsiString | дата и время начала периода
endd     | AnsiString | дата и время конца периода

## Формат даты и времени:

     YYYY-MM-DD HH:mm:ss

GMT+0600 (Asia/Almaty)

## Возвращаемые значения:

```c#
public SMSAbonentsArray SendSMSService.GetAbonents(AnsiString login, AnsiString password, AnsiString begind, AnsiString endd);
```

Смотрите [описание структуры SMSInfo](/protocols/soap/structure-smsinfo.html).
