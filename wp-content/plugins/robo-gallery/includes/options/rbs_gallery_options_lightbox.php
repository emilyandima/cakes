<?php
/*
*      Robo Gallery     
*      Version: 1.0
*      By Robosoft
*
*      Contact: https://robosoft.co/robogallery/ 
*      Created: 2015
*      Licensed under the GPLv2 license - http://opensource.org/licenses/gpl-2.0.php
*
*      Copyright (c) 2014-2019, Robosoft. All rights reserved.
*      Available only in  https://robosoft.co/robogallery/ 
*/

if ( ! defined( 'WPINC' ) ) exit;

$lightbox_group = new_cmb2_box( array(
    'id' 			=> ROBO_GALLERY_PREFIX . 'lightbox_metabox',
    'title' 		=> '<span class="dashicons  dashicons-money"></span> '.__( 'Lightbox Options', 'robo-gallery' ),
    'object_types' 	=> array( ROBO_GALLERY_TYPE_POST ),
    'show_names' 	=> false,
    'context' 		=> 'normal',
));

$lightbox_group->add_field( array(
	'name' 			=> __('Text', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxTitle',
	'type' 			=> 'switch', 
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'showhide'		=> 1,
	'depends' 		=> 	'.rbs_lightbox_source',
	'before_row' 	=> '
<div class="rbs_block"><br/>',
));

$lightbox_group->add_field( array(
	'name'             => __('Text Source', 'robo-gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'lightboxSource',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'title',
	'options'          => array(
		'title' 	=> __( 'Title' , 	'robo-gallery' ),
		'desc' 		=> __( 'Description' , 	'robo-gallery' ),
		'caption' 	=> __( 'Caption' , 	'robo-gallery' ),
	),
	'before_row' 	=> '<div class="rbs_lightbox_source">',
	'after_row'		=> '</div> '
));

$lightbox_group->add_field( array(
    'name'    		=> __( 'Text Color', 'robo-gallery' ),
    'id'   			=> ROBO_GALLERY_PREFIX.'lightboxColor',
    'type' 			=> 'rbstext',
    'class'			=> 'form-control rbs_color',
    'data-default' 	=>  '#F3F3F3',
	'data-alpha'    => 'true',
    'small'			=> 1,
    'default'  		=> '#F3F3F3',
));

$lightbox_group->add_field( array(
    'name'    		=> __( 'Bg Color', 'robo-gallery' ),
    'id'   			=> ROBO_GALLERY_PREFIX.'lightboxBackground',
    'type' 			=> 'rbstext',
    'class'			=> 'form-control rbs_color',
    'data-default' 	=>  'rgba(11, 11, 11, 0.8)',
	'data-alpha'    => 'true',
	'level'			=> !ROBO_GALLERY_PRO,
    'small'			=> 1,
    'default'  		=> 'rgba(11, 11, 11, 0.8)',
   
));

$lightbox_group->add_field( array(
	'name' 			=> __('Deep Linking', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'deepLinking',
	'type' 			=> 'switch', 
	'desc'			=> __('This option enable linking for every particular image ', 'robo-gallery' ),
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
));

$lightbox_group->add_field( array(
	'name' 			=> __(' Images Counter', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxCounter',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'depends' 		=> 	'.rbs_lightbox_counter_text',
	'after_row'		=> '
		<div class="rbs_lightbox_counter_text">',
));

$lightbox_group->add_field( array(
    'name'    => __('Counter Divider','robo-gallery'),
    'default' => ' of ',
    'id'	  => ROBO_GALLERY_PREFIX .'lightboxCounterText',
    'type'    => 'rbstext',
    'small'			=> 1,
    'after_row'		=> '
		</div>',
));

$lightbox_group->add_field( array(
	'name' 			=> __('Swipe', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSwipe',
	'type' 			=> 'switch', 
	'depends' 		=> 	'.rbs_lightbox_swipe_direction',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
));

$lightbox_group->add_field( array(
	'name'             => __('Swipe  direction', 'robo-gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'lightboxSwipeDirection',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'title',
	'options'          => array(
		'left' 		=> __( 'Left (from left to right)' , 	'robo-gallery' ),
		'right' 	=> __( 'Right  (from right to left)' , 	'robo-gallery' ),
	),

	'before_row' 	=> '<div class="rbs_lightbox_swipe_direction">',
	'after_row'		=> '</div> '
));

$lightbox_group->add_field( array(
	'name' 			=> __('Mobile Style', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxMobile',
	'type' 			=> 'switch', 
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
));

$lightbox_group->add_field( array(
	'name' 			=> __('Close Icon', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxClose',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
	'before_row'	=> '
	<div role="tabpanel">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">	<a href="#lightboxButtons"	aria-controls="lightboxButtons" role="tab" data-toggle="tab">'.__('Control Buttons', 'robo-gallery' ).'</a></li>
			<li role="presentation">				<a href="#lightboxPanel" 	aria-controls="lightboxPanel" 	role="tab" data-toggle="tab">'.__('Lightbox Description Panel', 'robo-gallery' ).'</a></li>
			<li role="presentation">				<a href="#lightboxSocial" 	aria-controls="lightboxSocial" 	role="tab" data-toggle="tab">'.__('Social Buttons', 'robo-gallery' ).'</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="lightboxButtons"><br/>',
));

$lightbox_group->add_field( array(
	'name' 			=> __('Arrow Icon', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxArrow',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
));

$lightbox_group->add_field( array(
	'name' 			=> __('Source Button ', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSourceButton',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'after_row'		=> ' 
			</div> '
));

$lightbox_group->add_field( array(
	'name' 			=> __('Panel', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxDescPanel',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'depends' 		=> 	'.rbs_lightbox_desc_panel',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'before_row'	=> '
			<div role="tabpanel" class="tab-pane" id="lightboxPanel"><br/>',
));

$lightbox_group->add_field( array(
	'name'             => __('Description Source', 'robo-gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'lightboxDescSource',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'title',
	'options'          => array(
		'title' 	=> __( 'Title' , 	'robo-gallery' ),
		'desc' 		=> __( 'Description' , 	'robo-gallery' ),
		'caption' 	=> __( 'Caption' , 	'robo-gallery' ),
	),
	'before_row'	=> '<div class="rbs_lightbox_desc_panel">',
));

$lightbox_group->add_field( array(
	'name'             => __('Description Style', 'robo-gallery' ),
	'id'               => ROBO_GALLERY_PREFIX . 'lightboxDescClass',
	'type'             => 'rbsselect',
	'show_option_none' => false,
	'default'          => 'Light',
	'options'          => array(
		'light' 	=> __( 'Light' , 	'robo-gallery' ),
		'dark' 		=> __( 'Dark' , 	'robo-gallery' ),
		'red' 		=> __( 'Red' , 	'robo-gallery' ),
		'blue' 		=> __( 'Blue' , 	'robo-gallery' ),
		'green' 	=> __( 'Green' , 	'robo-gallery' ),
		'pink' 		=> __( 'Pink' , 	'robo-gallery' ),
	),
	'after_row'		=> '
						</div>
			</div>',
));

$lightbox_group->add_field( array(
	'name' 			=> __('Social Buttons', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocial',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'depends' 		=> 	'.rbs_lightbox_social_button',
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(0),
	'level'			=> !ROBO_GALLERY_PRO,
	'before_row'	=> '
			<div role="tabpanel" class="tab-pane" id="lightboxSocial"><br/>',
     'after_row'		=> '
				<div class="rbs_lightbox_social_button">'
));

$lightbox_group->add_field( array(
	'name' 			=> __('Facebook', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocialFacebook',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
     'after_row'		=> ''
));

$lightbox_group->add_field( array(
	'name' 			=> __('Twitter', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocialTwitter',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
     'after_row'		=> ''
));

$lightbox_group->add_field( array(
	'name' 			=> __('Google+', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocialGoogleplus',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
     'after_row'		=> ''
));

$lightbox_group->add_field( array(
	'name' 			=> __('Pinterest', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocialPinterest',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
     'after_row'		=> ''
));

$lightbox_group->add_field( array(
	'name' 			=> __('VK', 'robo-gallery' ),
	'id' 			=> ROBO_GALLERY_PREFIX . 'lightboxSocialVK',
	'type' 			=> 'switch', 
	'showhide'		=> 1,
	'default'		=> rbs_gallery_set_checkbox_default_for_new_post(1),
     'after_row'		=> '
				</div>
			</div>
    	</div>
	</div>
</div> '
));
	