<?php
/**
 * @package   Quantive Template - RocketTheme
 * @version   1.5.3 June 14, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Quantive Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
/**
 * @version $Id: modules.php 5556 2006-10-23 19:56:02Z Jinx $
 * @package Joomla
 * @copyright Copyright (C) 2005 - 2006 Open Source Matters. All rights reserved.
 * @license GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a slider
 */

function modChrome_sidemenu($module, &$params, &$attribs)
{
	global $Itemid;
	
	$start	= intval($params->get('sidemenu-startLevel'));

	$tabmenu = &JSite::getMenu();
	$item = $tabmenu->getItem($Itemid);
	
	$level = sizeof($item->tree);

	if (isset($item) && $start <= $level) {
        $menu_title = "";

        if ($start == 0) $start = 1;

        $menu_title_item_id = $item->tree[$start-1];
        $menu_title_item = $tabmenu->getItem($menu_title_item_id);
       
	
		if (!empty ($module->content) && $module->content != '') : ?>
	        <?php if ($params->get('sidemenu-class_sfx')!='') : ?>
	        <div class="<?php echo $params->get('sidemenu-class_sfx'); ?>">
	        <?php endif; ?>
	            <div class="rt-block">
					<div class="module-content">
						<div class="module-title"><h2 class="title"><?php echo $menu_title_item->name.' '.JText::_('Menu'); ?></h2></div>
						<div class="clear"></div>
						<div class="module-inner">
	                		<?php echo $module->content; ?>
						</div>
					</div>
	            </div>
	        <?php if ($params->get('sidemenu-class_sfx')!='') : ?>
	        </div>
			<?php endif; ?>
		<?php endif;
	}
}

function modChrome_basic($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
		<?php echo $module->content; ?>
	<?php endif;
}

function modChrome_breadcrumbs($module, &$params, &$attribs)
{
    	
	if (!empty ($module->content)) : ?>
	<div class="rt-breadcrumb-surround">
		<a href="<?php echo JURI::base(); ?>" id="breadcrumbs-home"></a>
		<?php echo $module->content; ?>
	</div>
	<?php endif;
}

function modChrome_showcase($module, &$params, &$attribs)
{
 	if (!empty ($module->content)) : ?>
        <?php if ($params->get('moduleclass_sfx')!='') : ?>
        <div class="<?php echo $params->get('moduleclass_sfx'); ?>">
        <?php endif; ?>
            <div class="rt-block">
               	<?php if ($module->showtitle != 0) : ?>
				<div class="module-title"><h2 class="title"><?php echo $module->title; ?></h2></div>
				<div class="clear"></div>
                <?php endif; ?>
				<div class="module-content">
                	<?php echo $module->content; ?>
				</div>
            </div>
        <?php if ($params->get('moduleclass_sfx')!='') : ?>
        </div>
	<?php endif; ?>
	<?php endif;
}

function modChrome_standard($module, &$params, &$attribs)
{
 	if (!empty ($module->content)) : ?>
        <?php if ($params->get('moduleclass_sfx')!='') : ?>
        <div class="<?php echo $params->get('moduleclass_sfx'); ?>">
        <?php endif; ?>
            <div class="rt-block">
				<div class="rt-module-surround">
					<div class="rt-module-top"><div class="rt-module-top2"><div class="rt-module-top3"></div></div></div>
					<div class="rt-module-inner">
	                	<?php if ($module->showtitle != 0) : ?>
						<div class="module-title"><h2 class="title"><?php echo $module->title; ?></h2></div>
						<div class="clear"></div>
		                <?php endif; ?>
						<div class="module-content">
		                	<?php echo $module->content; ?>
						</div>
					</div>
					<div class="rt-module-bottom"><div class="rt-module-bottom2"><div class="rt-module-bottom3"></div></div></div>
				</div>
            </div>
        <?php if ($params->get('moduleclass_sfx')!='') : ?>
        </div>
	<?php endif; ?>
	<?php endif;
}

function modChrome_popup($module, &$params, &$attribs)
{
 	if (!empty ($module->content)) : ?>
	<div class="rt-block">
		<div class="module-content">
			<?php if ($module->showtitle != 0) : ?>
			<h2 class="title"><?php echo $module->title; ?></h2>
			<?php endif; ?>
			<div class="module-inner">
               	<?php echo $module->content; ?>
			</div>
		</div>
	</div>
	<?php endif;
}

?>

