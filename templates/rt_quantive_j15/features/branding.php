<?php
/**
 * @package   Quantive Template - RocketTheme
 * @version   1.5.3 June 14, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

gantry_import('core.gantryfeature');

class GantryFeatureBranding extends GantryFeature {
    var $_feature_name = 'branding';

	function render($position="") {
	    ob_start();
	    ?>
		<div class="clear"></div>
		<div class="rt-block">
			<div id="developed-by">
				<?php echo JText::_('DEVELOPED_BY');?> <a href="http://www.rockettheme.com/" title="rockettheme.com" id="rocket"></a>
			</div>
			<div id="powered-by"> 
				<?php echo JText::_('POWERED_BY');?> <a href="http://www.rockettheme.com/gantry" title="Gantry Framework" id="gantry-logo"></a>
			</div>
			<div class="clear"></div>
		</div>
		<?php
	    return ob_get_clean();
	}
}