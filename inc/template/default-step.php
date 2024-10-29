<?php
    if ( ! defined( 'BEAUTIFUL_STEPS_PATH' ) ) exit;
?>

<input type="hidden" id="bts-number-of-steps" name="beautiful_steps_settings[number_of_steps]" value="1">
<div class="bts-container" id="bts-container">
    <div class="bts-step">
        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][0][title]"><?= $translatedText->stepTitle; ?></label>
            <input id="step-title-0" type="text" name="beautiful_steps_settings[list][0][title]" class="bts-text full-width max-w-500" value="" />
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][0][bg-color]"><?= $translatedText->stepBgColor; ?></label>
            <input id="step-bg-color-0" type="text" name="beautiful_steps_settings[list][0][bg-color]" class="bts-text w-100 bts-color-text" value="#E1EEF6" data-default-color="#E1EEF6"/>
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][0][icon-color]"><?= $translatedText->stepIconColor; ?></label>
            <input id="step-icon-color-0" type="text" name="beautiful_steps_settings[list][0][icon-color]" class="bts-text w-100 bts-color-text" value="#adcfe4" data-default-color="#adcfe4"/>
        </div>

        <div class="bts-guild-box">
            <div class="bts-guild-item">
                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][0][url]"><?= $translatedText->post; ?></label>
                    <select id="item-url-0-0" name="beautiful_steps_settings[list][0][step][0][url]">
                        <?php
                            foreach( $posts as $post ) : setup_postdata($post);
                        ?>
                                <option value="<?php echo the_permalink(  ); ?>"><?php the_title(); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][0][description]"><?= $translatedText->description; ?></label>
                    <input id="item-description-0-0" type="text" name="beautiful_steps_settings[list][0][step][0][description]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][0][btn-title]"><?= $translatedText->buttonText; ?></label>
                    <input id="item-btn-title-0-0" type="text" name="beautiful_steps_settings[list][0][step][0][btn-title]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-img-selector">
                    <input type="hidden" value="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" name="beautiful_steps_settings[list][0][step][0][icon]">
                    <?php
                        echo '<button class="bts-btn-img" id="bts-btn-0-0">' . $translatedText->chooseImage .'</button>';
                    ?>
                    <img id="bts-img-0-0" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" alt="" class="bts-img">
                </div>
            </div>

            <div class="bts-guild-item">
                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][1][url]"><?= $translatedText->post; ?></label>
                    <select id="item-url-0-1" name="beautiful_steps_settings[list][0][step][1][url]">
                        <?php
                            foreach( $posts as $post ) : setup_postdata($post);
                        ?>
                                <option value="<?php echo the_permalink(  ); ?>"><?php the_title(); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][1][description]"><?= $translatedText->description; ?></label>
                    <input id="item-description-0-1" type="text" name="beautiful_steps_settings[list][0][step][1][description]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][1][btn-title]"><?= $translatedText->buttonText; ?></label>
                    <input id="item-btn-title-0-1" type="text" name="beautiful_steps_settings[list][0][step][1][btn-title]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-img-selector">
                    <input type="hidden" value="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" name="beautiful_steps_settings[list][0][step][1][icon]">
                    <?php
                        echo '<button class="bts-btn-img" id="bts-btn-0-1">' . $translatedText->chooseImage . '</button>';
                    ?>
                    <img id="bts-img-0-1" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" alt="" class="bts-img">
                </div>
            </div>

            <div class="bts-guild-item">
                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][2][url]"><?= $translatedText->post; ?></label>
                    <select id="item-url-0-2"  name="beautiful_steps_settings[list][0][step][1][url]">
                        <?php
                            foreach( $posts as $post ) : setup_postdata($post);
                        ?>
                                <option value="<?php echo the_permalink(  ); ?>"><?php the_title(); ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][2][description]"><?= $translatedText->description; ?></label>
                    <input id="item-description-0-2" type="text" name="beautiful_steps_settings[list][0][step][2][description]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][0][step][2][btn-title]"><?= $translatedText->buttonText; ?></label>
                    <input id="item-btn-title-0-2" type="text" name="beautiful_steps_settings[list][0][step][2][btn-title]" class="bts-text w-200" value="" />
                </div>

                <div class="bts-img-selector">
                    <input type="hidden" value="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" name="beautiful_steps_settings[list][0][step][2][icon]">
                    <?php
                        echo '<button class="bts-btn-img" id="bts-btn-0-2">' . $translatedText->chooseImage . '</button>';
                    ?>
                    <img id="bts-img-0-2" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" alt="" class="bts-img">
                </div>
            </div>
        </div>
    </div>
</div>
