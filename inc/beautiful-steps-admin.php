

<?php
    if ( ! defined( 'BEAUTIFUL_STEPS_PATH' ) ) exit;
    function beautiful_steps_plugin() {
        global $beautiful_steps_options;
        global $post;
        $args = array( 'numberposts' => -1);
        $posts = get_posts($args);
        $sessionPosts = array();
        $sessionPostIndex = 0;
        foreach( $posts as $post ) : setup_postdata($post);
            $permalink = get_permalink();
            $title = get_the_title(  );
            $sessionPosts[$sessionPostIndex] = $title. '?+' .$permalink;
            $sessionPostIndex ++;
        endforeach;
        $translatedText = (object) [
            'pluginTitle' => __('Beautiful Steps Settings', 'beautiful-steps'),
            'pluginSubTitle' => __('(Step won\'t be displayed if its title is empty)', 'beautiful-steps'),
            'stepTitle' => __('Title:', 'beautiful-steps'),
            'stepBgColor' => __('Background color:', 'beautiful-steps'),
            'stepIconColor' => __('Icon color:', 'beautiful-steps'),
            'chooseImage' => __('Choose image', 'beautiful-steps'),
            'post' => __('Post:', 'beautiful-steps'),
            'description' => __('Short description:', 'beautiful-steps'),
            'buttonText' => __('Button text:', 'beautiful-steps'),
            'addStep' => __('Add Step', 'beautiful-steps'),
            'deleteStep' => __('Delete Step', 'beautiful-steps'),
            'save' => __('Save', 'beautiful-steps'),
            'primaryColor' => __('Primary Color:', 'beautiful-steps'),
            'deleteConfirmation' => __('Do you want to delete this step?', 'beautiful-steps'),
        ];
        ob_start(); ?>
            <p style="display: none;" id="btsPosts">
                <?= '' . join('+?+', $sessionPosts) ?>
            </p>
            <input type="hidden" id="step-title" value="<?= $translatedText->stepTitle ?>">
            <input type="hidden" id="step-bg-color" value="<?= $translatedText->stepBgColor ?>">
            <input type="hidden" id="step-icon-color" value="<?= $translatedText->stepIconColor ?>">
            <input type="hidden" id="step-choose-img" value="<?= $translatedText->chooseImage ?>">
            <input type="hidden" id="step-post" value="<?= $translatedText->post ?>">
            <input type="hidden" id="step-description" value="<?= $translatedText->description ?>">
            <input type="hidden" id="step-button-text" value="<?= $translatedText->buttonText ?>">
            <input type="hidden" id="step-add" value="<?= $translatedText->addStep ?>">
            <input type="hidden" id="step-delete" value="<?= $translatedText->deleteStep ?>">
            <input type="hidden" id="step-delete-confirmation" value="<?= $translatedText->deleteConfirmation ?>">
            <div class="wrap" style="font-size:15px;">
                <h2 class="bts"><?= $translatedText->pluginTitle; ?> <?= $translatedText->pluginSubTitle; ?></h2>
                <div class="btn-donate" for="donate-section">
                    <?php _e('Do you like it? Donate me! (^_^) Click here! Click here!', 'beautiful-steps') ?>
                </div>
                <div class="donate-section" id="donate-section" style="display: none;">
                    <div>Momo: <a href="https://nhantien.momo.vn/Kv3CFQhyMXk">0783550324 - Phan Thế Anh</a></div>
                    <div>Paypal: <a href="https://www.paypal.com/paypalme/andrewphanuit">Anh Phan</a></div>
                </div>
                <br />
                <div class="btn-donate" for="contact-section">
                    <?php _e('You have design or want to clone from other pages? Contact me! Lowest price is 5$, up to 20$! Life time. Click here! Click here!', 'beautiful-steps') ?>
                </div>
                <div class="donate-section" id="contact-section" style="display: none;">
                    <div>Email: <a href="mailto:andrew.phan.uit@gmail.com">andrew.phan.uit@gmail.com</a></div>
                </div>
                <div class="donate-section" id="contact-section">
                    <div>Shortcode: [bts_shortcode]</div>
                </div>
                <form method="POST" action="options.php">
                    <div style="margin-top: 20px;" class="bts-flex bts-flex--center">
                        <label class="bts-lb" for="beautiful_steps_settings[main-color]"><b><?= $translatedText->primaryColor; ?></b></label>
                        <input type="text" name="beautiful_steps_settings[main-color]" class="bts-text w-100 bts-color-text" value="#96C492" data-default-color="#96C492"/>
                    </div>
                    <?php
                        settings_fields('beautiful_steps_settings_group');
                        $numberOfSteps = $beautiful_steps_options['number_of_steps'];
                        $listSteps = $beautiful_steps_options['list'];
                        if (!isset($numberOfSteps) || $numberOfSteps < 1 || !isset($listSteps)) {
                            include(BEAUTIFUL_STEPS_PATH . 'inc/template/default-step.php');
                        } else {
                            include(BEAUTIFUL_STEPS_PATH . 'inc/template/generated-steps.php');
                        }
                    ?>
                    <div>
                        <button id="btn-add-step" class="bts-btn bts-btn--warning"><?= $translatedText->addStep; ?></button>
                    </div>
                    <div class="submit">
                        <input type="submit" class="button-primary" id="bts-save" value="<?= $translatedText->save; ?>" >
                    </div>
                </form>
            </div>
        <?php
        echo ob_get_clean();
    }

    // Thêm plugin vào menu
    function beautiful_steps_plugin_setup_menu() {
        add_menu_page( 'Beautiful Steps', "Beautiful Steps", "manage_options", "beautiful-steps", "beautiful_steps_plugin" );
    }
    add_action('admin_menu', 'beautiful_steps_plugin_setup_menu');

    // add thong tin vao database
	function beautiful_steps_register_settings() {
		register_setting('beautiful_steps_settings_group', 'beautiful_steps_settings');
	}
    add_action('admin_init', 'beautiful_steps_register_settings');
?>