<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'dimaso-test' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=z5AoXB;CNt<?6*6V@f2GgN=!a=KkdD1RK5y@D[ycC`,MSif#mF>SugYiLIf:,a6' );
define( 'SECURE_AUTH_KEY',  '_tuZy,kJs&xD& }7>*9oq`Pf:~+aUm m}g;w{:@g=-VxN/qmp$kvg0m$a<W6Rag%' );
define( 'LOGGED_IN_KEY',    '8oz?#=.8]#*EzzdB-9fg^f]$PMJF[P6jaP1$?(NE+@W1NyQ]eMIk58C=U=1jsEKV' );
define( 'NONCE_KEY',        'WD7u?F{hQO^[H%]Fb%52?u}@9$Vvej4,2~-<24zarFZ)8hIfPC[%@tpx};y.MUoM' );
define( 'AUTH_SALT',        'Pm c1<e!nBD<3pKq=mI8{iE|C7y#JUEPkru(60GH]xpT$5ZKjM`o$r<F?ImXc*]P' );
define( 'SECURE_AUTH_SALT', 'P450t7WXVw:zuH[RY_ k+IHm!Z~O5V@c[&rZ^05W6x=qHKoI=bR`/[gdtDNcQ]h3' );
define( 'LOGGED_IN_SALT',   'Pi|G2n3?[iMNoDR*d|pRmS?woRKcN{v>/Bud)~*D+.4=>.?W *[{A;+vvr$}JoM.' );
define( 'NONCE_SALT',       'Dz7lY__X[8h1:bE@Q|_[Ji7+jP%4L|50y(n*d5[BktDjgi=gG!p%)1hMf&V//w^@' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'dt_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
