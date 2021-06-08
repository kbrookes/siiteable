<?php
// Adds widget: Events List
class Eventslist_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'eventslist_widget',
            esc_html__( 'Events List', 'textdomain' ),
            array( 'description' => esc_html__( 'Connects to the events post type, and uses custom fields to display upcoming events', 'textdomain' ), ) // Args
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Number of events to show',
            'id' => 'upcoming-events',
            'default' => '5',
            'type' => 'number',
        ),
    );

    public function widget( $args, $instance ) {
        
        echo $args['before_widget'];
        
        $eventsCount = $instance['upcoming-events']; 
        $title = get_field('title', 'widget_' . $args['widget_id']);
        $bgColor = get_field('bg_color', 'widget_' . $args['widget_id']);
        $titleAlign = get_field('widget_title_align', 'widget_' . $args['widget_id']);
        $titleColor = get_field('widget_title_colour', 'widget_' . $args['widget_id']);
        $paddingY = get_field('widget_padding', 'widget_' . $args['widget_id']);
        $eventTitleColor = get_field('event_title_colour', 'widget_' . $args['widget_id']);
        $eventTextColor = get_field('text_colour', 'widget_' . $args['widget_id']);
        $buttonColor = get_field('button_color', 'widget_' . $args['widget_id']);
        ?>
        
        <section class="eventslist-single <?= $bgColor . ' ' . $paddingY; ?>">
            <? if(!empty($title)):?>
            <h3 class="widgettitle <?= $titleAlign . ' ' . $titleColor; ?>"><?= $title; ?></h3>
            <? endif; ?>
        <?
        // Custom WP query query
        $args_query = array(
            'post_type' => array('events'),
            'post_status' => array('publish'),
            'posts_per_page' => $eventsCount,
            'nopaging' => true,
            'order' => 'DESC',
        );
        
        $query = new WP_Query( $args_query );
        
        
        if ( $query->have_posts() ) { ?>
            <div class="container-sm">
            <? while ( $query->have_posts() ) {
                $query->the_post();
                
                $dateString = get_field('event_date');
                $date = DateTime::createFromFormat('Ymd', $dateString);
                $faType = get_theme_mod( 'fa_styles');
                $link = get_field('event_link');
                $moreLink = '<a href="' . get_field('event_link') . '" class="btn-custom ' . $buttonColor . ' " target="_blank">EVENT INFO</a>';
                ?>
                <div class="row mb-4">
                    <div class="col-12 co-sm-4 col-md-3 col-lg-2 eventslist-date">
                        <p class="font-weight-bold uppercase eventslist-day text-secondary <?= $eventTitleColor; ?>">
                            <?= $date->format('j'); ?>
                        </p>
                        <p class="font-weight-bold eventslist-month text-secondary <?= $eventTitleColor; ?>">
                            <?= $date->format('M'); ?>
                        </p>
                        <p class="font-weight-light eventslist-year <?= $eventTitleColor; ?>">
                            <?= $date->format('Y'); ?>
                        </p>
                        <?php
                        //var_dump($bgColor);
                        
                         ?>
                    </div>
                    <div class="col-12 col-sm-8 col-md-9 col-lg-10">
                        <header class="entry-header">
                            <h4 class="<?= $eventTitleColor; ?>"><a href="<?= $link; ?>" class="<?= $eventTitleColor; ?>" target="_blank"><?php the_title(); ?></a></h4>
                        </header><!-- .entry-header -->
                        <? if(!empty(get_field('event_location')) || !empty(get_field('event_start'))): ?>
                        <div class="eventslist-location <?= $eventTextColor; ?>">
                            <i class="<?= $faType; ?> fa-map-marker-alt"></i> <?= get_field('event_location'); ?> | <i class="<?= $faType ?> fa-clock"></i> <?= get_field('event_start'); ?>
                        </div>
                        <? endif; ?>
                        <p class="<?= $eventTextColor; ?>"><?= wp_trim_words( get_the_content(), 20); ?></p>
                        <?= $moreLink; ?>
                    </div>
                </div>
            <?}
        } else {
        
        } ?>
            </div>
        <? wp_reset_postdata(); ?>
        </section>
        <? echo $args['after_widget'];
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

function register_eventslist_widget() {
    register_widget( 'Eventslist_Widget' );
}
add_action( 'widgets_init', 'register_eventslist_widget' );;



