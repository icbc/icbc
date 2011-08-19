<?php
/**
 * @package   gantry
 * @subpackage html.layouts
 * @version   1.5.3 June 14, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

gantry_import('core.gantrylayout');

/**
 *
 * @package gantry
 * @subpackage html.layouts
 */
class GantryLayoutBody_MainBody extends GantryLayout {
    var $render_params = array(
        'schema'        =>  null,
        'pushPull'      =>  null,
        'classKey'      =>  null,
        'sidebars'      =>  '',
        'contentTop'    =>  null,
        'contentBottom' =>  null
    );
    function render($params = array()){
        global $gantry;

        $fparams = $this-> _getParams($params);

        // logic to determine if the component should be displayed
        $display_component = !($gantry->get("component-enabled",true)==false && JRequest::getVar('view') == 'frontpage');
        ob_start();
// XHTML LAYOUT
?>          <div id="rt-main" class="<?php echo $fparams->classKey; ?>">
                <div class="rt-main-inner">
                    <div class="rt-grid-<?php echo $fparams->schema['mb']; ?> <?php echo $fparams->pushPull[0]; ?>">
                        <?php if (isset($fparams->contentTop)) : ?>
                        <div id="rt-content-top">
                            <?php echo $fparams->contentTop; ?>
							<div class="clear"></div>
                        </div>
                        <?php endif; ?>
                        <div class="rt-block">
                            <?php if ($display_component) : ?>
							<div class="<?php echo $gantry->get('articlestyle'); ?>">
							<div class="rt-module-surround">
								<div class="rt-module-top"><div class="rt-module-top2"><div class="rt-module-top3"></div></div></div>
								<div class="rt-module-inner">
		                            <div id="rt-mainbody">
		                                <jdoc:include type="component" />
		                            </div>
									<div class="clear"></div>
								</div>
								<div class="rt-module-bottom"><div class="rt-module-bottom2"><div class="rt-module-bottom3"></div></div></div>
							</div>
							</div>
                            <?php endif; ?>
                        </div>
                        <?php if (isset($fparams->contentBottom)) : ?>
                        <div id="rt-content-bottom">
                            <?php echo $fparams->contentBottom; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php echo $fparams->sidebars; ?>
                    <div class="clear"></div>
                </div>
            </div>
<?php
        return ob_get_clean();
    }
}