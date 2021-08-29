<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Yoga_Fitness_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-yoga-fitness' ),
				'family'      => esc_html__( 'Font Family', 'vw-yoga-fitness' ),
				'size'        => esc_html__( 'Font Size',   'vw-yoga-fitness' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-yoga-fitness' ),
				'style'       => esc_html__( 'Font Style',  'vw-yoga-fitness' ),
				'line_height' => esc_html__( 'Line Height', 'vw-yoga-fitness' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-yoga-fitness' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-yoga-fitness-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-yoga-fitness-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-yoga-fitness' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-yoga-fitness' ),
        'Acme' => __( 'Acme', 'vw-yoga-fitness' ),
        'Anton' => __( 'Anton', 'vw-yoga-fitness' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-yoga-fitness' ),
        'Arimo' => __( 'Arimo', 'vw-yoga-fitness' ),
        'Arsenal' => __( 'Arsenal', 'vw-yoga-fitness' ),
        'Arvo' => __( 'Arvo', 'vw-yoga-fitness' ),
        'Alegreya' => __( 'Alegreya', 'vw-yoga-fitness' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-yoga-fitness' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-yoga-fitness' ),
        'Bangers' => __( 'Bangers', 'vw-yoga-fitness' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-yoga-fitness' ),
        'Bad Script' => __( 'Bad Script', 'vw-yoga-fitness' ),
        'Bitter' => __( 'Bitter', 'vw-yoga-fitness' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-yoga-fitness' ),
        'BenchNine' => __( 'BenchNine', 'vw-yoga-fitness' ),
        'Cabin' => __( 'Cabin', 'vw-yoga-fitness' ),
        'Cardo' => __( 'Cardo', 'vw-yoga-fitness' ),
        'Courgette' => __( 'Courgette', 'vw-yoga-fitness' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-yoga-fitness' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-yoga-fitness' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-yoga-fitness' ),
        'Cuprum' => __( 'Cuprum', 'vw-yoga-fitness' ),
        'Cookie' => __( 'Cookie', 'vw-yoga-fitness' ),
        'Chewy' => __( 'Chewy', 'vw-yoga-fitness' ),
        'Days One' => __( 'Days One', 'vw-yoga-fitness' ),
        'Dosis' => __( 'Dosis', 'vw-yoga-fitness' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-yoga-fitness' ),
        'Economica' => __( 'Economica', 'vw-yoga-fitness' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-yoga-fitness' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-yoga-fitness' ),
        'Francois One' => __( 'Francois One', 'vw-yoga-fitness' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-yoga-fitness' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-yoga-fitness' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-yoga-fitness' ),
        'Handlee' => __( 'Handlee', 'vw-yoga-fitness' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-yoga-fitness' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-yoga-fitness' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-yoga-fitness' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-yoga-fitness' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-yoga-fitness' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-yoga-fitness' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-yoga-fitness' ),
        'Kanit' => __( 'Kanit', 'vw-yoga-fitness' ),
        'Lobster' => __( 'Lobster', 'vw-yoga-fitness' ),
        'Lato' => __( 'Lato', 'vw-yoga-fitness' ),
        'Lora' => __( 'Lora', 'vw-yoga-fitness' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-yoga-fitness' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-yoga-fitness' ),
        'Merriweather' => __( 'Merriweather', 'vw-yoga-fitness' ),
        'Monda' => __( 'Monda', 'vw-yoga-fitness' ),
        'Montserrat' => __( 'Montserrat', 'vw-yoga-fitness' ),
        'Muli' => __( 'Muli', 'vw-yoga-fitness' ),
        'Marck Script' => __( 'Marck Script', 'vw-yoga-fitness' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-yoga-fitness' ),
        'Open Sans' => __( 'Open Sans', 'vw-yoga-fitness' ),
        'Overpass' => __( 'Overpass', 'vw-yoga-fitness' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-yoga-fitness' ),
        'Oxygen' => __( 'Oxygen', 'vw-yoga-fitness' ),
        'Orbitron' => __( 'Orbitron', 'vw-yoga-fitness' ),
        'Patua One' => __( 'Patua One', 'vw-yoga-fitness' ),
        'Pacifico' => __( 'Pacifico', 'vw-yoga-fitness' ),
        'Padauk' => __( 'Padauk', 'vw-yoga-fitness' ),
        'Playball' => __( 'Playball', 'vw-yoga-fitness' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-yoga-fitness' ),
        'PT Sans' => __( 'PT Sans', 'vw-yoga-fitness' ),
        'Philosopher' => __( 'Philosopher', 'vw-yoga-fitness' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-yoga-fitness' ),
        'Poiret One' => __( 'Poiret One', 'vw-yoga-fitness' ),
        'Quicksand' => __( 'Quicksand', 'vw-yoga-fitness' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-yoga-fitness' ),
        'Raleway' => __( 'Raleway', 'vw-yoga-fitness' ),
        'Rubik' => __( 'Rubik', 'vw-yoga-fitness' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-yoga-fitness' ),
        'Russo One' => __( 'Russo One', 'vw-yoga-fitness' ),
        'Righteous' => __( 'Righteous', 'vw-yoga-fitness' ),
        'Slabo' => __( 'Slabo', 'vw-yoga-fitness' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-yoga-fitness' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-yoga-fitness'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-yoga-fitness' ),
        'Sacramento' => __( 'Sacramento', 'vw-yoga-fitness' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-yoga-fitness' ),
        'Tangerine' => __( 'Tangerine', 'vw-yoga-fitness' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-yoga-fitness' ),
        'VT323' => __( 'VT323', 'vw-yoga-fitness' ),
        'Varela Round' => __( 'Varela Round', 'vw-yoga-fitness' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-yoga-fitness' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-yoga-fitness' ),
        'Volkhov' => __( 'Volkhov', 'vw-yoga-fitness' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-yoga-fitness' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-yoga-fitness' ),
			'100' => esc_html__( 'Thin',       'vw-yoga-fitness' ),
			'300' => esc_html__( 'Light',      'vw-yoga-fitness' ),
			'400' => esc_html__( 'Normal',     'vw-yoga-fitness' ),
			'500' => esc_html__( 'Medium',     'vw-yoga-fitness' ),
			'700' => esc_html__( 'Bold',       'vw-yoga-fitness' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-yoga-fitness' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-yoga-fitness' ),
			'italic'  => esc_html__( 'Italic', 'vw-yoga-fitness' ),
			'oblique' => esc_html__( 'Oblique', 'vw-yoga-fitness' )
		);
	}
}
