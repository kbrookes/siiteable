<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strappress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'strappress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'strappress' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title card-header">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'strappress_widgets_init' );


/// CREATE BLOCKS WIDGET
// Adds widget: Block Repeater
class Blockrepeater_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'blockrepeater_widget',
			esc_html__( 'Block Repeater', 'textdomain' )
		);
	}

	private $widget_fields = array(
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Output generated fields
		$widget_id = $args['widget_id'];
		
		// GET HEADER
		$wHeader = get_field('rptblock_heading', 'widget_' . $widget_id);
		$blockMargin = get_field('rptblock_margin', 'widget_' . $widget_id);
		$blockAspect = 'style-' . get_field('rptblock_aspect_ratio', 'widget_' . $widget_id);
		if($wHeader !=  ""):
			echo '<h2>' . $wHeader. '</h2>';
		endif;
		
		//$addDeviceAll = false;
		$addDeviceAll = get_field('rptblock_device_small', 'widget_' . $widget_id);
		
		if( have_rows('rptblock_repeater', 'widget_' . $widget_id) ): ?>
		<div class="block-repeater">
			<?php while ( have_rows('rptblock_repeater', 'widget_' . $widget_id) ) : the_row(); 
			
				$title = '';
				$title = get_sub_field('rptblock_title');
				
				$titleColor = 'text-white';
				$titleColor = get_sub_field('rptblock_title_color');
				
				$contentImage = '';
				$contentImage = get_sub_field('rptblock_content_image');
				
				$titleHide = false;
				$contentImageAlt = '';
				if(get_sub_field('rptblock_title_hide') == true):
					$titleHide = true;
					$contentImageAlt = $title;
				endif;
				
				
				
				$removeDevice = false;
				$removeDevice = get_sub_field('rptblock_device_remove');
			
				$linkVal = '';
				$linkType = get_sub_field('rptblock_link');
				if($linkType == 'linkURL'):
					$linkVal = get_sub_field('rptblock_link_url');
				elseif($linkType == 'linkPage'):
					$postID = get_sub_field('rptblock_link_page');
					$linkVal = get_permalink($postID);
				elseif($linkType == 'linkEmail'):
					$linkVal = 'mailto:' . get_sub_field('rptblock_link_email');
				endif;
				
				$target = '';
				if(get_sub_field('rptblock_link_external') == 'true'):
					$target = 'target="_blank"';
				endif;
				
				$deviceSmall = '';
				if( get_theme_mod( 'siiteable_device_small', '' ) != '' ):
					$deviceSmall = get_theme_mod( 'siiteable_device_small', 0 );
				endif;
				
				$bgType = get_sub_field('rptblock_background');
				$bgSrc = get_sub_field('rptblock_image_src');
				$bgClass = '';
				$bgImage = '';
				$bgImageURL = '';
				
				if($bgType == 'bg-image'):
					$bgClass = 'hasBGImage';
				elseif($bgType = 'bg-color'):
					$bgClass = 'hasBGColor';
				endif;
				
				if($bgType == 'bg-image' && $linkType == 'linkURL' ):
					$bgSrc = 'bg-media';
				endif;
				
				if($bgSrc == 'bg-post'):
					$pageID = get_sub_field('rptblock_link_page');
					$bgImageURL = get_the_post_thumbnail_url($pageID,'Medium_large'); 
				elseif($bgSrc == 'bg-media'):
					$bgImageURL = get_sub_field('rptblock_image_upload');
				endif;
				
				$bgImage = 'style="background-image: url(' . $bgImageURL . ');"';
				
				$bgColor = get_sub_field('rptblock_bg_color');
				
				$hasOverlay = get_sub_field('rptblock_overlay');
				$hasOverlayClass = '';
				if($hasOverlay == true):
					$hasOverlayClass = 'hasOverlay';
				endif;
				
				$overlayColor = get_sub_field('rptblock_overlay_color');
				$overlayColorClass = '';
				if($hasOverlay):
					$overlayColorClass = $overlayColor;
				endif;
				
				$hoverColor = get_sub_field('rptblock_overlay_hover');
				$hoverColorClass = '';
				if($hoverColor):
					$overlayHoverClass = $hoverColor;
				endif;
				
				$overlayOpacity = get_sub_field('rptblock_overlay_opacity');
				$overlayOpacityClass = '';
				if(!empty($overlayOpacity)):
					$overlayOpacityClass = 'opacity-' . $overlayOpacity;
				endif;
				
				if(($bgClass == 'hasBGColor') && (!empty($overlayHoverClass))):
					$hasOverlay = true;
					$hasOverlayClass = 'hasOverlay';
					$overlayColor = $bgColor;
					$overlayColorClass = $overlayColor;
				endif;
			?>
			<div class="block-repeater__block <?= $bgColor . ' ' . $blockMargin . ' ' . $blockAspect; ?>">
				<div class="image-box"  <?= $bgImage; ?>>
					<a class="block-repeater__link" href="<?= $linkVal; ?>">
						<div class="block-repeater__wrap image-box__inner <?= $bgClass . ' ' . $hasOverlayClass; ?>">
							<? if($hasOverlay):?>
							<div class="image-box__inner-overlay position-absolute w-100 h-100 <?= $overlayColorClass . ' ' . $overlayHoverClass . ' ' .$overlayOpacityClass; ?>"></div>
							<? endif; ?>
							<? if(!empty($deviceSmall) && $addDeviceAll == true && $removeDevice == false){?>
							<div class="image-box__inner-icon position-absolute w-50 h-auto">
								<img src="<?= $deviceSmall; ?>" class="style-svg img-fluid" alt="small brand device" />
							</div>
							<? } ?>
							<div class="image-box__content text-center">
								<? if($titleHide == false):?>
								<h4 class="<?= $titleColor; ?>"><?= $title; ?></h4>
								<? endif; ?>
								<? if(!empty($contentImage)):?>
								<img src="<?= $contentImage; ?>" class="img-fluid" alt="<?= $title; ?>" />
								<? endif; ?>
							</div>
						</div>
					</a>
				</div>
			</div>
			
			<?php endwhile; ?>
		</div>
		<?php endif;
		
		echo $args['after_widget'];
	}

	public function field_generator( $instance ) {
		$output = '';
		foreach ( $this->widget_fields as $widget_field ) {
			$default = '';
			if ( isset($widget_field['default']) ) {
				$default = $widget_field['default'];
			}
			$widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'textdomain' );
			switch ( $widget_field['type'] ) {
				default:
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
					$output .= '</p>';
			}
		}
		echo $output;
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'textdomain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'textdomain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_blockrepeater_widget() {
	register_widget( 'Blockrepeater_Widget' );
}
add_action( 'widgets_init', 'register_blockrepeater_widget' );


