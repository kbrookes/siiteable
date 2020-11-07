<?php // Adds widget: Call To Action
class Calltoaction_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'calltoaction_widget',
			esc_html__( 'Call To Action', 'textdomain' )
		);
		add_action( 'admin_footer', array( $this, 'media_fields' ) );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'media_fields' ) );
	}

	private $widget_fields = array(
		array(
			'label' => 'CTA Header',
			'id' => 'ctaheader_text',
			'type' => 'text',
		),
		array(
			'label' => 'CTA Body',
			'id' => 'ctabody_textarea',
			'type' => 'textarea',
		),
		array(
			'label' => 'Background Image',
			'id' => 'backgroundimage_media',
			'type' => 'media',
		),
		array(
			'label' => 'Foreground text colour?',
			'id' => 'foregroundtextc_select',
			'default' => 'white',
			'type' => 'select',
			'options' => array(
				'white',
				'black',
			),
		),
		array(
			'label' => 'Background colour',
			'id' => 'backgroundcolou_select',
			'type' => 'select',
			'options' => array(
				'Primary',
				'Secondary',
				'Alternate',
				'Dark',
				'Light',
				'White',
			),
		),
		array(
			'label' => 'Button Link',
			'id' => 'buttonlink_url',
			'type' => 'url',
		),
		array(
			'label' => 'Button Text',
			'id' => 'buttontext_text',
			'type' => 'text',
		),
		array(
			'label' => 'Button Colour',
			'id' => 'buttoncolour_select',
			'type' => 'select',
			'options' => array(
				'Primary',
				'Secondary',
				'Alternate',
			),
		),
		array(
			'label' => 'Custom CSS Class',
			'id' => 'customcssclass_text',
			'type' => 'text',
		),
	);

	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// Output generated fields
		// SETUP LAYOUT

		// Background Image
		$backgroundStyle = 'solid';
		$backgroundColor = 'transparent';
		$hasBGImage = false;
		
		if(!empty($instance['backgroundimage_media'])):
			$backgroundStyle = 'image';
			$backgroundImage = $instance['backgroundimage_media'];
			$hasBGImage = true;
		else:
			$backgroundStyle = 'solid';
		endif;
		
		// Background color
		$bgColor = "bg-white";
		if(!empty($instance['backgroundcolou_select'])):
			$backgroundColor = $instance['backgroundcolou_select'];
			switch ($backgroundColor) {
				case "Primary":
					$bgColor = "bg-primary";
					break;
				case "Secondary":
					$bgColor = "bg-secondary";
					break;
				case "Alternate":
					$bgColor = "bg-alternate";
					break;
				case "Dark":
					$bgColor = "bg-dark";
					break;
				case "Light":
					$bgColor = "bg-light";
					break;
				case "White":
					$bgColor = "bg-white";
					break;
			}
		endif;
		
		// Text Colour
		$textColor = "text-dark";
		if(!empty($instance['foregroundtextc_select'])):
			if($instance['foregroundtextc_select'] == "white"):
				$textColor = "text-white";
			elseif($instance['foregroundtextc_select'] == "black"):
				$textColor = "text-dark";
			endif;
		endif;
		
		// BUTTON COLOUR
		$buttonColor = "btn-primary";
		if(!empty($instance['buttoncolour_select'])):
			$buttonVar = $instance['buttoncolour_select'];
			switch ($buttonVar) {
				case "Primary":
					$buttonColor = "btn-primary";
					break;
				case "Secondary":
					$buttonColor = "btn-secondary";
					break;
				case "Alternate":
					$buttonColor = "btn-alternate";
					break;
			}
		endif; 
		
		// CUSTOM CSS CLASS
		$customCSS = "";
		if(!empty($instance['customcssclass_text'])):
			$customCSS = $instance['customcssclass_text'];
		endif;
		
		?>
	<div class="success-story__cta-inner <?php echo $customCSS . ' ' . $textColor . ' ' . $bgColor; ?>" <?php if($hasBGImage == true):?>style="background-image: url(<?php echo wp_get_attachment_url($backgroundImage); ?>);"<?php endif; ?>>	
		<div class="container">
			<h2><?php echo $instance['ctaheader_text']; ?></h2>
			<div class="success-story__cta-body">
				<?php echo wpautop($instance['ctabody_textarea']); ?>
			</div>
			<div class="success-story__cta-button">
				<a href="<?php echo $instance['buttonlink_url']; ?>" class="btn <?php echo $buttonColor; ?> btn-lg"><?php echo $instance['buttontext_text']; ?></a>
			</div>
		</div>
	</div>
	<?php
		
		echo $args['after_widget'];
	}

	public function media_fields() {
		?><script>
			jQuery(document).ready(function($){
				if ( typeof wp.media !== 'undefined' ) {
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$(document).on('click','.custommedia',function(e) {
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						var id = button.attr('id');
						_custom_media = true;
							wp.media.editor.send.attachment = function(props, attachment){
							if ( _custom_media ) {
								$('input#'+id).val(attachment.id);
								$('span#preview'+id).css('background-image', 'url('+attachment.url+')');
								$('input#'+id).trigger('change');
							} else {
								return _orig_send_attachment.apply( this, [props, attachment] );
							};
						}
						wp.media.editor.open(button);
						return false;
					});
					$('.add_media').on('click', function(){
						_custom_media = false;
					});
					$(document).on('click', '.remove-media', function() {
						var parent = $(this).parents('p');
						parent.find('input[type="media"]').val('').trigger('change');
						parent.find('span').css('background-image', 'url()');
					});
				}
			});
		</script><?php
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
				case 'media':
					$media_url = '';
					if ($widget_value) {
						$media_url = wp_get_attachment_url($widget_value);
					}
					$output .= '<p>';
					$output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'textdomain' ).':</label> ';
					$output .= '<input style="display:none;" class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.$widget_value.'">';
					$output .= '<span id="preview'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" style="margin-right:10px;border:2px solid #eee;display:block;width: 100px;height:100px;background-image:url('.$media_url.');background-size:contain;background-repeat:no-repeat;"></span>';
					$output .= '<button id="'.$this->get_field_id( $widget_field['id'] ).'" class="button select-media custommedia">Add Media</button>';
					$output .= '<input style="width: 19%;" class="button remove-media" id="buttonremove" name="buttonremove" type="button" value="Clear" />';
					$output .= '</p>';
					break;
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

function register_calltoaction_widget() {
	register_widget( 'Calltoaction_Widget' );
}
add_action( 'widgets_init', 'register_calltoaction_widget' );