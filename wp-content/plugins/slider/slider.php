<?php
/**
 * slider
 *
 * @package       SLIDER
 * @author        Trushita Aranya
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   slider
 * Plugin URI:    https://mydomain.com
 * Description:   This plugin related to basic slider
 * Version:       1.0.0
 * Author:        Trushita Aranya
 * Author URI:    https://your-author-domain.com
 * Text Domain:   slider
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with slider. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'SLIDER_NAME',			'slider' );

// Plugin version
define( 'SLIDER_VERSION',		'1.0.0' );

// Plugin Root File
define( 'SLIDER_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'SLIDER_PLUGIN_BASE',	plugin_basename( SLIDER_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'SLIDER_PLUGIN_DIR',	plugin_dir_path( SLIDER_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'SLIDER_PLUGIN_URL',	plugin_dir_url( SLIDER_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once SLIDER_PLUGIN_DIR . 'core/class-slider.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Trushita Aranya
 * @since   1.0.0
 * @return  object|Slider
 */
function SLIDER() {
	return Slider::instance();
}

SLIDER();

function wpb_follow_us($content) {
	$content .= '<div><button>Start Animation</button>
	<p>By default, all HTML elements have a static position, and cannot be moved. To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!</p>
	<div id="slider-section" class="slider-div">HELLO</div>
	</div>';
	return $content; 
}
// Hook our function to WordPress the_content filter
add_filter('the_content', 'wpb_follow_us'); 