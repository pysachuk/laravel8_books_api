<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>


## Основной URL

`http://<YOU_URL>/api`

## Регистрация

Для регистрации отправляеться **POST** запрос по ссылке<br>
`http://<YOU_URL>/api/register` <br>

Параметры запроса<br>

| Параметр  |          Значение |
| ------------- | ------------- |
| name  | Ваше имя  |
| email  | Ваш E-mail  |
| password  | Ваш пароль  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

## Авторизация

Для авторизации отправляеться **POST** запрос по ссылке<br>
`http://<YOU_URL>/api/login` <br>

Параметры запроса<br> 


| Параметр  |          Значение |
| ------------- | ------------- |
| email  | Ваш E-mail  |
| password  | Ваш пароль  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |

Пример ответа:

    {
    "token_type": "Bearer",
    "token": "8|k4NhZwEjKSh01Iuy8dPHPyjMW1vx8tGNizw4QNKX"
}
    
## Деавторизация (Log out)

Для авторизации отправляеться **POST** запрос по ссылке<br>
`http://<YOU_URL>/api/logout` <br>

Параметры запроса<br> 

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |
| Authorization  | Bearer <YOU_TOKEN>  |


## Получения списка всех авторов книг

Для получения списка авторов книг отправляеться **GET** запрос по ссылке<br>
`http://<YOU_URL>/api/authors` <br>


HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |


## Получение общего списка книг

Для получения общего списка книг отправляеться **GET** запрос по ссылке<br>
`http://<YOU_URL>/api/books` <br>


HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

## Получение общего списка книг конкретного автора

Для получения общего списка книг конкретного автора отправляеться **GET** запрос по ссылке с указанием в параметре 'author' имени автора<br>
`http://<YOU_URL>/api/books/author/<AUTHOR_ID>` <br>

Параметры запроса<br> 


| Параметр  |          Значение |
| ------------- | ------------- |
| author_id  | <AUTHOR_ID>  |


HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |

## Получение списка книг (которые создал пользователь)

Для получения списка книг, которые создал пользователь отправляеться **GET** запрос по ссылке<br>
`http://<YOU_URL>/api/books/my` <br>

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept | application/json  |
| Content-Type | application/json  |
| Authorization  | Bearer <YOU_TOKEN>  |


## Создание книги

Для создания книги отправляеться **POST** запрос по ссылке<br>
`http://<YOU_URL>/api/books/create` <br>

Параметры запроса<br> 


| Параметр  |          Значение |
| ------------- | ------------- |
| title  | Название книги  |
| pages_amount  | Количество страниц  |
| annotation  | Аннтотация  |
| image  | Картинка (Строка Base64)  |
| author_id  | ID Автора (Взять из списка авторов)  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |
| Authorization  | Bearer <YOU_TOKEN>  |

## Редактирование книги

Для редактирования книги отправляеться **PATCH** запрос по ссылке  с указанием ID книги <br>
`http://<YOU_URL>/api/books/update/<book_id>`<br>

Параметры запроса <br> 


| Параметр  |          Значение |
| ------------- | ------------- |
| title  | Название книги  |
| pages_amount  | Количество страниц  |
| annotation  | Аннтотация  |
| image  | Картинка (Строка Base64)  |
| author_id  | ID Автора (Взять из списка авторов)  |

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |
| Authorization  | Bearer <YOU_TOKEN>  |

## Удаление книги

Для удаления книги отправляеться **DELETE** запрос по ссылке  с указанием ID книги <br>
`http://<YOU_URL>/api/books/delete/<book_id>`<br>

HTTP Заголовки: <br>

| Заголовок  |          Значение |
| ------------- | ------------- |
| Accept  | application/json  |
| Content-Type  | application/json  |
| Authorization  | Bearer <YOU_TOKEN>  |

