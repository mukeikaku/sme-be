<?php

namespace Theme;

use Aws\Exception\AwsException;
use Aws\CloudFront\CloudFrontClient;

use Theme\Notification;

class CloudFrontCacheClear
{
    private static $instance;

    private $notification;

    private function __construct()
    {
        add_filter('init', [$this, 'init_callback']);
        add_action('transition_post_status', [$this, 'on_transition'], 10, 3);
    }

    public static function init(): void
    {
        if (!isset(self::$instance)) {
            self::$instance = new CloudFrontCacheClear();
        }
    }

    public function init_callback(): void
    {
        // if (in_array(wp_get_environment_type(), ['production'])) {
        add_action('clear_cloudfront_cache', [$this, 'clear_cloudfront_cache']);

        // キャッシュクリアダッシュボードウィジェットを追加
        add_action('wp_dashboard_setup', [$this, 'add_widget']);
        // }
    }

    public function on_transition($new_status, $old_status, $post)
    {
        if (!$this->should_invalidate($new_status, $old_status)) {
            return;
        }
        $this->clear_cloudfront_cache();
    }

    public function should_invalidate($new_status, $old_status)
    {
        if ('publish' === $new_status) {
            // if publish or update posts.
            $result = true;
        } elseif ('publish' === $old_status && $new_status !== $old_status) {
            // if un-published post.
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function clear_cloudfront_cache(): void
    {
        $client = new CloudFrontClient([
            'version' => AWS_CLOUDFRONT_CACHE_CLEAR_CLIENT_VERSION,
            'region' => AWS_CLOUDFRONT_CACHE_CLEAR_REGION,
            'credentials' => [
                'key' => AWS_CLOUDFRONT_CACHE_CLEAR_IAM_ACCESS_KEY_ID,
                'secret' => AWS_CLOUDFRONT_CACHE_CLEAR_IAM_SECRET_ACCESS_KEY,
            ],
        ]);

        try {
            $result = $client->createInvalidation([
                'DistributionId' => AWS_CLOUDFRONT_CACHE_CLEAR_DISTRIBUTION_ID, // REQUIRED
                'InvalidationBatch' => [ // REQUIRED
                    'CallerReference' => $this->generateRandomString(16), // REQUIRED
                    'Paths' => [ // REQUIRED
                        'Items' => ['/'], // items or paths to invalidate
                        'Quantity' => 1 // REQUIRED (must be equal to the number of 'Items' in the previus line)
                    ]
                ]
            ]);
        } catch (AwsException $e) {
            error_log($e);
        }
    }

    public function add_widget(): void
    {
        wp_add_dashboard_widget('rerun-github-actions', 'CloudFrontキャッシュクリア', [$this, 'custom_widget_callback']);
    }

    public function custom_widget_callback(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['clear_cloudfront_cache'])) {
            $this->clear_cloudfront_cache();
        }
        echo <<< MSG_EOF
        <form action="" method="POST">
         <button class="button button-primary" name="clear_cloudfront_cache" value="true">CloudFrontのキャッシュをクリア</button>
        </form>
        MSG_EOF;
    }
}
