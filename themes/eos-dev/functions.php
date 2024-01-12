<?php

//removes wordpress admin bar
add_filter('show_admin_bar', '__return_false');

//Get theme image
function getThemeImage($image)
{
    $path = '/dist/img/' . $image;
    return get_template_directory_uri() . $path;
}

//Get theme doc
function getThemeDoc($doc)
{
    $path = '/dist/doc/' . $doc;
    return get_template_directory_uri() . $path;
}

//Register and enqueue the scripts
function registerScripts()
{
    $path = get_template_directory_uri() . '/dist/js/';
    //Removes the default wordpress jquery script
    wp_deregister_script('jquery');

    wp_register_script('jquery', $path . 'jquery.min.js', array(), '3.7.1', true);
    wp_enqueue_script('jquery');

    wp_register_script('typeit', $path . 'typeit.min.js', array(), '8.7.1', true);
    wp_enqueue_script('typeit');

    wp_register_script('eos-dev', $path . 'eos-dev.js', array(), '1.0.0', true);
    wp_enqueue_script('eos-dev');
}

add_action('wp_enqueue_scripts', 'registerScripts');

//Register and enqueue the CSS styles
function registerStyles()
{
    $path = get_template_directory_uri() . '/dist/style/';
    wp_register_style('normalize', $path . 'normalize.min.css', array(), false, false);
    wp_enqueue_style('normalize');

    wp_register_style('eos-dev', $path . 'eos-dev.css', array(), false, false);
    wp_enqueue_style('eos-dev');
}
add_action('wp_enqueue_scripts', 'registerStyles');

//Render professional experiences tabs
function renderExperiencesTabs()
{
    $query = new \WP_Query(['post_type' => 'experiencia', 'order' => 'asc', 'orderby' => 'date', 'post_status' => 'publish', 'posts_per_page' => -1]);
    $posts = $query->posts;
    ?>

    <div class="c-tabs js-tabs">
        <div class="l-flex l-flex--center l-flex--wrap l-flex--stretch l-flex--negative">

            <nav class="c-tab__nav ">
                <div class="l-flex l-flex--center l-flex--vertical l-flex--stretch c__full-height">
                    <?php
                    foreach ($posts as $key => $post) {
                        $count = $key + 1;
                        ?>

                        <div class="c-tab__nav-link <?= 1 == $count ? 'active' : '' ?> js-tab-link" tab-id="<?= $count ?>">
                            <h3>
                                <?= $post->post_title ?>
                            </h3>
                        </div>

                    <?php } ?>
                </div>
            </nav>

            <div class="c-tab__content-wrapper">

                <?php
                $count = 1;
                foreach ($posts as $key => $post) {
                    $fields = get_fields($post->ID);
                    $count = $key + 1
                        ?>

                    <div class="c-tab__content <?= 1 == $count ? 'active' : '' ?> js-tab-content" tab-id="<?= $count ?>">

                        <div class="l-flex l-flex--center l-flex--vertical">
                            <img src="<?= $fields['experiencia_logo'] ?>" class="c-experience-logo">

                            <div class="c-experience-period">
                                <span class="c-experience-period-start">
                                    <?= $fields['experiencia_data_entrada'] ?>
                                </span>
                                -
                                <span class="c-experience-period-end">
                                    <?= $fields['experiencia_data_saida'] != '' ? $fields['experiencia_data_saida'] : 'Atualmente' ?>
                                </span>
                            </div>

                            <div class="c-tab__content-text">
                                <?= $post->post_content ?>
                            </div>

                        </div>

                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
    </div>
    <?php
}

function renderSkills()
{
    $query = new \WP_Query(['post_type' => 'skill', 'order' => 'asc', 'orderby' => 'name', 'post_status' => 'publish', 'posts_per_page' => -1]);
    $posts = $query->posts;

    foreach ($posts as $key => $post) {
        $fields = get_fields($post->ID);
        ?>

        <article class="l__col-3">
            <div class="c-skill c-flipbox">
                <div class="c-flipbox__holder">

                    <div class="c-flipbox__front-face">
                        <div class="c-flipbox__content">
                            <img src="<?=  $fields['skill_logo'] ?>">

                            <h3 class="c-skill__title">
                                <?= $post->post_title ?>
                            </h3>
                        </div>
                    </div>

                    <div class="c-flipbox__back-face">
                        <div class="c-skill__text c-flipbox__content">
                        <?= $fields['skill_info'] ?>
                        </div>
                    </div>

                </div>

            </div>
        </article>
    <?php }
}
