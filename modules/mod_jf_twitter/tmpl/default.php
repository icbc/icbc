<?php
/* @author		JOOFORGE.com
 * @copyright	Copyright(C) 2010 Jooforge
 * @licence		GNU/GPL http://www.gnu.org/copyleft/gpl.html */
 
defined('_JEXEC') or die('Restricted access');

?>

<div class="jf_twitter">
	<div class="tw_top"><div><div></div></div></div>
	<div class="tw_main">
		<?php if($profile && $showuser == 1): ?>
		<div class="tw_profile">
			<img src="<?php echo $profile->profile_image_url; ?>" alt="<?php echo $profile->name; ?>" />
			<h4 class="tw_user">
				<a href="http://www.twitter.com/<?php echo $profile->screen_name; ?>" target="_blank" title="<?php echo JText::_('FOLLOWUS'); ?>"><?php echo $profile->name; ?></a>
			</h4>
		</div>
		<?php endif; ?>
		<div class="tw_tweets">
			<div class="tw_rail">
				<div class="tw_page">
					<?php if(!$profile): ?>
					<div class="tw_tweet">
						<span class="tw_date">Twit twit... ops!</span>
						<span class="tw_text"><?php echo JText::_('TWITERROR'); ?></span>
					</div>
					<?php endif; ?>
					<?php foreach($tweets as $i => $tweet): ?>
					<div class="tw_tweet">
						<span class="tw_date"><?php echo $twitter->timeSince($tweet->created_at); ?></span>
						<span class="tw_text"><?php echo $twitter->parseText($tweet->text); ?></span>
					</div>
					<?php if(($i+1) % $page == 0 && ($i+1) < count($tweets)): ?>
					</div><div class="tw_page">
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="tw_bottom"><div><div></div></div></div>
	<div class="tw_sub">
		<img src="<?php echo JURI::root(true); ?>/modules/mod_jf_twitter/images/bird.png" alt="Twitter" />
		<div class="tw_controls">
			<a class="tw_previous" title="<?php echo JText::_('PREV'); ?>"><?php echo JText::_('PREV'); ?></a>
			<a class="tw_next" title="<?php echo JText::_('NEXT'); ?>"><?php echo JText::_('NEXT'); ?></a>
		</div>
	</div>

</div>