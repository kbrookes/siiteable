<? 
// Adds widget: Social Icons
class Socialicons_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'socialicons_widget',
			esc_html__( 'Social Icons', 'textdomain' ),
			array( 'description' => esc_html__( 'Add your social icons', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Facebook Icon',
			'id' => 'facebookicon_text',
			'type' => 'text',
		),
		array(
			'label' => 'Facebook URL',
			'id' => 'facebookurl_text',
			'type' => 'text',
		),
		array(
			'label' => 'Twitter Icon',
			'id' => 'twittericon_text',
			'type' => 'text',
		),
		array(
			'label' => 'Twitter URL',
			'id' => 'twitterurl_text',
			'type' => 'text',
		),
		array(
			'label' => 'Instagram Icon',
			'id' => 'instagramicon_text',
			'type' => 'text',
		),
		array(
			'label' => 'Instagram URL',
			'id' => 'instagramurl_text',
			'type' => 'text',
		),
		array(
			'label' => 'LinkedIn Icon',
			'id' => 'linkedinicon_text',
			'type' => 'text',
		),
		array(
			'label' => 'LinkedIn URL',
			'id' => 'linkedinurl_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social Icon 1',
			'id' => 'socialicon1_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social URL 1',
			'id' => 'socialurl1_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social Icon 2',
			'id' => 'socialicon2_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social URL 2',
			'id' => 'socialurl2_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social Icon 3',
			'id' => 'socialicon3_text',
			'type' => 'text',
		),
		array(
			'label' => 'Social URL 3',
			'id' => 'socialurl3_text',
			'type' => 'text',
		),
		array(
			'label' => 'Icon Colour',
			'id' => 'textcolour_select',
			'type' => 'select',
			'options' => array(
				'Primary',
				'Secondary',
				'Dark',
				'Light',
				'Alternate',
				'White',
			),
		),
		array(
			'label' => 'Icon Alignment',
			'id' => 'iconalignment_select',
			'type' => 'select',
			'options' => array(
				'Left',
				'Center',
				'Right',
			),
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output generated fields
		$textColour = 'text-white';
		if(!empty($instance['textcolour_select'])):
			$textColour = 'text-' . strtolower($instance['textcolour_select']);
		endif;
		
		$iconAlign = '';
		if(!empty($instance['iconalignment_select'])):
			$iconAlign = strtolower($instance['iconalignment_select']);
			switch ($iconAlign) {
				case 'left':
					break;
				case 'center':
					$iconAlign = "d-flex justify-content-center";
					break;
				case 'right';
					$iconAlign = "d-flex justify-content-end";
					break;
			}
		endif;
		
		// Output generated fields
		$faType = 'fab';
		
		
		if(!empty($instance['facebookurl_text'] || $instance['twitterurl_text'] || $instance['instagramurl_text'] || $instance['linkedinurl_text'] || $instance['socialurl1_text'] || $instance['socialurl2_text'] || $instance['socialurl3_text'])): ?>
		<div class="social-block">
			<div class="social-block__inner <?= $iconAlign; ?>">
				<? if(!empty($instance['facebookicon_text']) && !empty($instance['facebookurl_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['facebookurl_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['facebookicon_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['twittericon_text']) && !empty($instance['twitterurl_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['twitterurl_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['twittericon_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['instagramicon_text']) && !empty($instance['instagramurl_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['instagramurl_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['instagramicon_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['linkedinicon_text']) && !empty($instance['linkedinurl_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['linkedinurl_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['linkedinicon_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['socialicon1_text']) && !empty($instance['socialurl1_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['socialurl1_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['socialicon1_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['socialicon2_text']) && !empty($instance['socialurl2_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['socialurl2_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['socialicon2_text']; ?>"></i></a>
				</div>
				<? endif; ?>
				<? if(!empty($instance['socialicon3_text']) && !empty($instance['socialurl3_text'])):?>
				<div class="social-block__icon <?= $textColour; ?>">
					<a href="<?= $instance['socialurl3_text']; ?>" target="_blank"><i class="<?= $faType . ' ' . $instance['socialicon3_text']; ?>"></i></a>
				</div>
				<? endif; ?>
			</div>
		</div>
		<? endif;

		
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
				case 'select':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<select id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'">';
					foreach ($widget_field['options'] as $option) {
						if ($widget_value == $option) {
							$output .= '<option value="'.$option.'" selected>'.$option.'</option>';
						} else {
							$output .= '<option value="'.$option.'">'.$option.'</option>';
						}
					}
					$output .= '</select>';
					$output .= '</p>';
					break;
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
		$this->field_generator( $instance );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		foreach ( $this->widget_fields as $widget_field ) {
			switch ( $widget_field['type'] ) {
				default:
					$instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
			}
		}
		return $instance;
	}
}

function register_socialicons_widget() {
	register_widget( 'Socialicons_Widget' );
}
add_action( 'widgets_init', 'register_socialicons_widget' );