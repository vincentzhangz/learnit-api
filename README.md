# Learnit API

this api for learnit :)

## Installation

Make sure you have python3 & turn on your mysql from xampp or another app.

```bash
python run.py
```

## Re-Usage

```
php artisan serve --port 80
```

## Documentation

Make Sure you have postman for check, or you can use another app to check the api

base_path: **localhost/api/v1/**
default requests:

***Accept: application/json***

***Authorization: Bearer {token}***

- ## USER
  - **/login** [POST] for get token and authentication ,**[form data: email,password]**
  - **/register** [POST] for register,**[form data: username,email,gender,role,password]**
  - **/user**  [GET] for get user by bearier token
  - **/alluser**  [GET] for get all user
  - **/user/{email}**  [GET] for get user by email
- ## Course
  - **/course/getcourse** [GET] for get all course
  
   



## Author
SK, VC, CT, IX
