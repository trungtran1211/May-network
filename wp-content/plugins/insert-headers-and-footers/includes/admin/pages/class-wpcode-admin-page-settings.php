<?php
/**
 * Settings admin page.
 *
 * @package WPCode
 */

/**
 * Class for the Settings admin page.
 */
class WPCode_Admin_Page_Settings extends WPCode_Admin_Page {

	/**
	 * The page slug to be used when adding the submenu.
	 *
	 * @var string
	 */
	public $page_slug = 'wpcode-settings';

	/**
	 * The action used for the nonce.
	 *
	 * @var string
	 */
	protected $action = 'wpcode-settings';

	/**
	 * The nonce name field.
	 *
	 * @var string
	 */
	protected $nonce_name = 'wpcode-settings_nonce';

	/**
	 * Call this just to set the page title translatable.
	 */
	public function __construct() {
		$this->page_title = __( 'Settings', 'insert-headers-and-footers' );
		parent::__construct();
	}

	/**
	 * Register hook on admin init just for this page.
	 *
	 * @return void
	 */
	public function page_hooks() {
		add_action( 'admin_init', array( $this, 'submit_listener' ) );
	}

	/**
	 * Wrap this page in a form tag.
	 *
	 * @return void
	 */
	public function output() {
		?>
		<form action="<?php echo esc_url( $this->get_page_action_url() ); ?>" method="post">
			<?php parent::output(); ?>
		</form>
		<?php
	}

	/**
	 * The Settings page output.
	 *
	 * @return void
	 */
	public function output_content() {
		$header_and_footers = wpcode()->settings->get_option( 'headers_footers_mode' );

		$description = __( 'This allows you to disable all Code Snippets functionality and have a single "Headers & Footers" item under the settings menu.', 'insert-headers-and-footers' );

		$description .= '<br />';
		$description .= sprintf(
		// Translators: Placeholders make the text bold.
			__( '%1$sNOTE:%2$s Please use this setting with caution. It will disable all custom snippets that you add using the new snippet management interface.', 'insert-headers-and-footers' ),
			'<strong>',
			'</strong>'
		);

		$this->metabox_row(
			__( 'Headers & Footers mode', 'insert-headers-and-footers' ),
			$this->get_checkbox_toggle(
				$header_and_footers,
				'headers_footers_mode',
				$description
			),
			'headers_footers_mode'
		);

		$this->metabox_row(
			__( 'WPCode Library Connection', 'insert-headers-and-footers' ),
			$this->get_library_connection_input()
		);

		$this->metabox_row(
			__( 'Editor Height', 'insert-headers-and-footers' ),
			$this->get_editor_height_input(),
			'wpcode-editor-height'
		);

		wp_nonce_field( $this->action, $this->nonce_name );
	}

	/**
	 * Get an input to connect or disconnect from the snippet library.
	 *
	 * @return string
	 */
	public function get_library_connection_input() {
		$button_classes = array(
			'wpcode-button',
		);
		$button_text    = __( 'Connect to the WPCode Library', 'insert-headers-and-footers' );
		if ( WPCode()->library_auth->has_auth() ) {
			$button_classes[] = 'wpcode-delete-auth';
			$button_text      = __( 'Disconnect from the WPCode Library', 'insert-headers-and-footers' );
		} else {
			$button_classes[] = 'wpcode-start-auth';
		}

		return sprintf(
			'<button type="button" class="%1$s">%2$s</button>',
			esc_attr( implode( ' ', $button_classes ) ),
			esc_html( $button_text )
		);
	}

	/**
	 * For this page we output a title and the save button.
	 *
	 * @return void
	 */
	public function output_header_bottom() {
		?>
		<div class="wpcode-column">
			<h1><?php esc_html_e( 'Settings', 'insert-headers-and-footers' ); ?></h1>
		</div>
		<div class="wpcode-column">
			<button class="wpcode-button" type="submit">
				<?php esc_html_e( 'Save Changes', 'insert-headers-and-footers' ); ?>
			</button>
		</div>
		<?php
	}

	/**
	 * If the form is submitted attempt to save the values.
	 *
	 * @return void
	 */
	public function submit_listener() {
		if ( ! isset( $_REQUEST[ $this->nonce_name ] ) || ! wp_verify_nonce( sanitize_key( $_REQUEST[ $this->nonce_name ] ), $this->action ) ) {
			// Nonce is missing, so we're not even going to try.
			return;
		}

		$settings = array(
			'headers_footers_mode' => isset( $_POST['headers_footers_mode'] ),
			'editor_height_auto'   => isset( $_POST['editor_height_auto'] ),
			'editor_height'        => isset( $_POST['editor_height'] ) ? absint( $_POST['editor_height'] ) : 300,
		);

		wpcode()->settings->bulk_update_options( $settings );

		if ( true === $settings['headers_footers_mode'] ) {
			wp_safe_redirect(
				add_query_arg(
					array(
						'page'    => 'wpcode-headers-footers',
						'message' => 1,
					),
					admin_url( 'options-general.php' )
				)
			);
			exit;
		}

		$this->set_success_message( __( 'Settings Saved.', 'insert-headers-and-footers' ) );
	}

	/**
	 * Allow users to change the code editor height.
	 *
	 * @return string
	 */
	public function get_editor_height_input() {
		$editor_auto_height = boolval( wpcode()->settings->get_option( 'editor_height_auto' ) );
		$editor_height      = wpcode()->settings->get_option( 'editor_height', 300 );

		$html = sprintf( '<input type="number" min="100" value="%1$d" id="wpcode-editor-height" name="editor_height" %2$s />',
			absint( $editor_height ),
			disabled( $editor_auto_height, true, false )
		);
		$html .= $this->get_checkbox_toggle(
			$editor_auto_height,
			'editor_height_auto'
		);
		$html .= '<label for="editor_height_auto">' . __( 'Auto height', 'insert-headers-and-footers' ) . '</label>';

		$html .= '<p class="description">';
		$html .= esc_html__( 'Set the editor height in pixels or enable auto-grow so the code editor automatically grows in height with the code.', 'insert-headers-and-footers' );
		$html .= '</p>';

		return $html;
	}
}
