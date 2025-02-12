<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Задача реализовать мини Laravel приложение.

Бизнес-логика: по середине страницы выводим небольшой блок, 
где слева светофор (просто вертикально в ряд 3 кружка: зеленый, желтый, красный).
А справа кнопка «Вперед».
Ниже, по центру таблица с логами, о ней подробнее ниже.

Цвета светофора должны постоянно меняться по следующей логике: 
   - 5 сек зеленый, 
   - 2 сек желтый, 
   - 5 сек красный, 
   - 2 сек желтый и 
   - снова зеленый. 

Как-то подсвечивать тот цвет, который сейчас активен.

При нажатию на конпку "Вперед" в лог должно записываться сообщение и выводится ниже, 
в таблицу с логами по следующей логике:
- если нажали кнопку "Вперед" на красный, то сообщение в лог "Проезд на красный. Штраф!"
- если нажали кнопку "Вперед" на зеленый, то сообщение в лог "Проезд на зеленый!"
- если нажали кнопку "Вперед" на желтый, то: если желтый был после зеленого, 
  тогда сообщение в лог "Успели на желтый!", 
  если желтый был после красного то сообщение в лог "Слишком рано начали движение!".

При выполнение тестового учитывать следующие моменты:
1. Использовать Laravel 10. *
2. JS должен подключаться к странице и собираться через webpack/vite
3. Использовать jQuery вместо нативного JS там, где это возможно
4. Запись в логи должна происходить без обновления страницы
5. Запись в логи должна быть в базу данных с использованием модели
6. Написать код максимально чисто, красиво
7. Код должен написан быть так, как для реального проекта, а не тестового задания. 
   То есть должен учитывать расширение, переиспользования кода в других частях проекта и т.п.
8. Название функций в JS/PHP и имена PHP файлов/классов пишем в camelCase, 
   все остальное (название blade шаблонов, название переменных, ключей массива и т.д.) в snake_case
9. База данных должна быть спроектирована с расчетом на то, 
   что таких запписей в логи будет очень большое количество, 
   нужно чтобы размер БД разростался максимально медленно
10. Перед всеми функциями JS/PHP (в том числе методами) 
    писать комментарий в виде /** Здесь краткий комментарий: что делает функция */
11. Залить работу на GitGub и отправить ссылку на репозиторий. 
     Важно: первый коммит должен быть "init" с инициализацией Laravel. 
     Второй коммит должен быть целиком результат работы, 
     без последующих коммитов с доработками.
12. Засчечь и по итогу написать сколько примерно времени ушло на задачу.


-----

Запись в логи должна быть в базу данных с использованием модели
База данных должна быть спроектирована с расчетом на то, 
