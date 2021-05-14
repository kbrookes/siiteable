<?php /// REGISTER FOOTER SIDEBARS

function footer_sidebar()
{
  $args = [
    "name" => __("Footer Column 1", "siiteable"),
    "id" => "footer_col_1",
    "description" => __(
      "First column in the footer nav order",
      "siiteable"
    ),
    "class" => "footer-col__one",
    "before_widget" => '<div id="%1$s" class="footer-col__one">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Footer Column 2", "siiteable"),
    "id" => "footer_col_2",
    "description" => __("Second column in the footer nav order", "siiteable"),
    "class" => "footer-col__two",
    "before_widget" => '<div id="%1$s" class="footer-col__two">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Footer Column 3", "siiteable"),
    "id" => "footer_col_3",
    "description" => __("Third colun in the footer nav order", "siiteable"),
    "class" => "footer-col__three",
    "before_widget" => '<div id="%1$s" class="footer-col__three">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Footer Column 4", "siiteable"),
    "id" => "footer_col_4",
    "description" => __("Fourth column in the footer nav order", "siiteable"),
    "class" => "footer-col__four",
    "before_widget" => '<div id="%1$s" class="footer-col__four">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Small footer", "siiteable"),
    "id" => "footer_flat",
    "description" => __("Add a small section to the footer area", "siiteable"),
    "class" => "footer-nav__flat",
    "before_widget" => '<div id="%1$s" class="footer-nav__flat">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("CTA on Case Study", "siiteable"),
    "id" => "success_cta",
    "description" => __(
      "Adds a common call to action for all case studies",
      "siiteable"
    ),
    "class" => "success-story__cta",
    "before_widget" => '<div id="%1$s" class="case-study__cta">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Below Content", "siiteable"),
    "id" => "below_content",
    "description" => __(
      "Adds a widget area below the content area",
      "siiteable"
    ),
    "class" => "below-content",
    "before_widget" => '<div id="%1$s" class="below-content">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);

  $args = [
    "name" => __("Above Footer", "siiteable"),
    "id" => "about_footer",
    "description" => __(
      "Adds a widget area above the footer area",
      "siiteable"
    ),
    "class" => "above-footer",
    "before_widget" => '<div id="%1$s" class="above-footer">',
    "after_widget" => "</div>",
    "before_title" => '<h3 class="widgettitle">',
    "after_title" => "</h3>",
  ];
  register_sidebar($args);
}
add_action("widgets_init", "footer_sidebar");

