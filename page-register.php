<?php
/**
 * Template Name: Register Page
 */

if (!defined('ABSPATH')) {
    exit;
}

if (is_user_logged_in()) {
    wp_safe_redirect(function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url());
    exit;
}

$register_errors = array();

// Process Custom Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['custom_register'])) {

    // 1. Rate Limiting
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    $transient_key = 'register_rate_limit_' . md5($ip);
    $attempts = (int) get_transient($transient_key);

    if ($attempts >= 5) {
        $register_errors[] = __('Too many registration attempts. Please try again later.', 'my-esport-theme');
    } else {
        // 2. Verify Nonce
        if (!isset($_POST['custom_register_nonce']) || !wp_verify_nonce($_POST['custom_register_nonce'], 'custom_register_action')) {
            $register_errors[] = __('Security check failed. Please try again.', 'my-esport-theme');
        }


        // 4. Validate Inputs
        $username = isset($_POST['username']) ? sanitize_user(wp_unslash($_POST['username'])) : '';
        $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
        $password = isset($_POST['password']) ? wp_unslash($_POST['password']) : '';
        $password_confirm = isset($_POST['password_confirm']) ? wp_unslash($_POST['password_confirm']) : '';

        if (empty($register_errors)) {
            if (empty($username)) {
                $register_errors[] = __('Please enter a username.', 'my-esport-theme');
            } elseif (!validate_username($username)) {
                $register_errors[] = __('Please enter a valid username.', 'my-esport-theme');
            } elseif (username_exists($username)) {
                $register_errors[] = __('This username is already taken.', 'my-esport-theme');
            }

            if (empty($email) || !is_email($email)) {
                $register_errors[] = __('Please provide a valid email address.', 'my-esport-theme');
            } elseif (email_exists($email)) {
                $register_errors[] = __('An account is already registered with your email address. Please log in.', 'my-esport-theme');
            }

            if (empty($password)) {
                $register_errors[] = __('Please enter an account password.', 'my-esport-theme');
            } elseif (strlen($password) < 8) {
                $register_errors[] = __('Password must be at least 8 characters long.', 'my-esport-theme');
            } elseif ($password !== $password_confirm) {
                $register_errors[] = __('Passwords do not match.', 'my-esport-theme');
            }
        }

        // 5. Create User
        if (empty($register_errors)) {
            $user_id = wp_create_user($username, $password, $email);

            if (is_wp_error($user_id)) {
                $register_errors[] = $user_id->get_error_message();
            } else {
                // Set role to customer if WooCommerce is active, otherwise default role
                $user = new WP_User($user_id);
                $user->set_role('customer');

                // Automatically log in
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);

                // Clear rate limit on success
                delete_transient($transient_key);

                // Redirect
                $redirect_url = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('myaccount') : home_url();
                wp_safe_redirect($redirect_url);
                exit;
            }
        }

        // If there were errors, record attempt
        if (!empty($register_errors)) {
            set_transient($transient_key, $attempts + 1, 15 * MINUTE_IN_SECONDS);
        }
    }
}

get_header();
?>

<main class="main-content">
    <section class="category-section" style="padding-top: var(--space-4xl); padding-bottom: var(--space-4xl);">
        <div class="container">
            <header class="page-header" style="text-align: center; margin-bottom: var(--space-4xl);">
                <h1 class="section-heading"><?php esc_html_e('Register', 'my-esport-theme'); ?></h1>
            </header>

            <div class="woocommerce">
                <div class="woocommerce-account">
                    <?php
                    if (function_exists('wc_print_notices')) {
                        wc_print_notices();
                    }
                    ?>

                    <?php if (!empty($register_errors)): ?>
                        <ul class="woocommerce-error" role="alert">
                            <?php foreach ($register_errors as $error): ?>
                                <li><?php echo esc_html($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <form method="post" class="woocommerce-form woocommerce-form-register register">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_username"><?php esc_html_e('Username', 'my-esport-theme'); ?>&nbsp;<span
                                    class="required" aria-hidden="true">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                name="username" id="reg_username" autocomplete="username"
                                value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"
                                required aria-required="true" />
                        </p>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email"><?php esc_html_e('Email address', 'my-esport-theme'); ?>&nbsp;<span
                                    class="required" aria-hidden="true">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text"
                                name="email" id="reg_email" autocomplete="email"
                                value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"
                                required aria-required="true" />
                        </p>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_password"><?php esc_html_e('Password', 'my-esport-theme'); ?>&nbsp;<span
                                    class="required" aria-hidden="true">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                                name="password" id="reg_password" autocomplete="new-password" required
                                aria-required="true" />
                        </p>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label
                                for="reg_password_confirm"><?php esc_html_e('Confirm Password', 'my-esport-theme'); ?>&nbsp;<span
                                    class="required" aria-hidden="true">*</span></label>
                            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                                name="password_confirm" id="reg_password_confirm" autocomplete="new-password" required
                                aria-required="true" />
                        </p>



                        <p class="woocommerce-form-row form-row">
                            <?php wp_nonce_field('custom_register_action', 'custom_register_nonce'); ?>
                            <button type="submit"
                                class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                name="custom_register"
                                value="<?php esc_attr_e('Register', 'my-esport-theme'); ?>"><?php esc_html_e('Register', 'my-esport-theme'); ?></button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
