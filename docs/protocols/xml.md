# Интегрированные решения XML

Для подключения к SMS-шлюзу вам будет предоставлены все необходимые настройки подключения. Вы можете подключиться к нам используя `HTTP` или `HTTPS` протокол.

## Пример настроек:
| Параметр | Значение                         |
|----------|----------------------------------|
| IP       | kazinfoteh.org (212.124.121.186) |
| Порт     | 809                              |
| Логин    | demo                             |
| Пароль   | demo                             |
| Sender   | TEXT_MSG                         |

Мы рекомендуем использовать именно доменное имя заместо IP адреса, если это возможно.

Для тестирования интеграции мы предоставляем до 20 тестовых SMS с заголовком отправителя `TEXT_MSG`. После успешного тестирования и заключения договора, вам будет предоставлен полный доступ.

## Заголовок отправителя

Также, вы можете заменить заголовок отправителя `TEXT_MSG` на `INFO_KAZ` (предоставляются бесплатно) или же приобрести собственный заголовок. Пожалуйста, свяжитесь с нами, чтобы узнать все подробности: [+7 (727) 292-15-93](tel:+77272921593).

## Формат номера получателя

Мы принимаем номер получателя в формате `77aabbbccdd`. SMS, отправленные на номера `8` или `+7` будут откланены нашим SMS-шлюзом и не будут переданы на сторону операторов сотовой связи для отправки.

Пожалуйста, обрабатывайте номера получателей на своей стороне перед отправкой на наш SMS-шлюз.

## Примеры запросов

Мы принимаем и отправляем запросы, отправленные методом `GET` или `POST` (на ваш выбор).

* [отправка SMS на телефонные номера абонентов](/protocols/xml/outbox.html)
* [проверка статусов отправленных SMS](/protocols/xml/status.html)
* [прием SMS от абонентов с коротких номеров](/protocols/xml/outbox.html)

## Примеры ошибок

При отправке XML документа могут возвращаться следующие коды ошибок:

| Код | Значение      |
|----:|:--------------|
| 200 | UNKNOWN       |
| 201 | FORMAT        |
| 202 | AUTHORIZATION |

Пример ответа:
```xml
<?xml version="1.0" encoding="utf-8" ?>
<package>
    <error>201</error>
</package>
```