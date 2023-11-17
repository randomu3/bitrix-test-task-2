# Проект "Новая Заявка"

## Описание

Проект "Новая Заявка" представляет собой веб-форму для отправки заявок с использованием платформы Bitrix. Форма позволяет пользователям создавать новые заявки с указанием различных параметров.

## Структура проекта

Проект организован следующим образом:

- [**components/Test/Components/request.send.email/template/.default/template.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/templates/.default/template.php): 
- Компонент формы, обрабатывающий создание и отправку заявок.
- [**components/Test/Components/IblockHelper.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/classes/IblockHelper.php): Вспомогательный класс для работы с инфоблоками.
- [**components/Test/Components/Categories.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/classes/Categories.php): 
- Класс для работы с категориями из инфоблока.
- [**components/Test/Components/Applications.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/classes/Applications.php): 
- Класс для работы с видами заявок из инфоблока.
- [**components/Test/Components/Warehouses.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/classes/Warehouses.php): 
- Класс для работы со складами поставки из инфоблока.
- [**components/Test/Components/Brands.php**](https://github.com/randomu3/bitrix-test-task/blob/main/local/components/test/request.send.mail/classes/Brands.php): 
- Класс для работы с брендами из инфоблока.

## Использование компонента

1. **EmailFormComponent:** Компонент для отображения и обработки формы заявки.
   - Пространство имен: `Test\Components`
   - Методы:
      - `sendEmail($data)`: Отправляет заявку по электронной почте.
      - `executeComponent()`: Основной метод для выполнения компонента.

2. **IblockHelper:** Вспомогательный класс для работы с инфоблоками.
   - Пространство имен: `Test\Components`
   - Методы:
      - `includeModule()`: Подключает модуль "iblock".
      - `getIblockData($iblockId, $type)`: Получает данные из инфоблока в зависимости от типа данных.

3. **Categories, Applications, Warehouses, Brands:** Классы для работы с данными из соответствующих инфоблоков.

## Верстка формы

Форма заявки оформлена в виде HTML-формы с использованием Bootstrap для улучшения пользовательского интерфейса. Включает поля для ввода заголовка, выбора категории, вида заявки, склада поставки, состава заявки, выбора файла, комментария и кнопки отправки.

### Скриншоты
<details>
  <summary>Скриншоты</summary>
  
![Форма заявки - Desktop](https://i.imgur.com/biju8By.png)

![Форма заявки - Mobile](https://i.imgur.com/XRt2ktv.png)
</details>

## Установка и запуск

1. Убедитесь, что у вас установлен Bitrix.
2. Скопируйте компоненты в директорию `/local/components/test/`.
3. Вставьте код формы в нужное место вашего проекта.
4. Настройте инфоблоки для категорий, видов заявок, складов поставки и брендов.

## Лицензия

[MIT License](LICENSE)
