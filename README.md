# cat-zavod
## Тестовое задание от компании 'Интерактивные технологии': ##

* Общение с бекендом только посредством rest api.
* Взять за основу простейшую модель (любую на выбор, например кот 🙂 ).
* На сервисе должна быть предусмотрена возможность регистрации пользователя в качестве заводчика кота :).
* Авторизация и аутентификация происходит посредством oauth2 (библиотека django-oauth-toolkit).
* Заводчик имеет возможность создавать кота, удалять кота, редактировать параметры кота(любые). Например имя, возраст, породу и волосатость.
* Соответственно заводчики имеют право видеть и редактировать только своих котов.
* Для общения с бекендом можно использовать angular resource.
* Для создания интерфейса можно использовать Angular Material.
* База данных - MySQL.
# Схема фп. #

cat-zavod<br>
├── assets<br>
│   ├── css<br>
│   |   ├── 404.css<br>
│   |   ├── auth.css<br>
│   |   └── style.css<br>
│   └── js<br>
│       └── main.js<br>
├── config/<br>
│   └── ConfigClass.php<br>
├── db/<br>
│   ├── DatabaseClass.php<br>
│   └── main_query.php<br>
├── lib/<br>
│   ├── auth.php<br>
│   ├── create.php<br>
│   ├── list.php<br>
│   ├── logout.php<br>
│   ├── register.php<br>
│   ├── update.php<br>
│   └── view.php<br>
├── pages<br>
│   ├── create.php<br>
│   ├── list.php<br>
│   ├── update.php<br>
│   └── view.php<br>
├── .gitignore<br>
├── 404.php<br>
├── ajax-delete.php<br>
├── auth.php<br>
├── footer.php<br>
├── header.php<br>
├── index.php<br>
├── READ.me<br>
└── register.php<br>
