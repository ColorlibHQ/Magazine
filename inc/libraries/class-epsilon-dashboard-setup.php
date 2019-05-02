<?php
/**
 * magazine Dashboard
 *
 * @package magazine
 * @since   1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

class Epsilon_Dashboard_Setup {
	/**
	 * Theme array
	 *
	 * @var array
	 */
	public $theme = array();
	/**
	 * Notice layout
	 *
	 * @var string
	 */
	private $notice = '';

	/**
	 * Epsilon_Dashboard_Setup constructor.
	 *
	 * @param array $theme
	 */
	public function __construct( $theme = array() ) {

		$this->theme = $theme;

		$theme = wp_get_theme();
		$arr   = array(
			'theme-name'    => $theme->get( 'Name' ),
			'theme-slug'    => $theme->get( 'TextDomain' ),
			'theme-version' => $theme->get( 'Version' ),
		);

		$this->theme = wp_parse_args( $this->theme, $arr );
	}

	/**
	 * @param array $theme
	 *
	 * @return Epsilon_Dashboard_Setup
	 */
	public static function get_instance( $theme = array() ) {
		static $inst;
		if ( ! $inst ) {
			$inst = new Epsilon_Dashboard_Setup( $theme );
		}

		return $inst;
	}

	/**
	 * Adds an admin notice in the backend
	 *
	 * If the Epsilon Notification class does not exist, we stop
	 */
	public function add_admin_notice() {
		if ( ! class_exists( 'Epsilon_Notifications' ) ) {
			return;
		}

		if ( ! empty( $_GET ) && isset( $_GET['page'] ) && 'epsilon-onboarding' === $_GET['page'] ) {
			return;
		}

		$used_onboarding = get_theme_mod( $this->theme['theme-slug'] . '_used_onboarding', false );
		if ( $used_onboarding ) {
			return;
		}

		$imported_demo = Epsilon_Init_Notify_System::check_installed_data();
		if ( $imported_demo ) {
			return;
		}

		if ( empty( $this->notice ) ) {
			$this->notice .= '<img src="' . esc_url( get_template_directory_uri() ) . '/inc/libraries/epsilon-theme-dashboard/assets/images/colorlib-logo-dark.png" class="epsilon-author-logo" />';


			/* Translators: Notice Title */
			$this->notice .= '<h1>' . sprintf( esc_html__( 'Welcome to %1$s', 'magazine' ), $this->theme['theme-name'] ) . '</h1>';
			$this->notice .= '<p>';
			$this->notice .=
				sprintf( /* Translators: Notice */
					esc_html__( 'Welcome! Thank you for choosing %3$s! To fully take advantage of the best our theme can offer please make sure you visit our %1$swelcome page%2$s.', 'magazine' ),
					'<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme['theme-slug'] . '-dashboard' ) ) . '">',
					'</a>',
					$this->theme['theme-name']
				);
			$this->notice .= '</p>';
			/* Translators: Notice URL */
			$this->notice .= '<p><a href="' . esc_url( admin_url( '?page=epsilon-onboarding' ) ) . '" class="button button-primary button-hero" style="text-decoration: none;"> ' . sprintf( esc_html__( 'Get started with %1$s', 'magazine' ), $this->theme['theme-name'] ) . '</a></p>';
		}
		$notifications = Epsilon_Notifications::get_instance();
		$notifications->add_notice(
			array(
				'id'      => 'notification_testing',
				'type'    => 'notice epsilon-big',
				'message' => $this->notice,
			)
		);
	}

	/**
	 * Edd params
	 *
	 * @return array
	 */
	public function get_edd( $setup = array() ) {
		$options = get_option( $setup['theme']['theme-slug'] . '_license_object', array() );
		$options = wp_parse_args(
			$options,
			array(
				'expires'       => false,
				'licenseStatus' => false,
			)
		);

		return array(
			'license'       => trim( get_option( $setup['theme']['theme-slug'] . '_license_key', false ) ),
			'licenseOption' => $setup['theme']['theme-slug'] . '_license_key',
			'downloadId'    => '221300',
			'expires'       => $options['expires'],
			'status'        => $options['licenseStatus']
		);
	}

	/**
	 * Onboarding steps
	 *
	 * @return array
	 */
	public function get_steps() {
		return array(
			array(
				'id'       => 'landing',
				'title'    => __( 'Welcome to magazine', 'magazine' ),
				'content'  => array(
					'paragraphs' => array(
						__( ' This wizard will set up your theme, install plugins and import demo content. It is optional & should take less than a minute.', 'magazine' ),
					),
				),
				'progress' => __( 'Getting Started', 'magazine' ),
				'buttons'  => array(
					'next' => array(
						'action' => 'next',
						'label'  => __( 'Let\'s get started <span class="dashicons dashicons-arrow-right-alt2"></span>', 'magazine' ),
					),
				),
			),
			array(
				'id'       => 'plugins',
				'title'    => __( 'Install Recommended Plugins', 'magazine' ),
				'content'  => array(
					'paragraphs' => array(
						__( 'magazine integrates tightly with a few plugins that we recommend installing to get the full theme experience, as we\'ve intended it to be. This is an optional step, but we recommend installing them as we think these hand-picked plugins work really nice with magazine and help enhance the overall experience.', 'magazine' ),
					),
				),
				'progress' => __( 'Plugins', 'magazine' ),
				'buttons'  => array(
					'next' => array(
						'action' => 'next',
						'label'  => __( 'Next <span class="dashicons dashicons-arrow-right-alt2"></span>', 'magazine' ),
					),
				),
			),
			array(
				'id'       => 'enjoy',
				'title'    => __( 'Almost ready', 'magazine' ),
				'content'  => array(
					'paragraphs' => array(
						sprintf( __( 'Your new theme has been all set up. Enjoy your new theme by <a href="%s">Colorlib</a>.', 'magazine' ), esc_url( 'https://www.colorlib.com' ) ),
						$this->get_permission_content(),
					),
				),
				'progress' => __( 'Finished', 'magazine' ),
				'buttons'  => array(
					'next' => array(
						'action' => 'customizer',
						'label'  => __( 'Allow & Finish', 'magazine' ),
					),
				),
			),
		);
	}

	/**
	 * Returns a html string
	 *
	 * @return string
	 */
	public function get_permission_content() {
		$html = '<div class="permission-request">';
		$html .= '<a href="#hidden-permissions" id="hidden-permissions-toggle"> ' . __( 'What permissions are being granted', 'magazine' ) . ' <span class="dashicons dashicons-arrow-down"></span></a>';
		$html .= '<div id="hidden-permissions" >
			<ul>
				<li>
					<span class="dashicons dashicons-admin-users"></span>
					<span class="content">
						<strong>' . __( 'YOUR PROFILE OVERVIEW', 'magazine' ) . '</strong>
						<small>' . __( 'Name and email address', 'magazine' ) . '</small>		
					</span>
				</li>
				<li>
					<span class="dashicons dashicons-admin-settings"></span>
					<span class="content">
						<strong>' . __( 'YOUR SITE OVERVIEW', 'magazine' ) . '</strong>
						<small>' . __( 'Site URL, WP Version, PHP Version, plugins and themes', 'magazine' ) . '</small>		
					</span>
				</li>
				<li>
					<span class="dashicons dashicons-admin-plugins"></span>
					<span class="content">
						<strong>' . __( 'CURRENT PLUGIN EVENTS', 'magazine' ) . '</strong>
						<small>' . __( 'Activation, deactivation and uninstall', 'magazine' ) . '</small>		
					</span>
				</li>
			</ul>
			</div>
		</div>';

		return $html;
	}

	/**
	 * @param bool $integrated
	 *
	 * @return array
	 */
	public function get_plugins( $integrated = false ) {
		$arr = array(
			'contact-form-7' => array(
				'integration' => true,
				'recommended' => false,
			),
			'magazine-companion' => array(
				'integration' => true,
				'recommended' => false,
			),
			'elementor' => array(
				'integration' => true,
				'recommended' => false,
			),
			'one-click-demo-import' => array(
				'integration' => true,
				'recommended' => false,
			),
			'simple-custom-post-order'  => array(
				'integration' => false,
				'recommended' => true,
			),
			'colorlib-login-customizer' => array(
				'integration' => false,
				'recommended' => true,
			),

		);

		if ( ! $integrated ) {
			unset( $arr['contact-form-7'] );
			unset( $arr['magazine-companion'] );
			unset( $arr['elementor'] );
			unset( $arr['one-click-demo-import'] );
		}

		return $arr;
	}

	/**
	 * Dashboard actions
	 */
	public function get_actions() {
		if ( is_customize_preview() ) {
			return $this->_customizer_actions();
		}

		return array(

			array(
				'id'          => 'magazine-check-cf7',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'title', 'Contact Form 7', 'verify_cf7' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'description', 'Contact Form 7', 'verify_cf7' ),
				'plugin_slug' => 'contact-form-7',
				'state'       => false,
				'check'       => defined( 'WPCF7_VERSION' ),
				'actions'     => array(
					array(
						'label'   => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'installed', 'Contact Form 7', 'verify_cf7' ) ? __( 'Activate Plugin', 'magazine' ) : __( 'Install Plugin', 'magazine' ),
						'type'    => 'handle-plugin',
						'handler' => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'installed', 'Contact Form 7', 'verify_cf7' ),
					),
				),
			),
			array(
				'id'          => 'magazine-check-ac',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'title', 'magazine Companion' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'description', 'magazine Companion' ),
				'plugin_slug' => 'magazine-companion',
				'state'       => false,
				'check'       => defined( 'MAGAZINE_COMPANION_VERSION' ),
				'actions'     => array(
					array(
						'label'   => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'installed', 'magazine Companion' ) ? __( 'Activate Plugin', 'magazine' ) : __( 'Install Plugin', 'magazine' ),
						'type'    => 'handle-plugin',
						'handler' => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'installed', 'magazine Companion' ),
					),
				),
			),
			array(
				'id'          => 'magazine-check-elementor',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'title', 'Elementor' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'description', 'Elementor' ),
				'plugin_slug' => 'elementor',
				'state'       => false,
				'check'       => defined( 'ELEMENTOR_VERSION' ),
				'actions'     => array(
					array(
						'label'   => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'installed', 'Elementor' ) ? __( 'Activate Plugin', 'magazine' ) : __( 'Install Plugin', 'magazine' ),
						'type'    => 'handle-plugin',
						'handler' => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'installed', 'Elementor' ),
					),
				),
			),
			array(
				'id'          => 'magazine-check-ocdi',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'title', 'One Click Demo Import' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'description', 'One Click Demo Import' ),
				'plugin_slug' => 'one-click-demo-import',
				'state'       => false,
				'check'       => defined( 'PT_OCDI_VERSION' ),
				'actions'     => array(
					array(
						'label'   => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'installed', 'One Click Demo Import' ) ? __( 'Activate Plugin', 'magazine' ) : __( 'Install Plugin', 'magazine' ),
						'type'    => 'handle-plugin',
						'handler' => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'installed', 'One Click Demo Import' ),
					),
				),
			),
			array(
				'id'          => 'magazine-check-demoimport',
				'title'       => __( 'To import demo data go to Appearance > Import Demo Data', 'magazine' ),
				'description' => __( 'Before import demo data make sure your install one click demo import plugin.', 'magazine' ),
				'plugin_slug' => '',
				'state'       => false,
				'check'       => !empty( get_option( 'magazine_demodata_import' ) ) ? true : false,
				'actions'     => array(),
			)
		);
	}

	/**
	 * Render customizer actions
	 */
	private function _customizer_actions() {
		return array(

			array(
				'id'          => 'magazine-check-cf7',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'title', 'Contact Form 7', 'verify_cf7' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'contact-form-7', 'description', 'Contact Form 7', 'verify_cf7' ),
				'plugin_slug' => 'contact-form-7',
				'check'       => defined( 'WPCF7_VERSION' ),
			),
			array(
				'id'          => 'magazine-check-ac',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'title', 'magazine Companion' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'magazine-companion', 'description', 'magazine Companion' ),
				'plugin_slug' => 'magazine-companion',
				'check'       => defined( 'MAGAZINE_COMPANION_VERSION' ),
			),
			array(
				'id'          => 'magazine-check-elementor',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'title', 'Elementor' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'elementor', 'description', 'Elementor' ),
				'plugin_slug' => 'elementor',
				'check'       => defined( 'ELEMENTOR_VERSION' ),
			),
			array(
				'id'          => 'magazine-check-ocdi',
				'title'       => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'title', 'One Click Demo Import' ),
				'description' => Epsilon_Init_Notify_System::plugin_verifier( 'one-click-demo-import', 'description', 'One Click Demo Import' ),
				'plugin_slug' => 'one-click-demo-import',
				'check'       => defined( 'PT_OCDI_VERSION' ),
			),
		);
	}

	/**
	 * Welcome Screen tabs
	 *
	 * @param $setup array
	 *
	 * @return array
	 */
	public function get_tabs( $setup = array() ) {
		$theme = wp_get_theme();

		return array(
			array(
				'id'      => 'epsilon-getting-started',
				'title'   => esc_html__( 'Getting Started', 'magazine' ),
				'hidden'  => false,
				'type'    => 'info',
				'content' => array(
					array(
						'title'     => esc_html__( 'Step 1 - Implement recommended actions', 'magazine' ),
						'paragraph' => esc_html__( 'We compiled a list of steps for you, to take make sure the experience you will have using one of our products is very easy to follow.', 'magazine' ),
						'action'    => '<a href="' . esc_url( admin_url() . '?page=epsilon-onboarding' ) . '" class="button button-primary">' . __( 'Launch wizard', 'magazine' ) . '</a>',
					),
					array(
						'title'     => esc_html__( 'Step 2 - Check our documentation', 'magazine' ),
						'paragraph' => esc_html__( 'Even if you are a long-time WordPress user, we still believe you should give our documentation a very quick Read.', 'magazine' ),
						'action'    => '<a target="_blank" href="https://colorlib.com/">' . __( 'Full documentation', 'magazine' ) . '</a>',
					),
					array(
						'title'     => esc_html__( 'Step 3 - Customize everything', 'magazine' ),
						'paragraph' => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'magazine' ),
						'action'    => '<a target="_blank" href="' . esc_url( admin_url() . 'customize.php' ) . '" class="button button-primary">' . esc_html__( 'Go to Customizer', 'magazine' ) . '</a>',
					)
				),
			),
			array(
				'id'      => 'epsilon-actions',
				'title'   => esc_html__( 'Actions', 'magazine' ),
				'type'    => 'actions',
				'hidden'  => $this->theme['theme-slug'] . '_recommended_actions',
				'content' => $this->get_actions(),
			),
			array(
				'id'     => 'epsilon-plugins',
				'title'  => esc_html__( 'Recommended Plugins', 'magazine' ),
				'hidden' => $this->theme['theme-slug'] . '_recommended_plugins',
				'type'   => 'plugins',
			)
		);
	}

	/**
	 * Return privacy options
	 *
	 * @return array
	 */
	public function get_privacy_options() {
		$arr = array(
			$this->theme['theme-slug'] . '_recommended_actions' => get_option( $this->theme['theme-slug'] . '_recommended_actions', false ),
			$this->theme['theme-slug'] . '_recommended_plugins' => get_option( $this->theme['theme-slug'] . '_recommended_plugins', false ),

			
		);

		foreach ( $arr as $id => $val ) {
			$arr[ $id ] = empty( $val ) ? false : true;
		}

		return $arr;
	}
}