<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'ChenGitWordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', '');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8mb4');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'wT`=i8b({B<Jh)VS*XQqt_0$D9(qF_YNkX}*~mZB{Uc^t_9rpDeS-cn&YHqk@e&{');
define('SECURE_AUTH_KEY',  '*:i$*<IUZPs^[KMnPt!_>+~<^4rNf$!{@{eM.N(<O/EW<0nx_NG*_63Djq[/R12n');
define('LOGGED_IN_KEY',    'q_8TQ}6-6[xO?KO]rJ2n kQ$|DRZ$A>9f_SH9wML7+nO I<Mjg8~[4u?<$bz,Zbq');
define('NONCE_KEY',        'Oz*sffQemn86MX-rM]e&[zMqfX*RNtZ?I0n8nggQ*x`o37Jzyy>I&z?+9.z7Ir]1');
define('AUTH_SALT',        'AUh:IYbvyY6R5QCBg~FM5w_n|I5w8,4?C+!U:~>,o9t35mj!$;+,E!g|_z!A[B{X');
define('SECURE_AUTH_SALT', 'RdRT!IZ R#7Re=&a8r(Yb)/s;)_l?j.izzAu7X{P>#sG$0-3{(40kF-3<X`?f)Ub');
define('LOGGED_IN_SALT',   '/DjaF.*%L0r TTHB%m7p17 1K:`&T$Of?j1xEs#u;iyb@b8w)#]Tu{(0T=U,%qkx');
define('NONCE_SALT',       'Sd>nkPGv#u|j{BU=TSQ3*j(6`R[ao0 ZBU`.L;`A4m&LGqd=ks53N%&q?`p@J{Zl');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
