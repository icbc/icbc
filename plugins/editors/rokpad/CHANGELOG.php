<?php
/**
 * RokPad Editor Plugin
 *
 * @package RocketTheme
 * @subpackage rokpad
 * @version   1.2 April 9, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
?>

1. Copyright and disclaimer
----------------


2. Changelog
------------
This is a non-exhaustive changelog for RokPad, inclusive of any alpha, beta, release candidate and final versions.

Legend:

* -> Security Fix
# -> Bug Fix
+ -> Addition
^ -> Change
- -> Removed
! -> Note

---------------------- 1.2 Release [20-Mar-2010] ----------------------
20-Mar-2010 Djamil Legato
# Fixed IE issue with the built-in saving functionality that wasn't working properly.
# Fixed IE full screen issues
# Fixed resizing issues, now an overlay will appear when resizing in all browser rather than just Gecko

---------------------- 1.1 Release [17-Mar-2010] ----------------------
17-Mar-2010 Djamil Legato
^ Updated the CodeMirror library to latest version (0.66)
^ Found a way to have the apply/save functionalities being more flexible so that can adapt to (hopefully) most of the 3rd party components (ie, Joom!Fish, sh404SEF, ...).
# Manually fixed a core issue of CodeMirror that was causing infinite loops in certain circumstances (reported issue to the author).
^ Renamed some css names and made the css rules more restricted to avoid frontend templates conflicts.

---------------------- 1.0 Release [15-Jan-2010] ----------------------
13-Jan-2010 Djamil Legato
^ Updated the CodeMirror library to latest version (0.65)
+ Added text-formatting functionality. A set of buttons that you can create/modify through an XML (can be found at plugins/editors/rokpad/text-formatter/buttons.xml). Text-formatting allows also to create your own set of custom shortcuts to be attached to the custom buttons.
^ Line Numbers and Text Wrapper are now separated. You can now choose to have one, the other, both or none. They are totally independent and now Line Numbers supports wrapped text as well.
# Fixed several minor browsers specific issues (safari, internet explorer, opera)
# Workaround for preventing apply and save not working on those components that are not firing the editor onSave method.
! This is a major release.

---------------------- 0.7 Release [27-Sep-2009] ----------------------
27-Sep-2009 Brian Towles
# Fixed missing Serializer dir
+ Added index.html to all dirs

---------------------- 0.6 Release [24-Sep-2009] ----------------------
24-Sep-2009 Djamil Legato
# Fixed duplication of items when autosave was enabled.

---------------------- 0.5 Release [31-Aug-2009] ----------------------
31-Aug-2009 Djamil Legato
# Fixed RokPad save not working on Joomla! pages with no Apply button.
+ Added options for having wrapped lines. You can now choose between wrapped lines or line numbers. The two can't be enabled at the same time.

---------------------- 0.4 Release [14-Aug-2009] ----------------------
14-Aug-2009 Brian Towles
# Fixed language install issue.
# Fixed running htmlpurify under php4

14-Aug-2009 Djamil Legato
# Fixed + sign being dropped after tidying process
+ Undo is now enabled after tidying process

---------------------- 0.3 Release [12-Aug-2009] ----------------------

12-Aug-2009 Djamil Legato
# Fixed an issue on handling new custom modules created where the id and other infos weren't known yet.

07-Aug-2009 Brian Towles
^ Moved to a build script and plugin layout.
^ Added i18n and language files.
^ Moved to the htmlawed as a tidy script.


---------------------- 0.2 Release [06-Aug-2009] ----------------------

06-Aug-2009 Djamil Legato 
# Fixed HTML Tidy failing when the content had amps.
# Fixed z-indexing issue on Safari when RokPad in FullScreen mode.

---------------------- 0.1 Release [04-Aug-2009] ----------------------

04-Aug-2009 Djamil Legato 
! Initial release.