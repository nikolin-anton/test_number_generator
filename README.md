Генератор випадкового числа

Налаштування:
 - вказати у env довжину числа по замовчуванню COUNT_DEFAULT
 - є можливість заповнення БД фейковими даними виконанавши команду php artisan db:seed

Реалізовано дві основні функції
 - generate() - генерація випадкового числа, також є можливість передачі пармету count (кількість цифер у числі), якщо параметр не вказувати то виведеться число довжиною по замовчуванню (СCOUNT_DEFAULT яке налаштовується в .env файлі)
 - retrieve() - виведення числа за вказаним id

 Також в наєвності є додаткові функції
 - index() - виведення всіх чисел
 - update() - оновлення
 - destroy() - видалення


 Посилання на колекцію Postman
  https://api.postman.com/collections/20223196-78cc0016-d9f7-417c-af4e-bfc4c64ccf0d?access_key=PMAT-01HDJYNSKJD69H9SSYD93BQC90