<?php

add_action( 'customize_register', function( $wp_customize ) {
//Heading
  class Kirki_Controls_Heading_Control extends Kirki\Control\Base {
  public $type = 'heading';
    public function  render_content()
    {
      $html = '';
      $html .= '<div class="customizer-heading"><h3>'. esc_html( $this->label ) .'</h3></div>';
       echo wp_kses_post($html);
    }
}
  // Register our custom control with Kirki.
  add_filter( 'kirki_control_types', function( $controls ) {
    $controls['heading'] = 'Kirki_Controls_Headlabel_Control';
    return $controls;
  } );
} );


add_action( 'customize_register', function( $wp_customize ) {
  /**
   * The custom control class
   */
  class Kirki_Controls_Catdrop_Control extends Kirki\Control\Base {
    public $type = 'catdrop';
    public function render_content() { ?>
      <?php
        $dropdown = wp_dropdown_categories(
            array(
              'orderby'           => 'name',
              'name'              => '_customize-dropdown-categories-' . $this->id,
              'echo'              => 0,
              'show_count'        => 1,
              'hierarchical'      => 1,
              'show_option_none'  => __( '&mdash; Select &mdash;', 'newsophy' ),
              'option_none_value' => 'none',
              'show_option_all'  => 'All',
              'value_field'      => 'slug',
              'selected'          => $this->value(),
           )
        );

        $dropdown = str_replace("value='0'", "value='all'", $dropdown);
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
          printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
            $this->label,
            $dropdown
        );
    }
  }
  // Register our custom control with Kirki.
  add_filter( 'kirki_control_types', function( $controls ) {
    $controls['catdrop'] = 'Kirki_Controls_Catdrop_Control';
    return $controls;
  } );
} );

add_action( 'customize_register', function( $wp_customize ) {
  /**
   * The custom control class
   */
  class Kirki_Controls_Tagdrop_Control extends Kirki\Control\Base {
    public $type = 'tagdrop';
    public function render_content() { ?>
      <?php
        $dropdown = wp_dropdown_categories(
            array(
              'taxonomy'          => 'post_tag',
              'orderby'           => 'name',
              'name'              => '_customize-dropdown-tags-' . $this->id,
              'echo'              => 0,
              'show_count'        => 1,
              'hierarchical'      => 1,
              'show_option_none'  => __( '&mdash; Select &mdash;', 'newsophy' ),
              'option_none_value' => '',
              'show_option_all'   => '',
              'value_field'      => 'slug',
              'selected'          => $this->value(),
            )
        );

        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
            $this->label,
            $dropdown
        );
    }
  }
  // Register our custom control with Kirki.
  add_filter( 'kirki_control_types', function( $controls ) {
    $controls['tagdrop'] = 'Kirki_Controls_Tagdrop_Control';
    return $controls;
  } );

} );


add_action( 'customize_register', function( $wp_customize ) {
  /**
   * The custom control class
   */
  class Kirki_Controls_Notice_Control extends WP_Customize_Control {
    public $type = 'sidebars';
    public function render_content() {
      $sidebar_options = $GLOBALS['wp_registered_sidebars'];
      $dropdown='';
    printf(
        '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
        $this->label,
        $dropdown
    );
  ?>

<select <?php $this->link(); ?>>
  <option value="none">None</option>
  <?php 

    foreach ( $sidebar_options as $option ) : 
      if ($option['id'] != 'hidden-sidebar') {
      ?>
      <option value="<?php echo esc_attr( $option['id'] ); ?>" <?php echo selected( $this->value(), $option['id'], false ); ?>><?php echo esc_html( $option['name'] ); ?></option>
      <?php 
    }
    endforeach; 
 
  ?>
</select>
  
  <?php
    }
  }
  // Register our custom control with Kirki
  add_filter( 'kirki/control_types', function( $controls ) {
    $controls['sidebars'] = 'Kirki_Controls_Notice_Control';
    return $controls;
  } );

} );


?>