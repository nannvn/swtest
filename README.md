


## Installation Requirements:

- Ubuntu
- PHP 7.4.3
- MySQL 8.0.29


## Notes:

Added to /etc/mysql/my.cnf to be able to insert datetimes with zeros (0000-00-00 00:00:00):
```
[mysqld]

sql_mode=ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION
```

