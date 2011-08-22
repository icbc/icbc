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
// no direct access
defined('_JEXEC') or die('Restricted access');
global $gantry;
if (!class_exists('FusionScriptLoader')) {
	class FusionScriptLoader { 
		function loadScripts(&$menu)
		{
			global $gantry, $isJSEnabled, $isPillEnabled;
			
			$enablejs = $menu->getParameter('enable_js', '1');
			$opacity = $menu->getParameter('opacity', 1);
			$effect = $menu->getParameter('effect', 'slidefade');
			$hidedelay = $menu->getParameter('hidedelay', 500);
			$menu_animation = $menu->getParameter('menu-animation', 'Quad.easeOut');
			$menu_duration = $menu->getParameter('menu-duration', 400);
			$pill = $menu->getParameter('pill-enabled', 0);
			$pill_animation = $menu->getParameter('pill-animation', 'Back.easeOut');
			$pill_duration = $menu->getParameter('pill-duration', 400);
			$tweakInitial_x = $menu->getParameter('tweak-initial-x', '0');
			$tweakInitial_y = $menu->getParameter('tweak-initial-y', '0');
			$tweakSubsequent_x = $menu->getParameter('tweak-subsequent-x', '0');
			$tweakSubsequent_y = $menu->getParameter('tweak-subsequent-y', '0');
			$centeredOffset = $menu->getParameter('centered-offset', '0');
			
			if ($enablejs != '1' && $enablejs != 1) $isJSEnabled = 'nojs';
			if ($pill != '1' && $pill != 1) $isPillEnabled = false;
			else $isPillEnabled = true;
			
			if ($effect == 'slidefade') $effect = "slide and fade";
			
			if ($gantry->browser->name == 'ie' && $effect == 'slide and fade') $effect = "slide";
		
		    if ($enablejs) {
				$gantry->addScript($gantry->baseUrl.'modules/mod_roknavmenu/themes/fusion/js/fusion.js');
		
		        $initialization = "
		        window.addEvent('load', function() {
					new Fusion('ul.menutop', {
						pill: $pill,
						effect: '$effect',
						opacity: $opacity,
						hideDelay: $hidedelay,
						centered: $centeredOffset,
						tweakInitial: {'x': ".$tweakInitial_x.", 'y': ".$tweakInitial_y."},
        				tweakSubsequent: {'x': ".$tweakSubsequent_x.", 'y': ".$tweakSubsequent_y."},
						menuFx: {duration: $menu_duration, transition: Fx.Transitions.$menu_animation},
						pillFx: {duration: $pill_duration, transition: Fx.Transitions.$pill_animation}
					});
	            });";
	            $gantry->addInlineScript($initialization);
	        }
		}
	}
}

FusionScriptLoader::loadScripts($menu);

global $activeid, $isJSEnabled, $isPillEnabled;
$activeid = $menu->getParameter('enable_current_id',0) == 0 ? false : true;
$gantry->addStyle('fusionmenu.css');

if (!defined('modRokNavMenuShowItems')) {

	function showItem(&$item, &$menu) {
	   global $activeid, $gantry;
   
	    //get columns count for children
	    $columns = $item->getParameter('fusion_columns',1);
	    //get custom image
	    $custom_image = $item->getParameter('fusion_customimage');
	    if ($custom_image && $custom_image != -1) $item->addLinkClass('image');
	    else $item->addLinkClass('bullet');

	    //not so elegant solution to add subtext
	    $item->subtext = $item->getParameter('fusion_item_subtext','');
	    if ($item->subtext=='') $item->subtext = false;
	    else $item->addLinkClass('subtext');
	?>
	<li <?php if($item->hasListItemClasses()) : ?>class="<?php echo $item->getListItemClasses()?>"<?php endif;?> <?php if(isset($item->css_id) && $activeid):?>id="<?php echo $item->css_id;?>"<?php endif;?>>
		<?php if ($item->type == 'menuitem') : ?>
			<a <?php if($item->hasLinkClasses()):?>class="<?php echo $item->getLinkClasses();?>"<?php endif;?> <?php if($item->hasLink()):?>href="<?php echo $item->getLink();?>"<?php endif;?> <?php if(isset($item->target)):?>target="<?php echo $item->target;?>"<?php endif;?> <?php if(isset($item->onclick)):?>onclick="<?php echo $item->onclick;?>"<?php endif;?><?php if($item->hasLinkAttribs()):?> <?php echo $item->getLinkAttribs();?><?php endif;?>>
				<span>
			    <?php if ($custom_image && $custom_image != -1) :?>
			        <img src="<?php echo $gantry->templateUrl."/images/icons/".$custom_image; ?>" alt="<?php echo $custom_image; ?>" />
			    <?php endif; ?>
				<?php echo $item->title;?>
				<?php if (!empty($item->subtext)) :?>
				<em><?php echo $item->subtext; ?></em>    
				<?php endif; ?>   
				</span>
			</a>
		<?php elseif($item->type == 'separator') : ?>
			<span <?php if($item->hasLinkClasses()):?>class="<?php echo $item->getLinkClasses();?> nolink"<?php endif;?>>
			    <span>
			        <?php if ($custom_image && $custom_image != -1) :?>
	    		        <img src="<?php echo $gantry->templateUrl."/images/icons/".$custom_image; ?>" alt="<?php echo $custom_image; ?>" />
	    		    <?php endif; ?>
			    <?php echo $item->title;?>
			    <?php if (!empty($item->subtext)) :?>
				<em><?php echo $item->subtext; ?></em>    
				<?php endif; ?>
			    </span>
			</span>
		<?php endif; ?>
	
		<?php if ($item->hasChildren()): ?>
			<div class="fusion-submenu-wrapper level<?php echo intval($item->level)+2; ?><?php if ($columns > 1) echo ' columns'.$columns; ?>">
				<div class="drop-top"></div>
				<ul class="level<?php echo intval($item->level)+2; ?><?php if ($columns > 1) echo ' columns'.$columns; ?>">
					<?php foreach ($item->getChildren() as $child) : ?>			
						<?php showItem($child, $menu); ?>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>	
	</li>	
	<?php
	} 
		define('modRokNavMenuShowItems', true);
	}
?>
<?php if (!$isPillEnabled): ?>
<div class="nopill">
<?php endif; ?>
	<ul class="menutop level1 <?php echo $isJSEnabled; ?>" <?php if($menu->getParameter('tag_id') != null):?>id="<?php echo $menu->getParameter('tag_id');?>"<?php endif;?>>
		<?php foreach ($menu->getChildren() as $item) :  ?>
			<?php showItem($item, $menu); ?>
		<?php endforeach; ?>
	</ul>
<?php if (!$isPillEnabled): ?>
</div>
<?php endif; ?>