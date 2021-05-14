<? 
/// ADD CONTACT DETAILS WIDGET
// Adds widget: Contact details
class Contactdetails_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'contactdetails_widget',
			esc_html__( 'Contact details', 'textdomain' ),
			array( 'description' => esc_html__( 'Add your business details here', 'textdomain' ), ) // Args
		);
	}

	private $widget_fields = array(
		array(
			'label' => 'Address icon (FontAwesome classs)',
			'id' => 'addressiconfon_text',
			'type' => 'text',
		),
		array(
			'label' => 'Building name',
			'id' => 'buildingname_text',
			'type' => 'text',
		),
		array(
			'label' => 'Street address',
			'id' => 'streetaddress_textarea',
			'type' => 'textarea',
		),
		array(
			'label' => 'City/Suburb/Region',
			'id' => 'citysuburbreg_text',
			'type' => 'text',
		),
		array(
			'label' => 'State',
			'id' => 'state_text',
			'type' => 'text',
		),
		array(
			'label' => 'Zip/Postcode',
			'id' => 'zippostcode_text',
			'type' => 'text',
		),
		array(
			'label' => 'Country',
			'id' => 'country_text',
			'type' => 'text',
		),
		array(
			'label' => 'Email icon (FontAwesome classs)',
			'id' => 'emailiconfonta_text',
			'type' => 'text',
		),
		array(
			'label' => 'Email address',
			'id' => 'emailaddress_email',
			'type' => 'email',
		),
		array(
			'label' => 'Phone icon (FontAwesome classs)',
			'id' => 'phoneiconfonta_text',
			'type' => 'text',
		),
		array(
			'label' => 'Phone number',
			'id' => 'phonenumber_tel',
			'type' => 'tel',
		),
		array(
			'label' => 'Text Colour',
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
	);


	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output generated fields
		$faType = get_theme_mod( 'fa_styles');
		
		$textColour = 'text-white';
		if(!empty($instance['textcolour_select'])):
			$textColour = 'text-' . strtolower($instance['textcolour_select']);
		endif;
		
		if(!empty($instance['streetaddress_textarea'] || $instance['citysuburbreg_textarea'] || $instance['state_text'] || $instance['zippostcode_text'] || $instance['country_text'] || $instance['emailiconfonta_text'] )): ?>
		<div itemscope itemtype="http://schema.org/ContactPoint" class="<?= $textColour; ?>">
			<? if(!empty($instance['addressiconfon_text'])):?>
			<div class="footer-nav__row">
				<div class="footer-nav__icon">
					<i class="<?= $faType . ' ' . $instance['addressiconfon_text']; ?>"></i>
				</div>
				<div class="footer-nav__content">
			<? endif; ?>
					<div itemscope itemtype="schema.org/PostalAddress" class="footer-nav__address">
					<? if(!empty($instance['buildingname_text'] )):?>
						<h4 class="d-block" itemprop="buildingName"><?= $instance['buildingname_text']; ?></h4>
					<? endif; ?>
					<? if(!empty($instance['streetaddress_textarea'] )):?>
						<span class="d-block" itemprop="streetAddress"><?= $instance['streetaddress_textarea']; ?></span>
					<? endif; ?>
					<? if(!empty($instance['citysuburbreg_text'] )):?>
						<span class="d-block" itemprop="addressLocality"><?= $instance['citysuburbreg_text']; ?></span>
					<? endif; ?>
					<? if(!empty($instance['state_text'] )):?>
						<span itemprop="addressRegion"><?= $instance['state_text']; ?></span>
					<? endif; ?>
					<? if(!empty($instance['zippostcode_text'] )):?>
						<span itemprop="postalCode"><?= $instance['zippostcode_text']; ?></span>
					<? endif; ?>
					<? if(!empty($instance['country_text'] )):?>
						<span class="d-block" itemprop="addressCountry"><?= $instance['country_text']; ?></span>
					<? endif; ?>
				   </div>
			<? if(!empty($instance['addressiconfon_text'])):?>
				</div>
			</div>
			<? endif; ?>
			<? if(!empty($instance['emailiconfonta_text'] )):?>
			<div class="footer-nav__row">
				<div class="footer-nav__icon">
					<i class="<?= $faType . ' ' .  $instance['emailiconfonta_text']; ?>"></i>
				</div>
				<div class="footer-nav__content">
			<? endif; ?>
					<? if(!empty($instance['emailaddress_email'] )):?>
					<a href="mailto:<?= $instance['emailaddress_email']; ?>"><span itemprop="email"><?= $instance['emailaddress_email']; ?></span></a>
					<? endif; ?>
				<? if(!empty($instance['emailiconfonta_text'] )):?>
				</div>
			</div>
			<? endif; ?>
			<? if(!empty($instance['phoneiconfonta_text'] )):?>
			<div class="footer-nav__row">
				<div class="footer-nav__icon">
					<i class="<?= $faType . ' ' .  $instance['phoneiconfonta_text']; ?>"></i>
				</div>
				<div class="footer-nav__content">
			<? endif; ?>
					<? if(!empty($instance['phonenumber_tel'] )):?>
					<a href="tel:<?= $instance['phonenumber_tel']; ?>"><span itemprop="telephone"><?= $instance['phonenumber_tel']; ?></span></a>
					<? endif; ?>
					<? if(!empty($instance['phoneiconfonta_text'] )):?>
				</div>
			</div>
			<? endif; ?>
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
				case 'textarea':
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<textarea class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" rows="6" cols="6" value="'.esc_attr( $widget_value ).'">'.$widget_value.'</textarea>';
					$output .= '</p>';
					break;
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

function register_contactdetails_widget() {
	register_widget( 'Contactdetails_Widget' );
}
add_action( 'widgets_init', 'register_contactdetails_widget' );
