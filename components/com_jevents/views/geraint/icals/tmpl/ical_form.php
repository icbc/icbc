<?php
defined('_JEXEC') or die('Restricted access');

$cfg = & JEVConfig::getInstance();

$view = $this->getViewName();

$script= <<<SCRIPT
function clearIcalCategories(allcats){
	if(allcats.checked){
		document.getElements('input[name=categories[]]:checked').each (function(el){
			if (el.value!=0){
				el.checked=false;
			}
		});
	}
	else {
		document.getElements('input[name=categories[]]').each (function(el){
			if (el.value!=0 && el.checked==false){
				el.checked=true;
			}
		});
	}
}
function clearAllIcalCategories(){
		document.getElements('input[name=categories[]]:checked').each (function(el){
			if (el.value==0){
				el.checked=false;
			}
		});
}
function clearIcalYears(allyears){
	if(allyears.checked){
		document.getElements('input[name=years[]]:checked').each (function(el){
			if (el.value!=0){
				el.checked=false;
			}
		});
	}
	else {
		document.getElements('input[name=years[]]').each (function(el){
			if (el.value!=0 && el.checked==false){
				el.checked=true;
			}
		});
	}
}
function clearAllIcalYears(){
		document.getElements('input[name=years[]]:checked').each (function(el){
			if (el.value==0){
				el.checked=false;
			}
		});
}

SCRIPT;
$doc = JFactory::getDocument();
$doc->addScriptDeclaration($script);

echo "<h2 id='cal_title'>" . JText::_('JEV_ICAL_EXPORT') . "</h2>\n";
?>

<form name="ical" method="post">
<?php
$categories = JEV_CommonFunctions::getCategoryData();

$accessiblecats = explode(",", $this->datamodel->accessibleCategoryList());

echo "<h3>" . JText::_('JEV_EVENT_CHOOSE_CATEG') . "</h3>\n";
// All categories
$cb = "<input name=\"categories[]\" value=\"0\" type=\"checkbox\" onclick='clearIcalCategories(this);' ";
if (!isset($_POST['categories']))
{
	$cb=$cb." CHECKED";
}
else if (isset($_POST['categories']) && in_array(0, JRequest::getVar('categories', '', 'POST')))
{
	$cb = $cb . " CHECKED";
}
echo $cb . "><span >&nbsp;&nbsp;&nbsp;&nbsp;</span><strong>" . JText::_("JEV_EVENT_ALLCAT"). "</strong><br/>\n";

foreach ($categories AS $c)
{
	// Make sure the user is authorised to view this category and the menu item doesn't block it!
	if (!in_array($c->id, $accessiblecats))
		continue;
	$cb = "<input name=\"categories[]\" value=\"" . $c->id . "\" type=\"checkbox\" onclick='clearAllIcalCategories(this);' ";
	if (!isset($_POST['categories']))
	{
		//$cb=$cb." CHECKED";
	}
	else if (isset($_POST['categories']) && in_array($c->id, JRequest::getVar('categories', '', 'POST')))
	{
		$cb = $cb . " CHECKED";
	}
	$cb = $cb . "><span style=\"background:" . $c->color . "\">&nbsp;&nbsp;&nbsp;&nbsp;</span> " . $c->title . "<br/>\n";
	echo $cb;
}

echo "<h3>" . JText::_('JEV_REP_YEAR') . "</h3>\n";

// All years
$yt = "<input name=\"years[]\" type=\"checkbox\" value=\"0\"  onclick='clearIcalYears(this);' ";
if (!isset($_POST['years']))
{
	$yt = $yt . " CHECKED";
}
else if (isset($_POST['years']) && in_array(0, JRequest::getVar('years', '', 'POST')))
{
	$yt = $yt . " CHECKED";
}
$yt = $yt . "><strong>" . JText::_("JEV_EVENT_ALLYEARS")  . "</strong><br/>\n";
echo $yt;

//consturc years array, easy to add own kind of selection
$params = JComponentHelper::getParams(JEV_COM_COMPONENT);
$year = array();
for ($y = $params->get("com_earliestyear", date('Y')); $y <= $params->get("com_latestyear", date('Y')); $y++)
{
	if (!in_array($y, $year))
		$year[] = $y;
}

foreach ($year AS $y)
{
	$yt = "<input name=\"years[]\" type=\"checkbox\" value=\"" . $y . "\" onclick='clearAllIcalYears(this);' ";
	if (!isset($_POST['years']))
	{
		//$yt = $yt . " CHECKED";
	}
	else if (isset($_POST['years']) && in_array($y, JRequest::getVar('years', '', 'POST')))
	{
		$yt = $yt . " CHECKED";
	}
	$yt = $yt . ">" . $y . "<br/>\n";
	echo $yt;
}

echo "<h3>" . JText::_('JEV_ICAL_FORMATTING') . "</h3>\n";
?>
	<label><input name="icalformatted" type="checkbox" value="1" <?php echo JRequest::getInt("icalformatted", 0) ? "checked='checked'" : ""; ?>/><?php echo JText::_("JEV_PRESERVE_HTML_FORMATTING"); ?></label>
	<br/>
	<br/>

	<input type="submit" name="submit" value="<?php echo JText::_('JEV_SELECT'); ?>" />

</form>

<?php
if (isset($_POST['submit']))
{

	$categories = JRequest::getVar('categories', array(0), 'POST');

	$cats = array();
	foreach ($categories AS $cid)
	{
		$cid = intval($cid);
		// Make sure the user is authorised to view this category and the menu item doesn't block it!
		if (!in_array($cid, $accessiblecats) && $cid=!0)
			continue;
		$cats[] = $cid;
	}
	if (count($cats) == 0)
		$cats[] = 0;


	//$years  = str_replace(",","|",JEVHelper::forceIntegerArray(JRequest::getVar('years','','POST'),true));
	//$cats = implode("|",$cats);
	$years = JEVHelper::forceIntegerArray(JRequest::getVar('years', array(0), 'POST'), true);
	$cats = implode(",", $cats);

	$link = JURI::root() . "index.php?option=com_jevents&task=icals.export&format=ical";
	if (count($cats) > 0)
	{
		$link .="&catids=" . $cats;
	}
	$link .="&years=" . $years;
	if (JRequest::getInt("icalformatted", 0))
	{
		$link .="&icf=1";
	}

	$params = JComponentHelper::getParams(JEV_COM_COMPONENT);
	$icalkey = $params->get("icalkey", "secret phrase");
	$publiclink = $link . "&k=" . md5($icalkey . $cats . $years);

	$user = JFactory::getUser();
	if ($user->id != 0)
	{
		$privatelink = $link . "&pk=" . md5($icalkey . $cats . $years . $user->password . $user->username . $user->id) . "&i=" . $user->id;
	}

	echo "<p><a href='$publiclink'>" . JText::_('JEV_REP_ICAL_PUBLIC') . "</a></p>";
	if ($user->id != 0)
	{
		echo "<p><a href='$privatelink'>" . JText::_('JEV_REP_ICAL_PRIVATE') . "</a></p>";
	}

	if ($cfg->get("outlook2003icalexport", 0))
	{
		echo "<p>" . JText::_('Outlook 2003 specific links') . "</p>";
		echo "<p><a href='$publiclink&outlook2003=1'>" . JText::_('JEV_REP_ICAL_PUBLIC') . "</a></p>";
		if ($user->id != 0)
		{
			echo "<p><a href='$privatelink&outlook2003='>" . JText::_('JEV_REP_ICAL_PRIVATE') . "</a></p>";
		}
	}
}
