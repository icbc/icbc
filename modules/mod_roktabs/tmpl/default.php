<?php 
/**
 * RokTabs Module
 *
 * @package RocketTheme
 * @subpackage roktabs.tmpl
 * @version   1.12 March 11, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$document =& JFactory::getDocument();
$path = JPATH_SITE . '/modules/mod_roktabs/tmpl/';
$uri_path = JURI::Root(true).'/modules/mod_roktabs/tmpl/';

$count = count($list);

// options
$style 			    = $params->get('style', 'base');
$width			    = $params->get('width', 500);
$tabs			    = $params->get('tabs_count', 3);
$tabs_position		= $params->get('tabs_position', 'top');
$tabs_event			= $params->get('tabs_event', 'click');

$tabs_incremental	= $params->get('tabs_incremental', 'Tab ');

$linksMargins	    = $params->get('linksMargins', 0);
$duration	    	= $params->get('duration', 600);
$transition_type	= $params->get('transition_type', 'scrolling');
$transition_fx		= $params->get('transition_fx', 'Quad.easeInOut');
$autoplay		    = $params->get('autoplay', 0);
$autoplay_delay		= $params->get('autoplay_delay', 2000);


if (intval($tabs) > $count) $tabs = $count;
else if (intval($tabs) == 0) $tabs = $count;
if (strlen($tabs_incremental) <= 0) $tabs_incremental = "Tab ";

$style_css = $path . $style . '/roktabs.css';
$css = $uri_path . $style . '/roktabs.css';

if (file_exists($style_css)) $document->addStyleSheet($css);
if (!defined('ROKTABS_JS')) {
	$document->addScript($uri_path . 'roktabs.js');
	define('ROKTABS_JS',1);
}


$write_tabs = modRokTabsHelper::write_tabs($tabs, $tabs_position, $list, null, $tabs_incremental,null, $params);

?>
	<script type="text/javascript">
		RokTabsOptions.mouseevent.push('<?php echo $tabs_event; ?>');
		RokTabsOptions.duration.push(<?php echo $duration; ?>);
		RokTabsOptions.transition.push(Fx.Transitions.<?php echo $transition_fx; ?>);
		RokTabsOptions.auto.push(<?php echo $autoplay; ?>);
		RokTabsOptions.delay.push(<?php echo $autoplay_delay; ?>);
		RokTabsOptions.type.push('<?php echo $transition_type; ?>');
		RokTabsOptions.linksMargins.push(<?php echo $linksMargins; ?>);
	</script>
	<div class="roktabs-wrapper" style="width: <?php echo $width; ?>px;">
		<div class="roktabs <?php echo $style; ?>">
			<!--<div class="roktabs-arrows">
				<span class="previous">&larr;</span>
				<span class="next">&rarr;</span>
			</div>-->
			<?php 
				if ($tabs_position == 'top' || $tabs_position == 'hidden') echo $write_tabs;
			?>
			<div class="roktabs-container-tr">
				<div class="roktabs-container-tl">
					<div class="roktabs-container-br">
						<div class="roktabs-container-bl">
							<div class="roktabs-container-inner">
								<div class="roktabs-container-wrapper">
									<?php
									if ($tabs == 0) $tabs = count($list);
									for($i = 0; $i < $tabs; $i++) {
										if ($list[$i]->title != '' && $list[$i]->introtext != '') {
											echo "<div class='roktabs-tab".($i+1)."'>\n";
											echo "	<div class='wrapper'>\n";
											echo 		$list[$i]->introtext;
											echo "	</div>";
											echo "</div>\n";
										}
									}
									
									?>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<?php 
				if ($tabs_position == 'bottom') echo $write_tabs;
			?>
		</div>
	</div>
	
	
<?php

?>