<?php
/**
 * Class Settings.
 *
 * @copyright 2018 Eduardo Kraus  {@link http://videofront.com.br}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class Settings
{
    public function __construct ()
    {
        if ( is_admin () ) {
            add_filter ( 'plugin_action_links', array( $this, 'plugin_action_links' ), 10, 2 );
            add_action ( 'admin_menu', array( $this, 'add_options_menu' ) );
        }
    }

    public function plugin_action_links ( $links, $file )
    {
        if ( strpos ( $file, 'Videofront' ) ) {
            $links[] = '<a href="options-general.php?page=videofront-settings">Configurações</a>';
        }

        return $links;
    }

    public function add_options_menu ()
    {
        add_options_page ( 'VideoFront Embed', 'VideoFront Embed', 'manage_options', 'videofront-settings',
            array( $this, 'display_options_page' )
        );

        add_action ( 'admin_init', array( $this, 'admin_init_settings' ) );
    }

    public function admin_init_settings ()
    {
        register_setting ( 'videofront-settings-group', 'videofront_url' );
        register_setting ( 'videofront-settings-group', 'videofront_token' );
    }

    public function display_options_page ()
    {
        ?>
        <div class="wrap">
        <h2>Configurações da Videoteca</h2>

        <form method="post" action="options.php">
            <?php settings_fields ( 'videofront-settings-group' ); ?>
            <?php do_settings_sections ( 'videofront-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Url da Videoteca</th>
                    <td>
                        <input type="text" name="videofront_url" style="width:80%"
                               value="<?php echo esc_attr ( get_option ( 'videofront_url' ) ); ?>"/>
                        <p><label for="ping_sites">Adicione a URL da Videoteca para a sincronização dos
                                Vídeos!</label></p>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row">Token da Videoteca</th>
                    <td>
                        <input type="text" name="videofront_token" style="width:60%"
                               value="<?php echo esc_attr ( get_option ( 'videofront_token' ) ); ?>"/>
                        <p><label for="ping_sites">Token para API poder se comunicar com a Videoteca!</label>
                        </p>
                    </td>
                </tr>
            </table>

            <?php submit_button (); ?>

        </form>
        </div><?php
    }
}