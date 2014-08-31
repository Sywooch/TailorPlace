CREATE TABLE `users` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `login` varchar(30) NOT NULL COMMENT 'Логин пользователя',
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL COMMENT 'Хэш пароля пользователя',
    `auth_key` varchar(32) NOT NULL COMMENT 'Ключ аутентификации пользователя',
    `name` varchar(100) DEFAULT NULL COMMENT 'Имя пользователя (опционально)',
    `status` enum('ok','not confirmed','banned') NOT NULL DEFAULT 'not confirmed' COMMENT 'Статус пользователя (нормальный, не подтвердил авторизацию, забанен)',
    `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Дата создания',
    `update_time` timestamp NULL DEFAULT NULL COMMENT 'Дата обновления',
    `country_id` int(10) unsigned DEFAULT NULL COMMENT 'id страны пользователя',
    `city_id` int(10) unsigned DEFAULT NULL COMMENT 'id города пользователя',
    `currency_code` enum('RUR','USD','EUR','CNY','TRY','JPY') NOT NULL DEFAULT 'RUR',
    PRIMARY KEY (`id`),
    UNIQUE KEY `userscol_UNIQUE` (`login`),
    UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8