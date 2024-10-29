<?php
    if ( ! defined( 'BEAUTIFUL_STEPS_PATH' ) ) exit;
?>
<input type="hidden" id="bts-number-of-steps" name="beautiful_steps_settings[number_of_steps]" value="<?php echo $numberOfSteps ?>">

<div class="bts-container" id="bts-container">
    <?php
        $i = 0;
        foreach( $listSteps as $step ) {
            $title = $step['title'];
            $bgColor = $step['bg-color'];
            $iconColor = $step['icon-color'];
            $stepItems = $step['step'];
    ?>
    <div class="bts-step">
        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][title]"><?= $translatedText->stepTitle; ?></label>
            <input id="step-title-<?= $i; ?>" type="text" name="beautiful_steps_settings[list][<?php echo $i; ?>][title]" class="bts-text full-width max-w-500" value="<?php echo $title; ?>" />
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][bg-color]"><?= $translatedText->stepBgColor; ?></label>
            <input id="step-bg-color-<?= $i; ?>" type="text" name="beautiful_steps_settings[list][<?php echo $i; ?>][bg-color]" class="bts-text w-100 bts-color-text" value="<?php echo $bgColor; ?>" data-default-color="#E1EEF6"/>
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][icon-color]"><?= $translatedText->stepIconColor; ?></label>
            <input id="step-icon-color-<?= $i; ?>" type="text" name="beautiful_steps_settings[list][<?php echo $i; ?>][icon-color]" class="bts-text w-100 bts-color-text" value="<?php echo $iconColor; ?>" data-default-color="#adcfe4"/>
        </div>
        
        <div class="bts-guild-box">

        <?php
            $j = 0;
            foreach ($stepItems as $stepItem) {
                $itemUrl = $stepItem['url'];
                $itemDescription = $stepItem['description'];
                $itemBtnTitle = $stepItem['btn-title'];
                $icon = $stepItem['icon'];
        ?>
            <div class="bts-guild-item">
                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][url]"><?= $translatedText->post; ?></label>
                    <select id="item-url-<?= $i ?>-<?= $j; ?>" name="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][url]" value="<?php echo $itemUrl; ?>">
                        <?php
                            foreach( $posts as $post ) : setup_postdata($post);
                        ?>
                                <option value="<?php echo the_permalink(  ); ?>"><?php the_title(); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][description]"><?= $translatedText->description; ?></label>
                    <input id="item-description-<?= $i ?>-<?= $j; ?>" type="text" name="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][description]" class="bts-text w-400" value="<?php echo $itemDescription; ?>" />
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][btn-title]"><?= $translatedText->buttonText; ?></label>
                    <input id="item-btn-title-<?= $i ?>-<?= $j; ?>" type="text" name="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][btn-title]" class="bts-text w-200" value="<?php echo $itemBtnTitle; ?>" />
                </div>

                <div class="bts-img-selector">
                    <input type="hidden" value="<?= $icon?>" name="beautiful_steps_settings[list][<?php echo $i; ?>][step][<?php echo $j; ?>][icon]">
                    <?php
                        echo '<button class="bts-btn-img" id="bts-btn-' . $i .'-'. $j .'">' . $translatedText->chooseImage .'</button>';
                    ?>
                    <img id="bts-img-<?= $i ?>-<?= $j ?>" src="<?= $icon?>" alt="" class="bts-img">
                </div>
            </div>
        <?php
                $j ++;
            } 
        ?>

        </div>

        <div>
            <a href="javascript:void(0)" index="<?= $i; ?>" class="bts-btn bts-btn--error btn-delete"><?= $translatedText->deleteStep; ?> <?= ($i + 1) ?></a>
        </div>
    </div>

    <?php
            $i ++;
        }
    ?>
        
</div>
