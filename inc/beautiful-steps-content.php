<?php
// add content
    function beautiful_steps_add_content() {
        global $beautiful_steps_options;
        $listSteps = $beautiful_steps_options['list'];
        $mainColor = $beautiful_steps_options['main-color'];
        ob_start();

        $translatedText = (object) [
            'step' => __('Step', 'beautiful-steps'),
            'defaultButton' => __('Read more', 'beautiful-steps'), 
        ];
        ?>
            <div class="study-infor">
            <?php
                $i = 0;
                $stepNumber = 0;
                foreach( $listSteps as $step ) {
                    $title = $step['title'];
                    $bgColor = $step['bg-color'];
                    $iconColor = $step['icon-color'];
                    $stepItems = $step['step'];
                    if (strlen(trim($title)) != 0) {
                        $stepNumber++;
                ?>
                        <div class="step">
                            <h4 class="step__title" style="color: <?= $mainColor ?>">
                                <?= $translatedText->step; ?> <?= $stepNumber ?>
                                <span></span>
                            </h4>
                            <div class="guild-box">
                                <div class="guild-box__content" style="background-color: <?= $bgColor ?>">
                                    <h5 class="guild-box__title">
                                        <?= $title ?>
                                    </h5>
                                    <div class="guild-list">
                                        <?php
                                            $j = 0;
                                            foreach ($stepItems as $stepItem) {
                                                $itemUrl = $stepItem['url'];
                                                $itemDescription = $stepItem['description'];
                                                $itemBtnTitle = $stepItem['btn-title'];
                                                $icon = $stepItem['icon'];

                                                if ($itemBtnTitle == '') {
                                                    $itemBtnTitle = $translatedText->defaultButton;
                                                }
                                                if (strlen(trim($itemDescription)) != 0) {
                                        ?>
                                            <div class="guild-item">
                                                <div class="guild-item__summary">
                                                    <img class="guild-item__featured-image" style="background-color: <?= $iconColor ?>" src="<?= $icon ?>" alt="guild 1">
                                                    <div class="guild-item__short-description">
                                                        <?= $itemDescription ?>
                                                    </div>
                                                </div>
                                                <a
                                                    href="<?= $itemUrl ?>" 
                                                    class="guild-item__btn" 
                                                    style="color: <?= $mainColor ?> !important; border-color: <?= $mainColor ?>;"
                                                    onMouseOver="this.style.color='white'; this.style.backgroundColor='<?= $mainColor ?>'"
                                                    onMouseOut="this.style.color='<?= $mainColor ?>'; this.style.backgroundColor='transparent'"
                                                >
                                                    <?= $itemBtnTitle ?>
                                                </a>
                                            </div>

                                        <?php
                                                }
                                                $j ++;
                                            } 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    $i ++;
                }
            ?>
                <div class="divider"></div>
            </div>
            
        <?php
        global $bts_shortcode;
        $bts_shortcode = $bts_shortcodes  = ob_get_clean();
        $bts_shortcode_out = $bts_shortcodes;
        return $bts_shortcode_out;
    }

    function beautiful_steps_shortcodes_init(){
        add_shortcode( 'bts_shortcode', 'beautiful_steps_add_content' );
    }
    add_action('init', 'beautiful_steps_shortcodes_init');
?>