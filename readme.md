## SUN TASK

[![Build Status](https://travis-ci.org/IftekherSunny/SUN-TASK.svg?branch=master)](https://travis-ci.org/IftekherSunny/SUN-TASK)
[![Total Downloads](https://poser.pugx.org/sun/task/downloads)](https://packagist.org/packages/sun/task) [![Latest Stable Version](https://poser.pugx.org/sun/task/v/stable)](https://packagist.org/packages/sun/task) [![Latest Unstable Version](https://poser.pugx.org/sun/task/v/unstable)](https://packagist.org/packages/sun/task) [![License](https://poser.pugx.org/sun/task/license)](https://packagist.org/packages/sun/task)

Sun task helps you to manage your tasks easily.
 
## Installation via Composer

```
 composer create-project sun/task
```

## Remainder

Artisan command to send remaining task through email.
```
Php artisan sun-task:remainder
```

## Configuration

All of the configuration for the SUN TASK are stored in the .env file.

Setup your email id & password to send email.

```
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=email_password
```

Setup your email id & name for getting remaining task through email.

```
REMAINDER_EMAIL=your_email@gmail.com
REMAINDER_NAME=your_name
```

## Reset Dummy Data

To reset all dummy data (default database reset key is suntask) 
```
www.example.com/reset/suntask
```

## Tasks Search

###### Search by name

```
name@ your_task_name
```

###### Search by description

```
description@ your_task_description
```

###### Search by date

```
date@ your_task_date
```

###### Search by time


```
time@ your_task_time
```

## Screenshots

###### Tasks View:
![task view](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/suntask.png)

###### Task Create:
![task create](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/create.png)

###### Task Update:
![task update](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/update.png)

###### Remaining Tasks Email:
![remaining task email](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/email.png)

###### Tasks Search By Name:
![task search by name](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/searchbyname.png)

###### Tasks Search By Date:
![task search by Date](https://github.com/IftekherSunny/SUN-TASK/blob/master/public/screenshot/searchbydate.png)

## License

This apps is licensed under the [MIT License](https://github.com/IftekherSunny/SUN-TASK/blob/master/LICENSE)

