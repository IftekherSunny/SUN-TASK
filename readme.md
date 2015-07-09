## SUN TASK

Sun task helps you to manage your tasks easily.
 
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
