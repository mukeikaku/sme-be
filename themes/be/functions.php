<?php

define('NO_IMAGE', esc_url(get_template_directory_uri()).'/assets/images/noimage.png');

/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */

function theme_setup()
{
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 9999);
}
add_action('after_setup_theme', 'theme_setup');


if (!function_exists('twentytwentytwo_support')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function twentytwentytwo_support()
    {
        // Add support for block styles.
        add_theme_support('wp-block-styles');

        // Enqueue editor styles.
        add_editor_style('style.css');
    }

endif;

add_action('after_setup_theme', 'twentytwentytwo_support');

if (!function_exists('twentytwentytwo_styles')) :

    /**
     * Enqueue styles.
     *
     * @since Twenty Twenty-Two 1.0
     *
     * @return void
     */
    function twentytwentytwo_styles()
    {
        // Register theme stylesheet.
        $theme_version = wp_get_theme()->get('Version');

        $version_string = is_string($theme_version) ? $theme_version : false;
        wp_register_style(
            'twentytwentytwo-style',
            get_template_directory_uri() . '/style.css',
            array(),
            $version_string
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style('twentytwentytwo-style');
        wp_enqueue_style('twentytwenty-add-style', get_template_directory_uri() . '/customize-style.css', null, $version_string);
    }

endif;

add_action('wp_enqueue_scripts', 'twentytwentytwo_styles');

// Add block patterns
// require get_template_directory() . '/inc/block-patterns.php';

add_action('wp_enqueue_scripts', 'remove_global_styles');
function remove_global_styles()
{
    wp_dequeue_style('global-styles');
}

// 投稿 -> NEWS
function Change_menulabel()
{
    global $menu;
    global $submenu;
    $name = 'NEWS';
    $menu[5][0] = $name;
    $submenu['edit.php'][5][0] = $name . '一覧';
    $submenu['edit.php'][10][0] = '新しい' . $name;
}
function Change_objectlabel()
{
    global $wp_post_types;
    $name = 'NEWS';
    $labels = &$wp_post_types['post']->labels;
    $labels->name = $name;
    $labels->singular_name = $name;
    $labels->add_new = _x('追加', $name);
    $labels->add_new_item = $name . 'の新規追加';
    $labels->edit_item = $name . 'の編集';
    $labels->new_item = '新規' . $name;
    $labels->view_item = $name . 'を表示';
    $labels->search_items = $name . 'を検索';
    $labels->not_found = $name . 'が見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
}
add_action('init', 'Change_objectlabel');
add_action('admin_menu', 'Change_menulabel');

add_filter('two_factor_providers', function ($providers) {
    $rtn = [];
    foreach ($providers as $k => $v) {
        if ($k === "Two_Factor_Email") {
            $rtn["Two_Factor_Email"] = $v;
        }
    }
    return $rtn;
});


remove_action('template_redirect', 'wp_redirect_admin_locations', 1000);

function svg($name)
{
    $content = file_get_contents(TEMPLATEPATH.'/assets/images/'.$name.'.svg');
    return $content;
}

class Security
{
    private static $instance;
    private $err = [];

    private function __construct()
    {
        $this->init_callback();
    }

    public static function init(): void
    {
        if (!isset(self::$instance)) {
            self::$instance = new Security();
        }
    }

    public function init_callback(): void
    {
        // ダッシュボードにセキュリティウィジェットを追加
        add_action('wp_dashboard_setup', [$this, 'add_widget']);

        // 自動アップデートを無効
        define('AUTOMATIC_UPDATER_DISABLED', true);

        // PHPバージョンを非表示
        header_register_callback(function () {
            header_remove('X-Powered-By');
        });

        /**
         * Disable xmlrpc.php
         */
        add_filter('xmlrpc_enabled', '__return_false');

        // ピンバックの非表示
        add_filter('wp_headers', function (array $headers) {
            unset($headers['X-Pingback']);
            return $headers;
        });

        // ピンバックを無効
        add_filter("xmlrpc_methods", function (array $methods) {
            unset($methods["pingback.ping"]);
            return $methods;
        });

        // wp-login.phpへのリダイレクト禁止

        // authorページを無効
        add_filter('author_rewrite_rules', '__return_empty_array');

        // REST APIのリンクを非表示
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);
    }

    public function add_widget(): void
    {
        $this->check_security();
        if (!empty($this->err)) {
            wp_add_dashboard_widget('security', 'サイトセキュリティ', [$this, 'custom_widget_callback']);
        }
    }

    public function custom_widget_callback(): void
    {
        echo '<ul style="color:red;">';
        foreach ($this->err as $err) {
            echo '<li>' . $err . '</li>';
        }
        echo '</ul>';
    }

    public function check_security(): void
    {
        $this->check_environment_type();
        if (in_array(wp_get_environment_type(), ['production'])) {
            $this->check_wp_debug();
            $this->check_user_name();
            $this->check_noindex();
            $this->check_salt();
            $this->check_wp_config();
            $this->check_htaccess_permission();
        }
    }

    public function check_environment_type(): void
    {
        if (!defined('WP_ENVIRONMENT_TYPE')) {
            $this->err[] = 'WP_ENVIDONMENT_TYPEを設定してください。';
        }
    }

    public function check_wp_debug(): void
    {
        if (defined('WP_DEBUG') && WP_DEBUG === true) {
            $this->err[] = 'WP_DEBUGが有効になっています。';
        }
    }

    public function check_user_name(): void
    {
        $users = get_users();
        if (!empty($users)) {
            foreach ($users as $user) {
                if (in_array($user->data->user_login, ['admin', 'root', 'user'])) {
                    $this->err[] = 'ユーザー「<strong>' . $user->data->user_login . '</strong>」が存在します。削除してください。';
                }
            }
        }
    }

    public function check_noindex(): void
    {
        if (get_option('blog_public') === "0") {
            $this->err[] = 'noindexからチェックを外してください';
        }
    }

    public function check_salt(): void
    {
        $keys = [
            'AUTH_KEY',
            'SECURE_AUTH_KEY',
            'LOGGED_IN_KEY',
            'NONCE_KEY',
            'AUTH_SALT',
            'SECURE_AUTH_SALT',
            'LOGGED_IN_SALT',
            'NONCE_SALT'
        ];
        foreach ($keys as $key) {
            if (!(defined($key) || empty(constant($key)) || constant($key) === 'put your unique phrase here')) {
                $this->err[] = $key . 'がデフォルト、または空白、または定義されていません。wp-config.phpに設定してください。ユニークな値を<a href="https://api.wordpress.org/secret-key/1.1/salt/" target="_blank">こちら</a>から取得できます。';
            }
        }
    }


    public function check_wp_config(): void
    {
        if (file_exists(ABSPATH . 'wp-config-sample.php')) {
            $this->err[] = 'wp-config-sample.phpが存在しています。削除してください。';
        }
        if (file_exists(ABSPATH . 'wp-config.php') && !in_array(substr(sprintf('%o', fileperms(ABSPATH . 'wp-config.php')), -4), ['0400', '600'])) {
            $this->err[] = 'wp-config.phpのパーミッションを400または600に設定してください。';
        }
    }

    public function check_htaccess_permission(): void
    {
        global $is_apache;
        if ($is_apache && file_exists(ABSPATH . '.htaccess') && !in_array(substr(sprintf('%o', fileperms(ABSPATH . '.htaccess')), -4), ['604', '606'])) {
            $this->err[] = '.htaccessのパーミッションを604または606に設定してください。';
        }
    }
}

Security::init();

class RedirectTo404
{
    private static $instance;

    private function __construct()
    {
        // trueを404にする
        add_filter('init', [$this, 'init_callback']);
    }

    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new RedirectTo404();
        }
    }

    public function init_callback(): void
    {
        add_action('template_redirect', [$this, 'blacklist_404']);

        // 念の為、埋め込み・アタッチメント・トラックバック・ユーザー登録画面のリライトルールを削除する
        add_filter('rewrite_rules_array', [$this, 'delete_unnecessary_rewrite_rules']);
    }

    public function blacklist_404(): void
    {
        global $wp_query;
        switch (true) {
                #case is_post_type_archive('post_type_name'):
                #case is_tax('tax_name'):
                #case is_category():
                #case is_tag():
            case is_search(): // 検索結果ページ
            case is_date(): // 日付アーカイブ
            case is_feed(): // フィード
            case is_attachment(): // アタッチメントページ
            case is_trackback(): // トラックバック
            case is_embed(): // 埋め込み
            case is_author(): // 著者ページ
            case is_tax('category_business', '11'):
                $wp_query->set_404();
                status_header(404);
                break;
        }
    }

    public function delete_unnecessary_rewrite_rules(array $rules): array
    {
        foreach ($rules as $k => $rule) {
            if (preg_match('/(embed=true|attachment=|tb=1|register=true)/', $rule)) {
                unset($rules[$k]);
            }
        }
        return $rules;
    }
}

RedirectTo404::init();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST["recaptchaToken"]) && !empty($_POST["recaptchaToken"])) {
        var_dump($_POST['recaptchaToken']);
        $res_json = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeXyBAkAAAAABQsLTbwsw_iF_Vl64u7bssdB6Sd&response=" . $_POST["recaptchaToken"]);
        $res = json_decode($res_json);
        var_dump($res);
        die();
        if($res->success) {	// 認証成功
            if($res->score > 0.5) {
                // 0.5点より上は正常処理
            } else {
                // スパム判定
            }
        } else {
            // 認証エラー
        }
    }
}
