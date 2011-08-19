-- Quantive RocketLauncher Package
-- April 2010 Joomla template release
-- http://www.rockettheme.com
--

-- --------------------------------------------------------

--
-- Table structure for table `#__banner`
--

DROP TABLE IF EXISTS `#__banner`;
CREATE TABLE IF NOT EXISTS `#__banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
);

--
-- Dumping data for table `#__banner`
--

INSERT INTO `#__banner` (`bid`, `cid`, `type`, `name`, `alias`, `imptotal`, `impmade`, `clicks`, `imageurl`, `clickurl`, `date`, `showBanner`, `checked_out`, `checked_out_time`, `editor`, `custombannercode`, `catid`, `description`, `sticky`, `ordering`, `publish_up`, `publish_down`, `tags`, `params`) VALUES
(1, 1, 'banner', 'OSM 1', 'osm-1', 0, 43, 0, 'osmbanner1.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 1, 'banner', 'OSM 2', 'osm-2', 0, 49, 0, 'osmbanner2.png', 'http://www.opensourcematters.org', '2004-07-07 15:31:29', 1, 0, '0000-00-00 00:00:00', '', '', 13, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 1, '', 'Joomla!', 'joomla', 0, 18, 0, '', 'http://www.joomla.org', '2006-05-29 14:21:28', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.', 14, '', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 1, '', 'JoomlaCode', 'joomlacode', 0, 18, 0, '', 'http://joomlacode.org', '2006-05-29 14:19:26', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.', 14, '', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 1, '', 'Joomla! Extensions', 'joomla-extensions', 0, 13, 0, '', 'http://extensions.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.', 14, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 1, '', 'Joomla! Shop', 'joomla-shop', 0, 13, 0, '', 'http://shop.joomla.org', '2006-05-29 14:23:21', 1, 0, '0000-00-00 00:00:00', '', '<a href="{CLICKURL}" target="_blank">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.', 14, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(7, 1, '', 'Joomla! Promo Shop', 'joomla-promo-shop', 0, 9, 1, 'shop-ad.jpg', 'http://shop.joomla.org', '2007-09-19 17:26:24', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(8, 1, '', 'Joomla! Promo Books', 'joomla-promo-books', 0, 9, 0, 'shop-ad-books.jpg', 'http://shop.joomla.org/amazoncom-bookstores.html', '2007-09-19 17:28:01', 1, 0, '0000-00-00 00:00:00', '', '', 33, '', 0, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `#__bannerclient`
--

DROP TABLE IF EXISTS `#__bannerclient`;
CREATE TABLE IF NOT EXISTS `#__bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
);

--
-- Dumping data for table `#__bannerclient`
--

INSERT INTO `#__bannerclient` (`cid`, `name`, `contact`, `email`, `extrainfo`, `checked_out`, `checked_out_time`, `editor`) VALUES
(1, 'Open Source Matters', 'Administrator', 'admin@opensourcematters.org', '', 0, '00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `#__bannertrack`
--

DROP TABLE IF EXISTS `#__bannertrack`;
CREATE TABLE IF NOT EXISTS `#__bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
);

--
-- Dumping data for table `#__bannertrack`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__categories`
--

DROP TABLE IF EXISTS `#__categories`;
CREATE TABLE IF NOT EXISTS `#__categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
);

--
-- Dumping data for table `#__categories`
--

INSERT INTO `#__categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(1, 0, 'Latest', '', 'latest-news', 'taking_notes.jpg', '1', 'left', 'The latest news from the Joomla! Team', 1, 0, '0000-00-00 00:00:00', '', 1, 0, 1, ''),
(2, 0, 'Joomla! Specific Links', '', 'joomla-specific-links', 'clock.jpg', 'com_weblinks', 'left', 'A selection of links that are all related to the Joomla! Project.', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(3, 0, 'Newsflash', '', 'newsflash', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', '', 2, 0, 0, ''),
(4, 0, 'Joomla!', '', 'joomla', '', 'com_newsfeeds', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(5, 0, 'Free and Open Source Software', '', 'free-and-open-source-software', '', 'com_newsfeeds', 'left', 'Read the latest news about free and open source software from some of its leading advocates.', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(6, 0, 'Related Projects', '', 'related-projects', '', 'com_newsfeeds', 'left', 'Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(12, 0, 'Contacts', '', 'contacts', '', 'com_contact_details', 'left', 'Contact Details for this Web site', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(13, 0, 'Joomla', '', 'joomla', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(14, 0, 'Text Ads', '', 'text-ads', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 0, 0, 0, ''),
(15, 0, 'Features', '', 'features', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 6, 0, 0, ''),
(17, 0, 'Benefits', '', 'benefits', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(18, 0, 'Platforms', '', 'platforms', '', 'com_content', 'left', '', 0, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(19, 0, 'Other Resources', '', 'other-resources', '', 'com_weblinks', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(29, 0, 'The CMS', '', 'the-cms', '', '4', 'left', 'Information about the software behind Joomla!<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(28, 0, 'Current Users', '', 'current-users', '', '3', 'left', 'Questions that users migrating to Joomla! 1.5 are likely to raise<br />', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(25, 0, 'The Project', '', 'the-project', '', '4', 'left', 'General facts about Joomla!<br />', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(27, 0, 'New to Joomla!', '', 'new-to-joomla', '', '3', 'left', 'Questions for new users of Joomla!', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(30, 0, 'The Community', '', 'the-community', '', '4', 'left', 'About the millions of Joomla! users and Web sites<br />', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(31, 0, 'General', '', 'general', '', '3', 'left', 'General questions about the Joomla! CMS', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(32, 0, 'Languages', '', 'languages', '', '3', 'left', 'Questions related to localisation and languages', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(33, 0, 'Joomla! Promo', '', 'joomla-promo', '', 'com_banner', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(34, 0, 'Demo Articles', '', 'demo-articles', '', '5', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(35, 0, 'Basic', '', 'basic', '', 'com_rokcandy', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(36, 0, 'Typography', '', 'typography', '', 'com_rokcandy', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(37, 0, 'RokStories Frontpage', '', 'rokstories-frontpage', '', '6', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(38, 0, 'RokTabs Frontpage', '', 'roktabs-frontpage', '', '7', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(39, 0, 'RokNewsPager Frontpage 1', '', 'roknewspager-frontpage-1', '', '8', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(40, 0, 'RokNewsPager Frontpage 2', '', 'roknewspager-frontpage-2', '', '8', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 2, 0, 0, ''),
(41, 0, 'RokStories Samples', '', 'rokstories-samples', '', '6', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(42, 0, 'RokTabs Samples', 'Copy of ', 'roktabs-samples', '', '7', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `#__components`
--

DROP TABLE IF EXISTS `#__components`;
CREATE TABLE IF NOT EXISTS `#__components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
);

--
-- Dumping data for table `#__components`
--

INSERT INTO `#__components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(4, 'Web Links', 'option=com_weblinks', 0, 0, '', 'Manage Weblinks', 'com_weblinks', 0, 'js/ThemeOffice/component.png', 0, 'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n', 1),
(5, 'Links', '', 0, 4, 'option=com_weblinks', 'View existing weblinks', 'com_weblinks', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(6, 'Categories', '', 0, 4, 'option=com_categories&section=com_weblinks', 'Manage weblink categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(11, 'News Feeds', 'option=com_newsfeeds', 0, 0, '', 'News Feeds Management', 'com_newsfeeds', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(12, 'Feeds', '', 0, 11, 'option=com_newsfeeds', 'Manage News Feeds', 'com_newsfeeds', 1, 'js/ThemeOffice/edit.png', 0, 'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 1),
(13, 'Categories', '', 0, 11, 'option=com_categories&section=com_newsfeeds', 'Manage Categories', '', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\nallowed_media_usergroup=3\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\nfilter_tags=\nfilter_attritbutes=\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, '', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=0\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(34, 'RokCandyBundle', '', 0, 0, '', 'RokCandyBundle', 'com_rokcandybundle', 0, '', 0, '', 0),
(35, 'RokCandy', '', 0, 0, 'option=com_rokcandy', 'RokCandy', 'com_rokcandy', 0, 'components/com_rokcandy/assets/rokcandy-icon-16.png', 1, '', 1),
(36, 'Macros', '', 0, 35, 'option=com_rokcandy', 'Macros', 'com_rokcandy', 0, 'images/blank.png', 0, '', 1),
(37, 'Categories', '', 0, 35, 'option=com_categories&section=com_rokcandy', 'Categories', 'com_rokcandy', 1, 'images/blank.png', 0, '', 1),
(38, 'RokModule', '', 0, 0, '', 'RokModule', 'com_rokmodule', 0, '', 0, '', 1),
(39, 'RokNavMenuBundle', '', 0, 0, '', 'RokNavMenuBundle', 'com_roknavmenubundle', 0, '', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `#__contact_details`
--

DROP TABLE IF EXISTS `#__contact_details`;
CREATE TABLE IF NOT EXISTS `#__contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
);

--
-- Dumping data for table `#__contact_details`
--

INSERT INTO `#__contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'Name', 'name', 'Position', 'Street', 'Suburb', 'State', 'Country', 'Zip Code', 'Telephone', 'Fax', 'Miscellanous info', 'powered_by.png', 'top', 'email@email.com', 1, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=1\r\nshow_position=1\r\nshow_email=0\r\nshow_street_address=1\r\nshow_suburb=1\r\nshow_state=1\r\nshow_postcode=1\r\nshow_country=1\r\nshow_telephone=1\r\nshow_mobile=1\r\nshow_fax=1\r\nshow_webpage=1\r\nshow_misc=1\r\nshow_image=1\r\nallow_vcard=0\r\ncontact_icons=0\r\nicon_address=\r\nicon_email=\r\nicon_telephone=\r\nicon_fax=\r\nicon_misc=\r\nshow_email_form=1\r\nemail_description=1\r\nshow_email_copy=1\r\nbanned_email=\r\nbanned_subject=\r\nbanned_text=', 0, 12, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `#__content`
--

DROP TABLE IF EXISTS `#__content`;
CREATE TABLE IF NOT EXISTS `#__content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
);

--
-- Dumping data for table `#__content`
--

INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Welcome to Joomla!', 'welcome-to-joomla', '', '<div align="left"><strong>Joomla! is a free open source framework and content publishing system designed for quickly creating highly interactive multi-language Web sites, online communities, media portals, blogs and eCommerce applications. <br /></strong></div><p><strong><br /></strong><img src="images/stories/powered_by.png" border="0" alt="Joomla! Logo" title="Example Caption" hspace="6" vspace="0" width="165" height="68" align="left" />Joomla! provides an easy-to-use graphical user interface that simplifies the management and publishing of large volumes of content including HTML, documents, and rich media.  Joomla! is used by organisations of all sizes for intranets and extranets and is supported by a community of tens of thousands of users. </p>', 'With a fully documented library of developer resources, Joomla! allows the customisation of every aspect of a Web site including presentation, layout, administration, and the rapid integration with third-party applications.<p>Joomla! now provides more developer power while making the user experience all the more friendly. For those who always wanted increased extensibility, Joomla! 1.5 can make this happen.</p><p>A new framework, ground-up refactoring, and a highly-active development team brings the excitement of ''the next generation CMS'' to your fingertips.  Whether you are a systems architect or a complete ''noob'' Joomla! can take you to the next level of content delivery. ''More than a CMS'' is something we have been playing with as a catchcry because the new Joomla! API has such incredible power and flexibility, you are free to take whatever direction your creative mind takes you and Joomla! can help you get there so much more easily than ever before.</p><p>Thinking Web publishing? Think Joomla!</p>', 1, 1, 0, 1, '2008-08-12 10:00:00', 62, '', '2008-08-12 10:00:00', 62, 0, '0000-00-00 00:00:00', '2006-01-03 01:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 29, 0, 1, '', '', 0, 99, 'robots=\nauthor='),
(2, 'Newsflash 1', 'newsflash-1', '', '<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 1, 'robots=\nauthor='),
(3, 'Newsflash 2', 'newsflash-2', '', '<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content ''in-context'' by clicking the ''Edit'' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>', '', 1, 1, 0, 3, '2008-08-09 22:30:34', 62, '', '2008-08-09 22:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(4, 'Newsflash 3', 'newsflash-3', '', '<p>With a library of thousands of free <a href="http://extensions.joomla.org" target="_blank" title="The Joomla! Extensions Directory">Extensions</a>, you can add what you need as your site grows. Don''t wait, look through the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions">Joomla! Extensions</a>  library today. </p>', '', 1, 1, 0, 3, '2008-08-10 06:30:34', 62, '', '2008-08-10 06:30:34', 62, 0, '0000-00-00 00:00:00', '2004-08-09 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 5, '', '', 0, 1, 'robots=\nauthor='),
(5, 'Joomla! License Guidelines', 'joomla-license-guidelines', 'joomla-license-guidelines', '<p>This Web site is powered by <a href="http://joomla.org/" target="_blank" title="Joomla!">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href="http://www.opensourcematters.org/" target="_blank" title="Open Source Matters">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href="http://docs.joomla.org/JEDL" target="_blank" title="Joomla! Electronic Document License">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1" target="_blank" title="GNU General Public License"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4" target="_blank" title="How To Apply These Terms To Your Program">''How To Apply These Terms To Your Program''</a> and the <a href="http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html" target="_blank" title="GNU General Public License FAQ">''GNU General Public License FAQ''</a>.</p> <p>The Joomla! licence has always been GPL.</p>', '', 1, 4, 0, 25, '2008-08-20 10:11:07', 62, '', '2008-08-20 10:11:07', 62, 0, '0000-00-00 00:00:00', '2004-08-19 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 100, 'robots=\nauthor='),
(6, 'We are Volunteers', 'we-are-volunteers', '', '<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 4, '', '', 0, 58, 'robots=\nauthor='),
(9, 'Millions of Smiles', 'millions-of-smiles', '', '<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it''s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you''re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It''s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 7, '', '', 0, 28, 'robots=\nauthor='),
(10, 'How do I localise Joomla! to my language?', 'how-do-i-localise-joomla-to-my-language', '', '<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>', '<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="JED">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href="http://joomlacode.org/gf/project/jtranslation/" target="_blank" title="Accredited Translations">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href="http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/" target="_blank" title="Translations">The Joomla! Extensions Site - Translations</a>  </li><li><a href="http://community.joomla.org/translations.html" target="_blank" title="Translation Work Group Teams">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>', 1, 3, 0, 32, '2008-07-30 14:06:37', 62, '', '2008-07-30 14:06:37', 62, 0, '0000-00-00 00:00:00', '2006-09-29 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 5, '', '', 0, 10, 'robots=\nauthor='),
(11, 'How do I upgrade to Joomla! 1.5 ?', 'how-do-i-upgrade-to-joomla-15', '', '<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>', ' <div id="post_content-107"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face="courier new,courier">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site''s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face="courier new,courier">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href="http://joomlacode.org/gf/project/pasamioprojects/frs/" target="_blank" title="JoomlaCode">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face="courier new,courier">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face="courier new,courier">iconv </font></em>function in PHP to convert encodings. If <em><font face="courier new,courier">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the ''Load Migration Script'' option in the ''Load Sample Data, Restore or Migrate Backed Up Content'' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: ''#__'' or ''site2_'' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>', 1, 3, 0, 28, '2008-07-30 20:27:52', 62, '', '2008-07-30 20:27:52', 62, 0, '0000-00-00 00:00:00', '2006-09-29 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 3, '', '', 0, 14, 'robots=\nauthor='),
(12, 'Why does Joomla! 1.5 use UTF-8 encoding?', 'why-does-joomla-15-use-utf-8-encoding', '', '<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>', '', 1, 3, 0, 31, '2008-08-05 01:11:29', 62, '', '2008-08-05 01:11:29', 62, 0, '0000-00-00 00:00:00', '2006-10-03 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 8, '', '', 0, 29, 'robots=\nauthor='),
(13, 'What happened to the locale setting?', 'what-happened-to-the-locale-setting', '', 'This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.', '', 1, 3, 0, 28, '2008-08-06 16:47:35', 62, '', '2008-08-06 16:47:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 2, '', '', 0, 11, 'robots=\nauthor='),
(14, 'What is the FTP layer for?', 'what-is-the-ftp-layer-for', '', '<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin''s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to ''''Help-&gt;System Info" and then in the sub-menu to "Directory Permissions". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>', '', 1, 3, 0, 31, '2008-08-06 21:27:49', 62, '', '2008-08-06 21:27:49', 62, 0, '0000-00-00 00:00:00', '2006-10-05 16:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 6, 0, 6, '', '', 0, 23, 'robots=\nauthor='),
(15, 'Can Joomla! 1.5 operate with PHP Safe Mode On?', 'can-joomla-15-operate-with-php-safe-mode-on', '', '<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perform actions only on files/folders who''s owner is the same as PHP is currently using (this is usually ''apache''). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>', '', 1, 3, 0, 31, '2008-08-06 19:28:35', 62, '', '2008-08-06 19:28:35', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 8, 'robots=\nauthor='),
(16, 'Only one edit window! How do I create "Read more..."?', 'only-one-edit-window-how-do-i-create-read-more', '', '<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>', '', 1, 3, 0, 28, '2008-08-06 19:29:28', 62, '', '2008-08-06 19:29:28', 62, 0, '0000-00-00 00:00:00', '2006-10-05 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 4, '', '', 0, 20, 'robots=\nauthor='),
(17, 'My MySQL database does not support UTF-8. Do I have a problem?', 'my-mysql-database-does-not-support-utf-8-do-i-have-a-problem', '', 'No you don''t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).', '', 1, 3, 0, 31, '2008-08-07 09:30:37', 62, '', '2008-08-07 09:30:37', 62, 0, '0000-00-00 00:00:00', '2006-10-05 20:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 7, '', '', 0, 9, 'robots=\nauthor='),
(18, 'Joomla! Features', 'joomla-features', '', '<h4><font color="#ff6600">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX', '  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>', 1, 4, 0, 29, '2008-08-08 23:32:45', 62, '', '2008-08-08 23:32:45', 62, 0, '0000-00-00 00:00:00', '2006-10-07 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 4, '', '', 0, 59, 'robots=\nauthor='),
(19, 'Joomla! Overview', 'joomla-overview', '', '<p>If you''re new to Web publishing systems, you''ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that''s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what''s the catch? How much does this system cost?</p><p> Well, there''s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there''d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it''s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn''t even require the user or administrator of the system to know HTML to operate it once it''s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>', '', 1, 4, 0, 29, '2008-08-09 07:49:20', 62, '', '2008-08-09 07:49:20', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 2, '', '', 0, 219, 'robots=\nauthor='),
(20, 'Support and Documentation', 'support-and-documentation', '', '<h1>Support </h1><p>Support for the Joomla! CMS can be found on several places. The best place to start would be the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. Here you can help yourself to the information that is regularly published and updated as Joomla! develops. There is much more to come too!</p> <p>Of course you should not forget the Help System of the CMS itself. On the <em>topmenu </em>in the Back-end Control panel you find the Help button which will provide you with lots of explanation on features.</p> <p>Another great place would of course be the <a href="http://forum.joomla.org/" target="_blank" title="Forum">Forum</a> . On the Joomla! Forum you can find help and support from Community members as well as from Joomla! Core members and Working Group members. The forum contains a lot of information, FAQ''s, just about anything you are looking for in terms of support.</p> <p>Two other resources for Support are the <a href="http://developer.joomla.org/" target="_blank" title="Joomla! Developer Site">Joomla! Developer Site</a> and the <a href="http://extensions.joomla.org/" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a> (JED). The Joomla! Developer Site provides lots of technical information for the experienced Developer as well as those new to Joomla! and development work in general. The JED whilst not a support site in the strictest sense has many of the Extensions that you will need as you develop your own Web site.</p> <p>The Joomla! Developers and Bug Squad members are regularly posting their blog reports about several topics such as programming techniques and security issues.</p> <h1>Documentation</h1> <p>Joomla! Documentation can of course be found on the <a href="http://docs.joomla.org/" target="_blank" title="Joomla! Official Documentation Wiki">Joomla! Official Documentation Wiki</a>. You can find information for beginners, installation, upgrade, Frequently Asked Questions, developer topics, and a lot more. The Documentation Team helps oversee the wiki but you are invited to contribute content, as well.</p> <p>There are also books written about Joomla! You can find a listing of these books in the <a href="http://shop.joomla.org/" target="_blank" title="Joomla! Shop">Joomla! Shop</a>.</p>', '', 1, 4, 0, 25, '2008-08-09 08:33:57', 62, '', '2008-08-09 08:33:57', 62, 0, '0000-00-00 00:00:00', '2006-10-07 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 6, 'robots=\nauthor='),
(21, 'Joomla! Facts', 'joomla-facts', '', '<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href="http://forum.joomla.org" target="_blank" title="Joomla Forums">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href="http://joomlacode.org/" target="_blank" title="JoomlaCode">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href="http://extensions.joomla.org" target="_blank" title="http://extensions.joomla.org">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>', '', 1, 4, 0, 30, '2008-08-09 16:46:37', 62, '', '2008-08-09 16:46:37', 62, 0, '0000-00-00 00:00:00', '2006-10-07 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 1, '', '', 0, 50, 'robots=\nauthor='),
(22, 'What''s New in 1.5?', 'whats-new-in-15', '', '<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>', '<p style="margin-bottom: 0in">In Joomla! 1.5, you''ll notice: </p>    <ul><li>     <p style="margin-bottom: 0in">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style="margin-bottom: 0in"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style="margin-bottom: 0in"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style="margin-bottom: 0in"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style="margin-bottom: 0in">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style="margin-bottom: 0in">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>', 1, 4, 0, 29, '2008-08-11 22:13:58', 62, '', '2008-08-11 22:13:58', 62, 0, '0000-00-00 00:00:00', '2006-10-10 18:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 1, '', '', 0, 92, 'robots=\nauthor='),
(23, 'Platforms and Open Standards', 'platforms-and-open-standards', '', '<p class="MsoNormal">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class="MsoNormal">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.', '', 1, 4, 0, 25, '2008-08-11 04:22:14', 62, '', '2008-08-11 04:22:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 11, 'robots=\nauthor='),
(24, 'Content Layouts', 'content-layouts', '', '<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you''ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the "mainbody" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>', '', 1, 4, 0, 29, '2008-08-12 22:33:10', 62, '', '2008-08-12 22:33:10', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 5, '', '', 0, 70, 'robots=\nauthor='),
(25, 'What are the requirements to run Joomla! 1.5?', 'what-are-the-requirements-to-run-joomla-15', '', '<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it''s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href="http://www.joomla.org/about-joomla/technical-requirements.html" target="_blank" title="Joomla! Technical Requirements">Joomla! Technical Requirements</a>.', '', 1, 3, 0, 31, '2008-08-11 00:42:31', 62, '', '2008-08-11 00:42:31', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 5, '', '', 0, 25, 'robots=\nauthor='),
(26, 'Extensions', 'extensions', '', '<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href="http://extensions.joomla.org/content/view/15/63/" target="_blank" title="Guide to the Joomla! Extension site">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title="Components" class="system-pagebreak" /> <h3><img src="images/stories/ext_com.png" border="0" alt="Component - Joomla! Extension Directory" title="Component - Joomla! Extension Directory" width="17" height="17" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face="courier new,courier">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face="courier new,courier">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!''s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title="Modules" class="system-pagebreak" /> <h3><img src="images/stories/ext_mod.png" border="0" alt="Module - Joomla! Extension Directory" title="Module - Joomla! Extension Directory" width="17" height="17" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, "left" and "right" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face="courier new,courier">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title="Plugins" class="system-pagebreak" /> <h3><img src="images/stories/ext_plugin.png" border="0" alt="Plugin - Joomla! Extension Directory" title="Plugin - Joomla! Extension Directory" width="17" height="17" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face="courier new,courier">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title="Languages" class="system-pagebreak" /> <h3><img src="images/stories/ext_lang.png" border="0" alt="Language - Joomla! Extensions Directory" title="Language - Joomla! Extensions Directory" width="17" height="17" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href="http://community.joomla.org/translations.html" target="_blank" title="Joomla! Translation Teams">http://community.joomla.org/translations.html</a></p>', '', 1, 4, 0, 29, '2008-08-11 06:00:00', 62, '', '2008-08-11 06:00:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 24, 0, 3, 'About Joomla!, General, Extensions', '', 0, 102, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(27, 'The Joomla! Community', 'the-joomla-community', '', '<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href="http://forum.joomla.org/" target="_blank" title="Forums">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you''ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href="http://forum.joomla.org/viewforum.php?f=514" target="_blank" title="Site Showcase">Site Showcase</a> section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We''re passionate about helping Joomla users become contributors. There are many ways you can help Joomla''s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href="http://news.joomla.org" target="_blank" title="JoomlaConnect">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connected <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</li>	<li>Report bugs and request features in our <a href="http://joomlacode.org/gf/project/joomla/tracker/" target="_blank" title="Joomla! developement trackers">trackers</a>. Please read <a href="http://docs.joomla.org/Filing_bugs_and_issues" target="_blank" title="Reporting Bugs">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href="http://docs.joomla.org/Patch_submission_guidelines" target="_blank" title="Submitting Patches">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href="http://forum.joomla.org/viewforum.php?f=509" target="_blank" title="Joomla! development forums">developer forums</a> and share your ideas for how to improve Joomla. We''re always open to suggestions, although we''re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href="http://www.joomla.org/about-joomla/the-project/working-groups.html" target="_blank" title="Joomla! working groups">Joomla Working Groups</a> and bring your personal expertise to the Joomla community. </li></ul><p>These are just a few ways you can contribute. See <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank" title="Contribute">Contribute to Joomla</a> for many more ways.</p>', '', 1, 4, 0, 30, '2008-08-12 16:50:48', 62, '', '2008-08-12 16:50:48', 62, 0, '0000-00-00 00:00:00', '2006-10-11 02:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 2, '', '', 0, 52, 'robots=\nauthor='),
(28, 'How do I install Joomla! 1.5?', 'how-do-i-install-joomla-15', '', '<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href="http://help.joomla.org/content/category/48/268/302" target="_blank" title="Joomla! 1.5 Installation Manual">Installation Manual</a> on the <a href="http://help.joomla.org" target="_blank" title="Joomla! Help Site">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>', '', 1, 3, 0, 31, '2008-08-11 01:10:59', 62, '', '2008-08-11 01:10:59', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
(29, 'What is the purpose of the collation selection in the installation screen?', 'what-is-the-purpose-of-the-collation-selection-in-the-installation-screen', '', 'The collation option determines the way ordering in the database is done. In languages that use special characters, for instance the German umlaut, the database collation determines the sorting order. If you don''t know which collation you need, select the "utf8_general_ci" as most languages use this. The other collations listed are exceptions in regards to the general collation. If your language is not listed in the list of collations it most likely means that "utf8_general_ci is suitable.', '', 1, 3, 0, 32, '2008-08-11 03:11:38', 62, '', '2008-08-11 03:11:38', 62, 0, '0000-00-00 00:00:00', '2006-10-10 08:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=', 4, 0, 4, '', '', 0, 6, 'robots=\nauthor='),
(30, 'What languages are supported by Joomla! 1.5?', 'what-languages-are-supported-by-joomla-15', '', 'Within the Installer you will find a wide collection of languages. The installer currently supports the following languages: Arabic, Bulgarian, Bengali, Czech, Danish, German, Greek, English, Spanish, Finnish, French, Hebrew, Devanagari(India), Croatian(Croatia), Magyar (Hungary), Italian, Malay, Norwegian bokmal, Dutch, Portuguese(Brasil), Portugues(Portugal), Romanian, Russian, Serbian, Svenska, Thai and more are being added all the time.<br />By default the English language is installed for the Back and Front-ends. You can download additional language files from the <a href="http://extensions.joomla.org" target="_blank" title="Joomla! Extensions Directory">Joomla!Extensions Directory</a>. ', '', 1, 3, 0, 32, '2008-08-11 01:12:18', 62, '', '2008-08-11 01:12:18', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 8, 'robots=\nauthor='),
(31, 'Is it useful to install the sample data?', 'is-it-useful-to-install-the-sample-data', '', 'Well you are reading it right now! This depends on what you want to achieve. If you are new to Joomla! and have no clue how it all fits together, just install the sample data. If you don''t like the English sample data because you - for instance - speak Chinese, then leave it out.', '', 1, 3, 0, 27, '2008-08-11 09:12:55', 62, '', '2008-08-11 09:12:55', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 3, '', '', 0, 3, 'robots=\nauthor='),
(32, 'Where is the Static Content Item?', 'where-is-the-static-content', '', '<p>In Joomla! versions prior to 1.5 there were separate processes for creating a Static Content Item and normal Content Items. The processes have been combined now and whilst both content types are still around they are renamed as Articles for Content Items and Uncategorized Articles for Static Content Items. </p><p>If you want to create a static item, create a new Article in the same way as for standard content and rather than relating this to a particular Section and Category just select <span style="font-style: italic">Uncategorized</span> as the option in the Section and Category drop down lists.</p>', '', 1, 3, 0, 28, '2008-08-10 23:13:33', 62, '', '2008-08-10 23:13:33', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 6, '', '', 0, 5, 'robots=\nauthor='),
(33, 'What is an Uncategorised Article?', 'what-is-uncategorised-article', '', 'Most Articles will be assigned to a Section and Category. In many cases, you might not know where you want it to appear so put the Article in the <em>Uncategorized </em>Section/Category. The Articles marked as <em>Uncategorized </em>are handled as static content.', '', 1, 3, 0, 31, '2008-08-11 15:14:11', 62, '', '2008-08-11 15:14:11', 62, 0, '0000-00-00 00:00:00', '2006-10-10 12:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 2, '', '', 0, 6, 'robots=\nauthor='),
(34, 'Does the PDF icon render pictures and special characters?', 'does-the-pdf-icon-render-pictures-and-special-characters', '', 'Yes! Prior to Joomla! 1.5, only the text values of an Article and only for ISO-8859-1 encoding was allowed in the PDF rendition. With the new PDF library in place, the complete Article including images is rendered and applied to the PDF. The PDF generator also handles the UTF-8 texts and can handle any character sets from any language. The appropriate fonts must be installed but this is done automatically during a language pack installation.', '', 1, 3, 0, 32, '2008-08-11 17:14:57', 62, '', '2008-08-11 17:14:57', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 3, '', '', 0, 6, 'robots=\nauthor='),
(35, 'Is it possible to change A Menu Item''s Type?', 'is-it-possible-to-change-the-types-of-menu-entries', '', '<p>You indeed can change the Menu Item''s Type to whatever you want, even after they have been created. </p><p>If, for instance, you want to change the Blog Section of a Menu link, go to the Control Panel-&gt;Menus Menu-&gt;[menuname]-&gt;Menu Item Manager and edit the Menu Item. Select the <strong>Change Type</strong> button and choose the new style of Menu Item Type from the available list. Thereafter, alter the Details and Parameters to reconfigure the display for the new selection  as you require it.</p>', '', 1, 3, 0, 31, '2008-08-10 23:15:36', 62, '', '2008-08-10 23:15:36', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 1, '', '', 0, 18, 'robots=\nauthor='),
(36, 'Where did the Installers go?', 'where-did-the-installer-go', '', 'The improved Installer can be found under the Extensions Menu. With versions prior to Joomla! 1.5 you needed to select a specific Extension type when you wanted to install it and use the Installer associated with it, with Joomla! 1.5 you just select the Extension you want to upload, and click on install. The Installer will do all the hard work for you.', '', 1, 3, 0, 28, '2008-08-10 23:16:20', 62, '', '2008-08-10 23:16:20', 62, 0, '0000-00-00 00:00:00', '2006-10-10 04:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 1, '', '', 0, 4, 'robots=\nauthor='),
(37, 'Where did the Mambots go?', 'where-did-the-mambots-go', '', '<p>Mambots have been renamed as Plugins. </p><p>Mambots were introduced in Mambo and offered possibilities to add plug-in logic to your site mainly for the purpose of manipulating content. In Joomla! 1.5, Plugins will now have much broader capabilities than Mambots. Plugins are able to extend functionality at the framework layer as well.</p>', '', 1, 3, 0, 28, '2008-08-11 09:17:00', 62, '', '2008-08-11 09:17:00', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 5, '', '', 0, 4, 'robots=\nauthor='),
(38, 'I installed with my own language, but the Back-end is still in English', 'i-installed-with-my-own-language-but-the-back-end-is-still-in-english', '', '<p>A lot of different languages are available for the Back-end, but by default this language may not be installed. If you want a translated Back-end, get your language pack and install it using the Extension Installer. After this, go to the Extensions Menu, select Language Manager and make your language the default one. Your Back-end will be translated immediately.</p><p>Users who have access rights to the Back-end may choose the language they prefer in their Personal Details parameters. This is of also true for the Front-end language.</p><p> A good place to find where to download your languages and localised versions of Joomla! is <a href="http://extensions.joomla.org/index.php?option=com_mtree&task=listcats&cat_id=1837&Itemid=35" target="_blank" title="Translations for Joomla!">Translations for Joomla!</a> on JED.</p>', '', 1, 3, 0, 32, '2008-08-11 17:18:14', 62, '', '2008-08-11 17:18:14', 62, 0, '0000-00-00 00:00:00', '2006-10-10 14:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, '', '', 0, 7, 'robots=\nauthor='),
(39, 'How do I remove an Article?', 'how-do-i-remove-an-article', '', '<p>To completely remove an Article, select the Articles that you want to delete and move them to the Trash. Next, open the Article Trash in the Content Menu and select the Articles you want to delete. After deleting an Article, it is no longer available as it has been deleted from the database and it is not possible to undo this operation.  </p>', '', 1, 3, 0, 27, '2008-08-11 09:19:01', 62, '', '2008-08-11 09:19:01', 62, 0, '0000-00-00 00:00:00', '2006-10-10 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 2, '', '', 0, 4, 'robots=\nauthor='),
(40, 'What is the difference between Archiving and Trashing an Article? ', 'what-is-the-difference-between-archiving-and-trashing-an-article', '', '<p>When you <em>Archive </em>an Article, the content is put into a state which removes it from your site as published content. The Article is still available from within the Control Panel and can be <em>retrieved </em>for editing or republishing purposes. Trashed Articles are just one step from being permanently deleted but are still available until you Remove them from the Trash Manager. You should use Archive if you consider an Article important, but not current. Trash should be used when you want to delete the content entirely from your site and from future search results.  </p>', '', 1, 3, 0, 27, '2008-08-11 05:19:43', 62, '', '2008-08-11 05:19:43', 62, 0, '0000-00-00 00:00:00', '2006-10-10 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 1, '', '', 0, 5, 'robots=\nauthor='),
(41, 'Newsflash 5', 'newsflash-5', '', 'Joomla! 1.5 - ''Experience the Freedom''!. It has never been easier to create your own dynamic Web site. Manage all your content from the best CMS admin interface and in virtually any language you speak.', '', 1, 1, 0, 3, '2008-08-12 00:17:31', 62, '', '2008-08-12 00:17:31', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 4, 'robots=\nauthor='),
(42, 'Newsflash 4', 'newsflash-4', '', 'Yesterday all servers in the U.S. went out on strike in a bid to get more RAM and better CPUs. A spokes person said that the need for better RAM was due to some fool increasing the front-side bus speed. In future, buses will be told to slow down in residential motherboards.', '', 1, 1, 0, 3, '2008-08-12 00:25:50', 62, '', '2008-08-12 00:25:50', 62, 0, '0000-00-00 00:00:00', '2006-10-11 06:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 1, '', '', 0, 5, 'robots=\nauthor='),
(43, 'Example Pages and Menu Links', 'example-pages-and-menu-links', '', '<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face="courier new,courier">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>', '', 1, 0, 0, 0, '2008-08-12 09:26:52', 62, '', '2008-08-12 09:26:52', 62, 0, '0000-00-00 00:00:00', '2006-10-11 10:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 1, 'Uncategorized, Uncategorized, Example Pages and Menu Links', '', 0, 43, 'robots=\nauthor='),
(44, 'Joomla! Security Strike Team', 'joomla-security-strike-team', '', '<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a>.</p>', '<p>The new JSST will call the new <a href="http://developer.joomla.org/security.html" target="_blank" title="Joomla! Security Center">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href="http://developer.joomla.org/security/news.html" target="_blank" title="Joomla! Security News">security issues</a> and a platform for the JSST to <a href="http://developer.joomla.org/security/articles-tutorials.html" target="_blank" title="Joomla! Security Articles">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There''s also a <a href="http://feeds.joomla.org/JoomlaSecurityNews" target="_blank" title="Joomla! Security News Feed">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
(45, 'Joomla! Community Portal', 'joomla-community-portal', '', '<p>The <a href="http://community.joomla.org/" target="_blank" title="Joomla! Community Portal">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href="http://community.joomla.org/events.html" target="_blank" title="Joomla! Events">Joomla! Events</a> worldwide, and see if there is a <a href="http://community.joomla.org/user-groups.html" target="_blank" title="Joomla! User Groups">Joomla! User Group</a> nearby.</p><p>The <a href="http://community.joomla.org/magazine.html" target="_blank" title="Joomla! Community Magazine">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href="http://community.joomla.org/connect.html" target="_blank" title="JoomlaConnect">here</a>.</p>', '', 1, 1, 0, 1, '2007-07-07 09:54:06', 62, '', '2007-07-07 09:54:06', 62, 0, '0000-00-00 00:00:00', '2004-07-06 22:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 2, '', '', 0, 10, 'robots=\nauthor='),
(46, 'Template Features', 'template-features', '', '<h4>Top Features</h4>\r\n\r\n<p class="dropcap"><span class="dropcap">1</span><strong><a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69">Ten Style Variations:</a></strong> An array of 10, pre-configured, style variations of varying color, style and shade. The mainbody background color is interchangeable, so easily chose between a light or dark mainbody with the various color/image styles available. Modify with ease using the Gantry template interface.</p>\r\n\r\n<p class="dropcap"><span class="dropcap">2</span><strong><a href="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54">Gantry Framework:</a></strong> Gantry provides a feature rich core for all of our modern RocketTheme templates, offering features such as RTL support, a 960 grid system, per-menu item parameters and so much more. It substantially extends the features and functions of the Joomla core to make the system a truly powerful platform.</p>\r\n\r\n<p class="dropcap"><span class="dropcap">3</span><strong><a href="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66">Advanced Menu:</a></strong> Quantive offers a powerful assortment of menus to chose from. Select from either: the Fusion Menu, a javascript / Mootools enhanced CSS dropdown menu system, SEO compatible and user friendly; and the versatile and flexible Splitmenu, a static sublevel based menu system (3 level modes with Quantive).</p>\r\n\r\n\r\n<h4>Core Template Features</h4>\r\n\r\n<p>Below is a list of the core template features which pertain to this release.</p>\r\n\r\n<ul class="bullet-2">\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54">RTL Support</a></strong><br />\r\n		RTL support from Gantry in its grid system, as well as RTL support in the Fusion menu, in conjunction with the template itself such as the breadcrumbs, content typography and module styling.\r\n		<p style="margin-top: 5px;"><a href="images/stories/demo/general/rtl-preview-full.jpg" class="readon" rel="rokbox[715 1261]" title="RTL Preview :: Preview of the Demo Frontpage in RTL mode"><span>Preview RTL</span></a></p>\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=49&amp;Itemid=56">13 Module Variations / Class Suffixes / Hilites</a></strong><br />\r\n		13 module class suffixes to provide variation, color and/or structural, in your site for your modular content, these are: <strong>square1-6</strong>, <strong>title1-3</strong>, <strong>flush</strong>, <strong>flushtop</strong>, <strong>flushbottom</strong> &amp; <strong>basic</strong>.\r\n	</li>\r\n	<li>\r\n		<strong><a href="#">Javascript Styling: Radios and Checkboxes</a></strong><br />\r\n		Additional styling for form elements, such as radios and checkboxes, for visual integration.\r\n	</li>\r\n	<li>\r\n		<strong><a href="#">IE6 Warning Message</a></strong><br />\r\n		A dropdown panel will appear in IE6, alerting the visitor to update their browser. This can be disabled in the template parameters.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=51&amp;Itemid=58">Content Typography</a></strong><br />  \r\n		Customised typography, such as list styles and notices, are included with this release.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=50&amp;Itemid=57">68 Module Positions</a></strong><br />  \r\n		The template has 68 module positions which are collapsible.\r\n	</li>\r\n	<li>\r\n		<strong><a href="#">Browser Compatibility</a></strong><br />  \r\n		The theme is compatible with all the major and modern browsers: FF 3.6, Safari 4, Opera 10.x, IE7 &amp; IE8. <em>There is limited support for IE6 as it is restricted in numerous ways such as the forcing of the low detail level, LTR is automatically set regardless of RTL presence, Fusion is replaced by the Suckerfish menu, and various other elements are dropped or modified for basic compatibility.</em>\r\n	</li>\r\n</ul>\r\n\r\n<h4>RocketTheme Extensions</h4>\r\n\r\n<p>Below is a list of RocketTheme Extensions that have either been styled specifically for this template release, or are showcased in this demo. For more details regarding RocketTheme Extensions as a whole, or more detailed information on an individual extension, please visit <a href="http://www.rockettheme.com/extensions" target="_blank">http://www.rockettheme.com/extensions</a></p>\r\n\r\n<ul class="bullet-2">\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokNewsPager Module</a></strong><br />\r\n		A preview content module, enhanced by ajax for dynamic pagination as well as accordion effects. Now with comment support for JComments and K2.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokStories Module</a></strong><br />\r\n		Functional showcase module for displaying content items and their accompanying images in an interactive and versatile manner. \r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokCandy Component</a></strong><br />\r\n		A component that provides BBcode style functionality for Joomla for swift and easy implementation of complex code.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokBox Plugin</a></strong><br />\r\n		Javascript popup / litebox utility, can be used for images, links, videos, websites, PDFs and much more.\r\n	</li>  \r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokAjaxSearch Module</a></strong><br />\r\n		Ajax powered module, allowing for interactive search of both local Joomla pages and the web with its Google integration.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokTabs Module</a></strong><br />\r\n		Tabbed content module, perfect for maximising content exposure without sacrificing on site real estate. Built-in Mootools effects.\r\n	</li>  \r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokNavMenu Module</a></strong><br />\r\n		RokNavMenu is a foundational extension which is at the core of the inbuilt menu systems and is a requirement for the template menus to operate.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokGzipper Plugin</a></strong><br />\r\n		A performance plugin that compresses your CSS and JS files via GZip which results in faster page loads.\r\n	</li>\r\n	<li>\r\n		<strong><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokPad Editor</a></strong><br />\r\n		A code editor with syntax highlighting, ajax saving and much more. The perfect replacement for the Joomla <em>No Editor</em>.\r\n	</li>\r\n</ul>', '', 1, 5, 0, 34, '2010-03-23 17:58:53', 62, '', '2010-03-30 18:39:23', 63, 0, '0000-00-00 00:00:00', '2010-03-23 17:58:53', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 1, '', '', 0, 174, 'robots=\nauthor='),
(47, 'Gantry Framework', 'gantry-framework', '', '<h2>Definition of Gantry</h2>\r\n<p>\r\n	<img class="png gantry-logo" alt="blank" src="images/stories/demo/general/gantry.png"/>\r\n	<strong>gan·try</strong> (gan′trē) <em>noun</em>\r\n</p>\r\n<ol>\r\n	<li><strong>(RocketTheme) A framework used for assembling, building and maintaining a RocketTheme template</strong></li>\r\n</ol>\r\n\r\n<h2>Overview of Gantry</h2>\r\n\r\n<p>Gantry is a sophisticated Joomla template framework with the sole intention of being the best platform to build a solid template with.  Gantry takes all the lessons learned during the development of many RocketTheme templates and distils that knowledge into a single super-flexible framework that is easy to configure, simple to extend, and powerful enough to handle anything we want to throw at it.</p>\r\n\r\n<h2>Key Features</h2>\r\n\r\n<p>The Gantry framework is packed with many great features that enable the rapid development of feature-rich designs with a minimum amount of effort.  We''ve also gone to great lengths to enhance the standard Joomla administration user interface to make configuring a Gantry-powered template easier than ever before. Check out a sampling of the features Gantry brings to the table:</p>\r\n\r\n<ul class="demo-tut-list bullet-2">\r\n	<li>960 Grid System</li>\r\n	<li>Stunning Administrator interface</li>\r\n	<li>XML driven and with overrides for unprecedented levels of customization</li>\r\n	<li>Per-menu-item level control over any configuration parameter</li>\r\n	<li>Preset any combination of configuration parameters, and save custom presets</li>  \r\n</ul>\r\n\r\n<ul class="demo-tut-list bullet-2">\r\n	<li>65 base module positions.  Easily add more!</li>\r\n	<li>36 possible layout combinations for mainbody and sidebars</li>\r\n	<li>Up to 3 sidebars for a total of 4 column layouts</li>\r\n	<li>Many built-in features such as font-sizer, to-top smooth slider, IE6 warning message, etc.</li>\r\n	<li>Flexible grid layout system for unparalleled control over block sizes</li>\r\n</ul>\r\n\r\n<div class="clear"></div>\r\n\r\n<p><a rel="rokbox[960 725][module=demo-gantry-key-features]" class="readon" href="#" title="Gantry Framework Features"><span>More Features</span></a></p>\r\n\r\n<h2>Installing/Updating Gantry</h2>\r\n\r\n<p>The Gantry library is a separate from the templates that use it. It is installed separately as <strong>com_gantry</strong> (although will not appear under <em>Components</em> in the Joomla Administrator). Therefore, to update Gantry, you just need to reinstall through the Joomla interface rather than manually edit files in the template.</p>\r\n\r\n<p>Each template will have a bundle download option available to install both the template and the Gantry library at the same time, in conjunction with a standalone download.</p>\r\n\r\n<h2>Overview of the Administrator Interface</h2>\r\n\r\n<p>The administrative interface for Gantry is one of, if not the, most extensive and intuitive Joomla administrators in the community as a whole today. Gantry takes the template parameter ability of Joomla and takes it to the next level with a robust, diverse, functional and overall, substantial array of options to control, essentially, all aspects of the template.</p>\r\n\r\n<div class="note"><div class="typo-icon">The best way to discover all the options available, as well as what they do, is to visit the administrator itself at <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong></div></div>\r\n\r\n<p>The options are subdivided into various categories:</p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong>Preset</strong> - <em>Select from an array of prebuilt presets</em></li>\r\n	<li><strong>Settings</strong> - <em>Configure preset specific settings such as Link Color</em></li>\r\n	<li><strong>Features</strong> - <em> Control the various Gantry features such as Date</em></li>\r\n	<li><strong>Menu</strong> - <em>Manage the menu parts of Gantry such as the javascript options of Fusion</em></li>\r\n	<li><strong>Layout</strong> - <em>Customize the layout options of Gantry such as the Feature-a/f row distribution</em></li>\r\n	<li><strong>Advanced</strong> - <em>Various other options are located here</em></li>\r\n</ul>\r\n\r\n<div id="demo-gantry-key-features">\r\n	<h3>Gantry Framework Full Features</h3>\r\n	\r\n	<ul class="demo-gantry-left bullet-2">\r\n		<li>960 Grid System <p>(<a href="http://960.gs">http://960.gs</a> - 12 &amp; 16 Column Support)</p></li>\r\n		<li>Joomla Support <p>Currently The Gantry Framework is available for the Joomla!  A very powerful and popular GPL Content Management System</p></li>\r\n		<li>Stunning Administrator interface <p>Gantry provides a uniquely intuitive interface to control all aspects of the design</p></li>\r\n		<li>XML driven and with overrides for unprecedented levels of customization <p>Gantry is easy to configure, customize and extend</p></li>\r\n		<li>Per-menu-item level control over any configuration parameter <p>Layouts, colors, features, etc can all be different for any menu item</p></li>\r\n		<li>Preset any combination of configuration parameters, and save custom presets <p>Creating custom presets allows you to easily save any combination of configuration settings for later use</p></li>\r\n		<li>Built-in extensible AJAX communication layer <p>Our powerful AJAX system allows dynamic functionality in features as well as opening up AJAX to 3rd party extensions</p></li>\r\n		<li>RTL language support <p>Gantry makes it easier than ever to develop Right-to-Left (RTL) based designs for languages such as Arabic, Hebrew and Farsi</p></li>\r\n		<li>Built-in CSS and JS compression and combination <p>Reduce the total number of requests for your site as well as adding compression for maximum page optimization</p></li>\r\n		<li>Flexible grid layout system for unparalleled control over block sizes <p>Control the sizes of your blocks with our simple grid layout controls</p></li>\r\n		<li>Optimized codebase with speed, size, and reuse core tenants of the framework design <p>Gantry is more than just unparalleled flexibility and control, it also provides a powerful basis to build professional quality designs.</p></li>\r\n	</ul>\r\n\r\n	<ul class="demo-gantry-right bullet-2">\r\n		<li>65 base module positions. <p>To get you started right we''ve included plenty of modules, but adding even more is a trivial procedure</p></li>\r\n		<li>38 possible layout combinations for mainbody and sidebars <p>The mainbody and sidebars now have an unprecedented level of control.  Gantry provides support for all kinds of layout options</p></li>\r\n		<li>Source-ordered 4 column mainbody <p>With up to 3 total sidebars, Gantry allows you to achieve highly complex mainbody layout scenarios</p></li>\r\n		<li>Many built-in features such as font-sizer, to-top smooth slider, IE6 warning message, etc.<p>Easily add your own unique functionality with Gantry''s feature support</p></li>\r\n		<li>Ability force ''blank'' module positions for even more advanced layout customization <p>Create layouts with blank spaces or complex alignment requirements with this functionality</p></li>\r\n		<li>Flexible parameter system with ability to set parameters via URL, Cookie, Session, Presets, etc. <p>Any parameter can be configured via XML to be settable from a variety of mechanisms for complete customization</p></li>\r\n		<li>Table-less HTML overrides with content overrides base don excellent GNU/GPLv2 overrides from YOOtheme <p>Gantry designs provide modern table-less output for the best in SEO and usability</p></li>\r\n		<li>Standard typography and Joomla core element styling <p>Great typographical features right out of the box</p></li>\r\n		<li>ini-based configuration storage for easy portability <p>All configuration options are stored in simple text-based ini files</p></li>\r\n		<li>Automatic per-browser-level CSS and JS control <p>Advanced control of CSS and JS for any specific browser version allows browser bugs and issues to be isolated and patched with a minimum of fuss</p></li>\r\n	</ul>\r\n	<div class="clear"></div>\r\n</div>', '', 1, 5, 0, 34, '2010-03-23 17:59:31', 62, '', '2010-03-31 12:56:26', 63, 0, '0000-00-00 00:00:00', '2010-03-23 17:59:31', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 18, 0, 2, '', '', 0, 89, 'robots=\nauthor='),
(89, 'RokGZipper', 'rokgzipper', '', '<img src="images/stories/demo/frontpage/sidebar-5.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokGZipper</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>Ultimate CSS, JS &amp; HTML compression extension.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:45:35', 62, '', '2010-03-30 17:19:05', 62, 0, '0000-00-00 00:00:00', '2010-03-25 14:45:35', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 5, '', '', 0, 3, 'robots=\nauthor='),
(90, 'Search', 'search', '', '<img src="images/stories/demo/frontpage/sidebar-7.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">Search</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>An ajax powered local &amp; Google web serach module.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:39:10', 62, '', '2010-03-30 13:57:32', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:39:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=1\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 7, '', '', 0, 2, 'robots=\nauthor='),
(91, 'More Addons', 'more-addons', '', '<img src="images/stories/demo/frontpage/sidebar-8.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">More Addons</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>More extensions available by RocketTheme.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:45:35', 62, '', '2010-03-30 13:59:46', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:45:35', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=1\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 8, '', '', 0, 2, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(49, 'Module Variations', 'module-variations', '', '<p>Module Variations allow for the individual styling of each module within a position, without it being global. Code wise, this is achieved by adding a class into the module code which loads from the <strong>Module Class Suffix</strong> field in the Module Manager. The theme CSS adjusts accordingly.</p>\r\n\r\n<p>Enter any available suffixes at <strong>Extensions &rarr; Module Manager &rarr; <em>Module</em> &rarr; Module Class Suffix</strong></p>\r\n\r\n<p>There are 13 suffixes: <strong>square1-6</strong>, <strong>title1-3</strong>, <strong>flush</strong>, <strong>flushtop</strong>, <strong>flushbottom</strong> &amp; <strong>basic</strong>.</p>\r\n\r\n<p>The <strong>Square</strong> suffixes represent different shades / coloring of the module variation already present. The <strong>Title</strong> suffixes change the styling of the module titles only (remove bottom <em>border</em>, change to uppercase and increase font size), and leave the rest of the module styling unaffected. Remember, you can always combine suffixes together such as <strong>square6 title1 title3</strong>, which will produce a colored module, with a title that has uppercase letters and no bottom border.</p>\r\n\r\n<p><strong>Flush</strong> will disable all padding and margin to the module for a tighter fit, with <strong>FlushTop</strong> and <strong>FlushBottom</strong> disabling the margin/padding for the Top/Bottom parts of the module respectively. <strong>Basic</strong> removes all image based styling from the module.</p>', '', 1, 5, 0, 34, '2010-03-23 17:59:53', 62, '', '2010-03-30 18:40:17', 63, 0, '0000-00-00 00:00:00', '2010-03-23 17:59:53', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 3, '', '', 0, 179, 'robots=\nauthor='),
(50, 'Module Positions', 'module-positions', '', '<p>There are <em>68 collapsible module positions</em>. If no module is published to a position, it will not appear, collapsing the entire area.</p>\r\n\r\n<h4>Non-Standard Elements</h4>\r\n\r\n<p>There are non-standard elements that are injected into the template grid structure when enabled via the template parameter.</p>\r\n\r\n<p>For example: The logo element is injected into the header-a position. It is inserted in a stacked fashion, meaning, if there are modules published to the header-a position, they will appear in the same column as the logo, just one place below.</p>\r\n\r\n<p><em>You can change the positions of these elements at <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong></em></p>\r\n\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54"]Gantry Framework : Learn more[/readon2]\r\n\r\n<div class="notice"><div class="typo-icon">View all module positions live by appending <strong>?tp=1</strong> or <strong>&amp;tp=1</strong> to the end of your URL such as <strong><a href="#">http://yoursite.com/index.php?tp=1</a></strong>.</div></div>\r\n\r\n<p>The below diagram is of the <a href="index.php?option=com_content&amp;view=article&amp;id=49&amp;Itemid=56">Module Variations</a> page.</p>\r\n\r\n<img src="images/stories/demo/general/module-positions.jpg" alt="Module Positions" class="rt-image" />', '', 1, 5, 0, 34, '2010-03-23 18:00:05', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:05', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 4, '', '', 0, 45, 'robots=\nauthor='),
(51, 'Typography Overview', 'typography-overview', '', '<p>Typography is a fundamental part of a template, providing you with the tools to characterise your content and bring it to life. There is a vast array of typography available with this template, as is with our previous releases, from list styles, notice blocks and a diverse number of other elements.</p>\r\n\r\n<p>There are 2 methods in which to implement the typography into your Joomla content:</p>\r\n\r\n<ol>\r\n  <li><a href="index.php?option=com_content&amp;view=article&amp;id=52&amp;Itemid=59">HTML Mode:</a> This is the <em>traditional</em> approach for implementing typography as used in the pre-2009 templates / demos, where you had to use HTML coding / syntax for the typography. This presents two main problems: the Joomla WYSIWYG editor is notorious for stripping out HTML so could easily remove your formatted article and no typography; secondly, using HTML for typography may present a problem for certain users who are unaccustomed to HTML and coding.<br /><br /></li>\r\n  \r\n  <li><a href="index.php?option=com_content&amp;view=article&amp;id=53&amp;Itemid=60">RokCandy Mode:</a> The RokCandy component from RocketTheme allows you to implement typography easily, without fear of the WYSIWYG editor ruining your formatting and allows you, and/or your clients to add them to your content with ease. This is through a method similar to BBcode (as seen in a forum). WYSIWYG friendly syntax can be used, or even custom configured that will transform a set snippet to the correct HTML when it is parsed by Joomla.</li>\r\n</ol>\r\n\r\n<h3><span>Why</span> use RokCandy?</h3>\r\n\r\n<p>RokCandy is the ideal solution for those with <strong>limited coding skills</strong> or those who implement our templates for their <strong>clients</strong>. It is free from the WYSIWYG editors horrific filtering habits and can be easily pre-configured for your personal needs or the needs of your client.\r\n</p>\r\n\r\n[readon url="index.php?option=com_content&amp;view=article&amp;id=53&amp;Itemid=60"]RokCandy Typography[/readon]\r\n\r\n<h3><span>RokCandy</span> Example</h3>\r\n\r\n<p>The RokCandy Typography button is created by using the following syntax with RokCandy:</p>\r\n\r\n<pre>\r\n&#91;readon url="/typography/rokcandy-examples"&#93;RokCandy Typography&#91;/readon&#93;\r\n\r\n</pre>\r\n\r\n<p>However, if we were to use HTML, the following code would be required:</p>\r\n\r\n<pre>\r\n&lt;p&gt;\r\n  &lt;a class=&quot;readon&quot; href=&quot;/typography/rokcandy-examples&quot;&gt;\r\n    &lt;span&gt;Read more...&lt;/span&gt;\r\n  &lt;/a&gt;\r\n&lt;/p&gt;\r\n</pre>\r\n\r\n<p>As you can see, the RokCandy version is a lot easier to use.</p>', '', 1, 5, 0, 34, '2010-03-23 18:00:15', 62, '', '2010-03-27 19:23:25', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 5, '', '', 0, 50, 'robots=\nauthor='),
(52, 'HTML Typography', 'html-typography', '', '<p>\r\n  This tutorial page features all the typography available with the template, showcasing them in HTML form. If you wish to use the RokCandy format, which is WYSIWYG friendly, please go to <a href="index.php?option=com_content&amp;view=article&amp;id=53&amp;Itemid=60">the RokCandy Typography page</a>.\r\n  <br /><br />\r\n  This page shows all of the typography styles and settings in action. If you would like to read more detailed information on inserting the included typography into your content, check out the <a href="index.php?option=com_content&amp;view=article&amp;id=61&amp;Itemid=68">Typography Tutorial.</a>\r\n</p>\r\n\r\n<div class="component-header"><h2 class="componentheading">This is a ComponentHeading</h2></div>\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p>\r\n\r\n<div class="contentheading">This is a Contentheading</div>\r\n\r\n<p>Proin ac nunc eu nunc condimentum accumsan. Phasellus odio justo, euismod vitae, egestas a, porttitor in, urna. Maecenas vitae mauris. Donec vestibulum, nunc eu varius pharetra, massa est sagittis odio, sit amet eleifend elit dolor id tortor. </p>\r\n\r\n<h1>This is a H1 Header</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sit amet odio quis sapien molestie ultrices. Vivamus quis lectus. Praesent eu mi. Curabitur pharetra leo sed nisl. Nunc vel nisi. Aliquam nulla. Etiam at est. Pellentesque arcu diam, tempus nec, sodales eu, ullamcorper quis, risus. </p>\r\n\r\n<h2>This is a H2 Header</h2>\r\n\r\n<p>Proin ac nunc eu nunc condimentum accumsan. Phasellus odio justo, euismod vitae, egestas a, porttitor in, urna. Maecenas vitae mauris. Donec vestibulum, nunc eu varius pharetra, massa est sagittis odio, sit amet eleifend elit dolor id tortor. </p>\r\n\r\n<h3>This is a H3 Header</h3>\r\n\r\n<p>Mauris euismod. In ac massa vitae quam tincidunt dapibus. Ut at tortor nec mi mattis blandit. Maecenas venenatis lorem at nulla. Phasellus a libero. Sed odio odio, eleifend dignissim, feugiat vel, tempor nec, ligula. Suspendisse lacinia convallis nulla.</p>\r\n\r\n<h4>This is a H4 Header</h4>\r\n\r\n<p>Vestibulum posuere, lacus aliquet pulvinar faucibus, tortor urna luctus diam, vitae ultrices ante magna non tellus. Donec nunc magna, posuere eget, aliquam in, vulputate in, lacus. Sed venenatis. Donec nec dolor vitae mauris dapibus ullamcorper. Etiam iaculis mollis tortor. </p>\r\n\r\n<h5>This is a H5 Header</h5>\r\n\r\n<p>Pellentesque vel enim urna, sit amet blandit ipsum. Maecenas quis sem sit amet nunc pretium mattis. Sed dapibus semper est, sed pretium erat sodales sed. Aenean hendrerit fringilla sem, et tincidunt libero ornare at. Sed venenatis pretium mauris sed vehicula. </p>\r\n\r\n<h3><a name="blockquotes" href="#blockquotes">Blockquote Example</a></h3>\r\n\r\n<blockquote><p><strong>This is a blockquote, you will want to use the following formatting: &lt;blockquote&gt;&lt;p&gt;....&lt;/p&gt;&lt;/blockquote&gt;</strong>. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p></blockquote>\r\n\r\n<h3><a name="dropcap" href="#dropcap">DropCap Styles</a></h3>\r\n\r\n<p class="dropcap"><span class="dropcap">P</span>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.<br /><br />You will need to use the following formatting: <strong>&lt;p class=&quot;dropcap&quot;&gt;&lt;span class=&quot;<em style="font-weight: normal !important;">dropcap</em>&quot;&gt;<em style="font-weight: normal !important;">P</em>&lt;/span&gt;&lt;/p&gt;</strong></p>\r\n\r\n<p><strong>Number Examples</strong></p>\r\n<p class="dropcap"><span class="dropcap">1</span>You will need to use the following formatting: <strong>&lt;p class=&quot;dropcap&quot;&gt;&lt;span class=&quot;<em style="font-weight: normal !important;">dropcap</em>&quot;&gt;<em style="font-weight: normal !important;">1</em>&lt;/span&gt;&lt;/p&gt;</strong></p>\r\n<p class="dropcap"><span class="dropcap">2</span>You will need to use the following formatting: <strong>&lt;p class=&quot;dropcap&quot;&gt;&lt;span class=&quot;<em style="font-weight: normal !important;">dropcap</em>&quot;&gt;<em style="font-weight: normal !important;">2</em>&lt;/span&gt;&lt;/p&gt;</strong></p>\r\n<p class="dropcap"><span class="dropcap">3</span>You will need to use the following formatting: <strong>&lt;p class=&quot;dropcap&quot;&gt;&lt;span class=&quot;<em style="font-weight: normal !important;">dropcap</em>&quot;&gt;<em style="font-weight: normal !important;">3</em>&lt;/span&gt;&lt;/p&gt;</strong></p>\r\n\r\n<h3><a name="bullets" href="#bullets">List Styles - Bullets</a></h3>\r\n<p>Below is a list with <em style="font-weight: normal !important;">bullets</em>.  To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">class name</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong></p>\r\n\r\n<ul class="bullet-1">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-1</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-1</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-2">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-2</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-2</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-3">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-3</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-3</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-4">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-4</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-4</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-5">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-5</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-5</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-6">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-6</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-6</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-7">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-7</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-7</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-8">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-8</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-8</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-9">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-9</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-9</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n<br />\r\n<ul class="bullet-10">\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-10</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n  <li>To use this style create a list in the following format: <strong>&lt;ul class="</strong><em style="font-weight: normal !important;">bullet-10</em><strong>"&gt;&lt;li&gt;....&lt;/li&gt;&lt;li&gt;....&lt;/li&gt;...&lt;/ul&gt;</strong>.</li>\r\n</ul>\r\n\r\n<h3><a name="emphasis" href="#emphasis">Emphasis Styles</a></h3>\r\n\r\nThis is a emphasis tag that allows you to <em class="color">highlight words or phrases</em>. Use the following format: <strong>&lt;em class=&quot;<em style="font-weight: normal !important;">color</em>&quot;&gt;...&lt;/em&gt;</strong><br /><br />\r\n\r\nThis is a emphasis tag that allows you to <em class="bold">highlight words or phrases</em>. Use the following format: <strong>&lt;em class=&quot;<em style="font-weight: normal !important;">bold</em>&quot;&gt;...&lt;/em&gt;</strong><br /><br />\r\n\r\n<h3><a name="insets" href="#insets">Inset Styles</a></h3>\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<span class="inset-right"><span class="inset-right-title">Inset Right Title</span>You will need to use the following formatting: <strong>&lt;span class=&quot;inset-right&quot;&gt;&lt;span class=&quot;inset-right-title&quot;&gt;....&lt;/span&gt;<em style="font-weight: normal !important;"> ... some content ... </em>&lt;/strong&gt;</strong></span>Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p>\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<span class="inset-left"><span class="inset-left-title">Inset Left Title</span>You will need to use the following formatting: <strong>&lt;span class=&quot;inset-left&quot;&gt;&lt;span class=&quot;inset-left-title&quot;&gt;....&lt;/span&gt;<em style="font-weight: normal !important;"> ... some content ... </em>&lt;/span&gt;</strong></span>Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p><p>Sed euismod magna a nibh. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n\r\n<h3><a name="notice" href="#notice">Notice Styles</a></h3>\r\n\r\n<div class="alert"><div class="typo-icon">This is a sample of the ''alert'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="alert"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="approved"><div class="typo-icon">This is a sample of the ''approved'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="approved"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="attention"><div class="typo-icon">This is a sample of the ''attention'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="attention"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="camera"><div class="typo-icon">This is a sample of the ''camera'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="camera"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="cart"><div class="typo-icon">This is a sample of the ''cart'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="cart"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="doc"><div class="typo-icon">This is a sample of the ''doc'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="doc"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="download"><div class="typo-icon">This is a sample of the ''download'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="download"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="media"><div class="typo-icon">This is a sample of the ''media'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="media"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="note"><div class="typo-icon">This is a sample of the ''note'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="note"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="notice"><div class="typo-icon">This is a sample of the ''notice'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="notice"&gt;&lt;div class=&quot;typo-icon&quot;&gt;....&lt;/div&gt;&lt;/div&gt;</strong></div></div>\r\n\r\n<div class="quote"><div class="quote-l"><div class="quote-r">This is a sample of the ''quote'' style.  Use this style to denote very important information to your users. To use this use the following html: <strong>&lt;div class="quote"&gt;&lt;div class=&quot;quote-l&quot;&gt;&lt;div class=&quot;quote-r&quot;&gt;....&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;</strong></div></div></div>\r\n\r\n<h3><a name="pre-example" href="#pre-example">Pre Example</a></h3>\r\n\r\n<pre>\r\nThis is a sample <strong>&lt;pre&gt;...&lt;/pre&gt;</strong> tag:\r\n\r\ndiv.modulebox-black div.bx1 {\r\n  background: url(../images/black/box_bl.png) 0 100% no-repeat;\r\n}\r\n\r\ndiv.modulebox-black div.bx2 {\r\n  background: url(../images/black/box_tr.png) 100% 0 no-repeat;\r\n}\r\n\r\ndiv.modulebox-black div.bx3 {\r\n  background: url(../images/black/box_tl.png) 0 0 no-repeat;\r\n  padding: 0;\r\n  margin: 0;\r\n}\r\n</pre>', '', 1, 5, 0, 34, '2010-03-23 18:00:26', 62, '', '2010-03-27 19:12:48', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:26', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 6, '', '', 0, 33, 'robots=\nauthor='),
(53, 'RokCandy Typography', 'rokcandy-typography', '', '<p><strong>The RokCandy component is required for the syntax below to work.</strong></p>\r\n\r\n<p>All syntax below uses RokCandy, the content macro extension for Joomla. RokCandy converts simple, understandable and pre-defined syntax to complex HTML constructions.</p>\r\n\r\n<p>If you wish to view the typography page, showing how to setup the various typography elements with HTML, then please go to the <a href="index.php?option=com_content&amp;view=article&amp;id=52&amp;Itemid=59">HTML Typography page</a>.</p>\r\n\r\n<p>If you would like to read more detailed information on inserting the included typography into your content, check out the <a href="index.php?option=com_content&amp;view=article&amp;id=61&amp;Itemid=68">Typography Tutorial.</a></p>\r\n\r\n[componentheading]This is a ComponentHeading[/componentheading]\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p>\r\n\r\n[contentheading]This is a ContentHeading[/contentheading]\r\n\r\n<p>Proin ac nunc eu nunc condimentum accumsan. Phasellus odio justo, euismod vitae, egestas a, porttitor in, urna. Maecenas vitae mauris. Donec vestibulum, nunc eu varius pharetra, massa est sagittis odio, sit amet eleifend elit dolor id tortor. </p>\r\n\r\n[h1]This is an H1 Header[/h1]\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin sit amet odio quis sapien molestie ultrices. Vivamus quis lectus. Praesent eu mi. Curabitur pharetra leo sed nisl. Nunc vel nisi. Aliquam nulla. Etiam at est. Pellentesque arcu diam, tempus nec, sodales eu, ullamcorper quis, risus. </p>\r\n\r\n[h2]This is an H2 Header[/h2]\r\n\r\n<p>Proin ac nunc eu nunc condimentum accumsan. Phasellus odio justo, euismod vitae, egestas a, porttitor in, urna. Maecenas vitae mauris. Donec vestibulum, nunc eu varius pharetra, massa est sagittis odio, sit amet eleifend elit dolor id tortor. </p>\r\n\r\n[h3]This is an H3 Header[/h3]\r\n\r\n<p>Mauris euismod. In ac massa vitae quam tincidunt dapibus. Ut at tortor nec mi mattis blandit. Maecenas venenatis lorem at nulla. Phasellus a libero. Sed odio odio, eleifend dignissim, feugiat vel, tempor nec, ligula. Suspendisse lacinia convallis nulla. Vestibulum posuere, lacus aliquet pulvinar faucibus, tortor urna luctus diam, vitae ultrices ante magna non tellus.</p>\r\n\r\n[h4]This is an H4 Header[/h4]\r\n\r\n<p>Mauris euismod. In ac massa vitae quam tincidunt dapibus. Ut at tortor nec mi mattis blandit. Maecenas venenatis lorem at nulla. Phasellus a libero. Sed odio odio, eleifend dignissim, feugiat vel, tempor nec, ligula. Suspendisse lacinia convallis nulla. Vestibulum posuere, lacus aliquet pulvinar faucibus, tortor urna luctus diam, vitae ultrices ante magna non tellus.</p>\r\n\r\n[h5]This is an H5 Header[/h5]\r\n\r\n<p>Mauris euismod. In ac massa vitae quam tincidunt dapibus. Ut at tortor nec mi mattis blandit. Maecenas venenatis lorem at nulla. Phasellus a libero. Sed odio odio, eleifend dignissim, feugiat vel, tempor nec, ligula. Suspendisse lacinia convallis nulla. Vestibulum posuere, lacus aliquet pulvinar faucibus, tortor urna luctus diam, vitae ultrices ante magna non tellus.</p>\r\n\r\n[h3]<a name="blockquotes" href="#blockquotes">Blockquote Styles</a>[/h3]\r\n\r\n[blockquote]This is a blockquote, you will want to use the following formatting: <strong>&#91;blockquote&#93;....&#91;/blockquote&#93;</strong>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.[/blockquote]\r\n\r\n[h3]<a name="dropcap" href="#dropcap">DropCap Styles</a>[/h3]\r\n\r\n[dropcap cap="P"]Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.<br /><br />You will need to use the following formatting: <strong>&#91;dropcap cap="P"&#93;...some content...&#91;/dropcap&#93;</strong>[/dropcap]\r\n\r\n[dropcap cap="1"]You will need to use the following formatting: <strong>&#91;dropcap cap="1"&#93;...some content...&#91;/dropcap&#93;</strong>[/dropcap]\r\n[dropcap cap="2"]You will need to use the following formatting: <strong>&#91;dropcap cap="2"&#93;...some content...&#91;/dropcap&#93;</strong>[/dropcap]\r\n[dropcap cap="3"]You will need to use the following formatting: <strong>&#91;dropcap cap="3"&#93;...some content...&#91;/dropcap&#93;</strong>[/dropcap]\r\n\r\n[h3]<a name="bullets" href="#bullets">List Styles - Bullets</a>[/h3]\r\n<p>Below is a list with <em style="font-weight: normal !important;">bullets</em>.  To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">class name</em><strong>&#93;&#91;li&#93;....&#91;/li&#93;&#91;li....&#91;/li&#93;&#91;/list&#93;</strong></p>\r\n\r\n[list class="bullet-1"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-1"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-1"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-2"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-2"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-2"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-3"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-3"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-3"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-4"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-4"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-4"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-5"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-5"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-5"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-6"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-6"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-6"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-7"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-7"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-7"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-8"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-8"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-8"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]<br />\r\n[list class="bullet-9"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-9"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-9"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]\r\n[list class="bullet-10"][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-10"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][li]To use this style create a list in the following format: <strong>&#91;list class=</strong><em style="font-weight: normal !important;">"bullet-10"</em><strong>&#93;&#91;li&#93;...&#91;/li&#93;&#91;li&#93;...&#91;/li&#93;&#91;/list&#93;</strong>.[/li][/list]\r\n\r\n[h3]<a name="emphasis-styles" href="#emphasis-styles">Emphasis Styles</a>[/h3]\r\n\r\nThis is a span that allows you to [emphasis]highlight words or phrases[/emphasis]. Use the following format: <strong>&#91;emphasis&#93; ... some content ... &#91;/emphasis&#93;</strong><br /><br />\r\n\r\nThis is a span that allows you to [emphasisbold]highlight words or phrases[/emphasisbold]. Use the following format: <strong>&#91;emphasisbold&#93; ... some content .... &#91;/emphasisbold&#93;</strong><br /><br />\r\n\r\n[h3]<a name="insets" href="#insets">Inset Styles</a>[/h3]\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.[inset side="right" title="Inset Right Title"]You will need to use the following formatting: <strong>&#91;inset side="right" title="Inset Right Title"&#93; ... some content ...&#91;/inset&#93;</strong>[/inset]Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p>\r\n\r\n<p>Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.[inset side="left" title="Inset Left Title"]You will need to use the following formatting: <strong>&#91;inset side="left" title="Inset Left Title"&#93; ... some content ...&#91;/inset&#93;</strong>[/inset]Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed euismod magna a nibh.</p><p>Sed euismod magna a nibh. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.Praesent rutrum sapien ac felis. Phasellus elementum dolor quis turpis. Vestibulum nec mi vitae pede tincidunt nonummy. Vestibulum facilisis mollis neque. Sed orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n\r\n[h3]<a name="notice-styles" href="#notice-styles">Notice Styles</a>[/h3]\r\n\r\n[div class="alert" class2="typo-icon"]This is a sample of the ''alert'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="alert" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="approved" class2="typo-icon"]This is a sample of the ''approved'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="approved" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="attention" class2="typo-icon"]This is a sample of the ''attention'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="attention" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="camera" class2="typo-icon"]This is a sample of the ''camera'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="camera" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="cart" class2="typo-icon"]This is a sample of the ''cart'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="cart" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="doc" class2="typo-icon"]This is a sample of the ''doc'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="doc" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="download" class2="typo-icon"]This is a sample of the ''download'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="download" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="media" class2="typo-icon"]This is a sample of the ''media'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="media" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="note" class2="typo-icon"]This is a sample of the ''note'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="note" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div class="notice" class2="typo-icon"]This is a sample of the ''notice'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div&nbsp;class="notice" class2="typo-icon"&#93;</strong> ...some content.... <strong>&#91;/div&#93;</strong>[/div]\r\n\r\n[div3 class="quote" class2="quote-l" class3="quote-r"]This is a sample of the ''quote'' style.  Use this style to denote very important information to your users. To use this use the following syntax: <strong>&#91;div3&nbsp;class=&quot;quote&quot; class2=&quot;quote-l&quot; class3=&quot;quote-r&quot;&#93;</strong> ...some content.... <strong>&#91;/div3&#93;</strong>[/div3]\r\n\r\n[h3]<a name="pre-example" href="#pre-example">Pre Example</a>[/h3]\r\n\r\n[pre]\r\nThis is a sample <strong>&#91;pre&#93; ... &#91;/pre&#93;</strong> tag:\r\n\r\ndiv.modulebox-black div.bx1 {\r\nbackground: url(../images/black/box_bl.png) 0 100% no-repeat;\r\n}\r\n\r\ndiv.modulebox-black div.bx2 {\r\nbackground: url(../images/black/box_tr.png) 100% 0 no-repeat;\r\n}\r\n\r\ndiv.modulebox-black div.bx3 {\r\nbackground: url(../images/black/box_tl.png) 0 0 no-repeat;\r\npadding: 0;\r\nmargin: 0;\r\n}\r\n[/pre]', '', 1, 5, 0, 34, '2010-03-23 18:00:36', 62, '', '2010-03-27 19:13:11', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:36', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 7, '', '', 0, 18, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(54, 'Integrated Extensions', 'integrated-extensions', '', '<p>This is a listing of all the extensions that accompany the template release.</p>\r\n\r\n<div class="rt-ext-important">\r\n  <img src="images/stories/demo/general/ext/roknewspager.png" alt="image" class="rt-ext-img png"/>    \r\n  <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/roknewspager" rel="rokbox[fullscreen]">RokNewsPager Module</a></strong><br />\r\n  <span class="rt-ext-desc">RokNewsPager is an article previewer and rotator. It displays content articles, in a summarised form and, using Mootools based javascript transition, rotates through a series of pages displaying articles in a contracted list format.</span>\r\n  <span class="rt-ext-divider">&nbsp;</span>\r\n  <span class="rt-ext-links"><a target="_blank" href="http://demo.rockettheme.com/extensions/?extension=roknewspager">Demo</a> - <a target="_blank" href="http://www.rockettheme.com/extensions-downloads/club/999-roknewspager">Download</a> - <a href="http://www.rockettheme.com/extensions-joomla/roknewspager" rel="rokbox[fullscreen]">Documentation</a></span>\r\n</div><br />\r\n<div class="clear"></div>\r\n\r\n<div class="rt-ext-col1">\r\n  <div class="rt-ext-block">\r\n    <img class="rt-ext-img png" alt="image" src="images/stories/demo/general/ext/rokstories.png"/>\r\n    <strong><a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokstories" target="_blank">RokStories Module</a></strong><br />\r\n    <span class="rt-ext-desc">Functional showcase module for displaying content items and their accompanying images in an interactive and versatile manner.</span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a target="_blank" href="http://demo.rockettheme.com/extensions/?extension=rokstories">Demo</a> - <a target="_blank" href="http://www.rockettheme.com/extensions-downloads/club/1001-rokstories">Download</a> - <a href="http://www.rockettheme.com/extensions-joomla/rokstories" rel="rokbox[fullscreen]">Documentation</a></span>\r\n  </div>\r\n  <div class="rt-ext-block">\r\n    <img src="images/stories/demo/general/ext/rokajaxsearch.png" alt="image" class="rt-ext-img png"/>    \r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/rokajaxsearch" rel="rokbox[fullscreen]">RokAjaxSearch Module</a></strong><br/>\r\n    <span class="rt-ext-desc">Ajax powered module, allowing for interactive search of both local Joomla pages and the web with its Google integration. </span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://demo.rockettheme.com/extensions/?extension=rokajaxsearch" target="_blank">Demo</a> - <a href="http://www.rockettheme.com/extensions-downloads/free/1004-rokajaxsearch" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokajaxsearch">Documentation</a></span>\r\n  </div>\r\n  <div class="rt-ext-block">\r\n    <img src="images/stories/demo/general/ext/roknavmenu.png" alt="image" class="rt-ext-img png"/>  \r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/roknavmenu" rel="rokbox[fullscreen]">RokNavMenu Module</a></strong><br/>\r\n    <span class="rt-ext-desc">RokNavMenu is a foundational extension which is at the core of the inbuilt menu systems and is a requirement for all themes.</span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://demo.rockettheme.com/extensions/?extension=roknavmenu" target="_blank">Demo</a> - <a href="http://www.rockettheme.com/extensions-downloads/club/1048-roknavmenu" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/roknavmenu">Documentation</a></span>\r\n  </div>  \r\n  <div class="rt-ext-block last">\r\n    <img src="images/stories/demo/general/ext/rokbox.png" alt="image" class="rt-ext-img png"/>\r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/rokbox" rel="rokbox[fullscreen]">RokBox Plugin</a></strong><br/>\r\n    <span class="rt-ext-desc">Javascript popup / litebox utility, can be used for images, links, videos, websites, PDFs and much more. </span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://demo.rockettheme.com/extensions/?extension=rokbox" target="_blank">Demo</a> - <a href="http://www.rockettheme.com/extensions-downloads/free/1005-rokbox" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokbox">Documentation</a></span>\r\n  </div>\r\n</div>\r\n\r\n<div class="rt-ext-col2">\r\n  <div class="rt-ext-block">\r\n    <img src="images/stories/demo/general/ext/rokcandy.png" alt="image" class="rt-ext-img png"/>\r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/rokcandy" rel="rokbox[fullscreen]">RokCandy Component</a></strong><br/>\r\n    <span class="rt-ext-desc">A component that provides BBcode style functionality for Joomla for swift and easy implementation of complex code elements. </span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://www.rockettheme.com/extensions-downloads/free/1007-rokcandy" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokcandy">Documentation</a></span>\r\n  </div>\r\n  <div class="rt-ext-block">\r\n    <img src="images/stories/demo/general/ext/rokgzipper.png" alt="image" class="rt-ext-img png"/>\r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/rokgzipper" rel="rokbox[fullscreen]">RokGZipper Plugin</a></strong><br/>\r\n    <span class="rt-ext-desc">A performance plugin that compresses your CSS/JS files, resulting in faster page loads. Compatible RocketTheme themes only.</span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://demo.rockettheme.com/" target="_blank">Demo</a> - <a href="http://www.rockettheme.com/extensions-downloads/free/1009-rokgzipper" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokgzipper">Documentation</a></span>\r\n  </div>\r\n  <div class="rt-ext-block">\r\n    <img src="images/stories/demo/general/ext/roktabs.png" alt="image" class="rt-ext-img png"/>\r\n    <strong><a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/roktabs" target="_blank">RokTabs Module</a></strong><br />\r\n    <span class="rt-ext-desc">Tabbed content module, perfect for maximising content exposure without sacrificing on site real estate. Built-in Mootools effects.</span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a target="_blank" href="http://demo.rockettheme.com/extensions/?extension=roktabs">Demo</a> - <a target="_blank" href="http://www.rockettheme.com/extensions-downloads/free/1011-roktabs">Download</a> - <a href="http://www.rockettheme.com/extensions-joomla/roktabs" rel="rokbox[fullscreen]">Documentation</a></span>\r\n  </div>\r\n  <div class="rt-ext-block last">\r\n    <img src="images/stories/demo/general/ext/rokpad.png" alt="image" class="rt-ext-img png"/>\r\n    <strong><a target="_blank" href="http://www.rockettheme.com/extensions-joomla/rokpad" rel="rokbox[fullscreen]">RokPad Editor</a></strong><br/>\r\n    <span class="rt-ext-desc">A code editor with syntax highlighting, ajax saving and much more. Better than Joomla''s <em>No Editor</em>.</span>\r\n    <span class="rt-ext-divider">&nbsp;</span>\r\n    <span class="rt-ext-links"><a href="http://www.rockettheme.com/extensions-downloads/club/1091-rokpad" target="_blank">Download</a> - <a rel="rokbox[fullscreen]" href="http://www.rockettheme.com/extensions-joomla/rokpad">Documentation</a></span>\r\n  </div>\r\n</div>\r\n<div class="clear"></div>', '', 1, 5, 0, 34, '2010-03-23 18:00:47', 62, '', '2010-03-29 15:23:20', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:47', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 8, '', '', 0, 138, 'robots=\nauthor='),
(55, 'Tutorials and Guides', 'tutorials-and-guides', '', '<h4>Written Tutorials</h4>\r\n\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=56&amp;Itemid=63">Installation</a></li>\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=57&amp;Itemid=64">RocketLauncher</a></li>\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=58&amp;Itemid=65">Style Control</a></li>\r\n	</ul>\r\n</div>\r\n\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66">Menu Options</a></li>\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=60&amp;Itemid=67">Logo Editing</a></li>\r\n		<li><a href="index.php?option=com_content&amp;view=article&amp;id=61&amp;Itemid=68">Using Typography</a></li>\r\n	</ul>\r\n</div>\r\n\r\n<div class="clear"></div>\r\n\r\n<h4>Video Tutorials</h4>\r\n\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="http://www.rockettheme.com/video/joomla15/template-installation-joomla15.mov" title="Video Tutorial :: Joomla Template Installation Video Tutorial" rel="rokbox[800 620]">Template Installation Video</a></li>\r\n		<li><a href="http://www.rockettheme.com/video/joomla15/menu-configuration-joomla15.mov" title="Video Tutorial :: Joomla Menu Setup Video Tutorial" rel="rokbox[504 336]">Menu Setup Video</a></li>\r\n		<li><a href="http://www.rockettheme.com/video/joomla15/using-typography-joomla15.mov" title="Video Tutorial :: Joomla Using Typography Video Tutorial" rel="rokbox[540 380]">Using Typography Video</a></li>\r\n	</ul>\r\n</div>\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="http://www.rockettheme.com/video/joomla15/installing-rocketlauncher-joomla15.mov" title="Video Tutorial :: Joomla RocketLauncher Installation Video Tutorial" rel="rokbox[503 356]">RocketLauncher Installation Video</a></li>\r\n		<li><a href="video/logo.mov" title="Video Tutorial :: Quantive Logo Editing Video Tutorial" rel="rokbox[540 360]">Quantive Logo Editing Video</a></li>\r\n	</ul>\r\n</div>\r\n\r\n<div class="clear"></div>\r\n\r\n<h4>Forum Tutorials and Guides</h4>\r\n\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="http://www.rockettheme.com/forum/index.php?f=344&amp;t=95153&amp;rb_v=viewtopic" target="_blank">Demo Content Information</a></li>\r\n		<li><a href="http://www.rockettheme.com/forum/index.php?f=344&amp;t=95148&amp;rb_v=viewtopic" target="_blank">Editing Template Text</a></li>\r\n	</ul>\r\n</div>\r\n\r\n<div class="demo-tut-list">\r\n	<ul class="bullet-2">\r\n		<li><a href="http://www.rockettheme.com/forum/index.php?f=344&amp;t=95151&amp;rb_v=viewtopic" target="_blank">Editing RocketTheme Branding</a></li>\r\n		<li><a href="http://www.rockettheme.com/forum/index.php?f=344&amp;t=95145&amp;rb_v=viewtopic" target="_blank">Editing the Logo</a></li>\r\n	</ul>\r\n</div>\r\n\r\n<div class="clear"></div>\r\n\r\n<h3>Demo Content</h3>\r\n\r\n<p>We have a forum based tutorial outlining the syntax used in constructing the Frontpage elements of the Quantive demo.</p>\r\n<p><a class="readon" href="http://www.rockettheme.com/forum/index.php?f=344&amp;t=95153&amp;rb_v=viewtopic" target="_blank"><span>Visit Tutorial</span></a></p>\r\n\r\n<h3>Template Configuration</h3>\r\n\r\n<p>To configure the template, go to <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong>. There you will find a list of all the template parameters. You can control many aspects of the template here. If you mouseover the labels/names of each parameter, a description will appear via tooltip to outline what each parameter does.</p>\r\n\r\n\r\n<h3>IE6 PNG Fix</h3>\r\n\r\n<p>The template has an integrated PNG fix for IE6 that allows transparent PNG32 images to show, as intended, in the IE6 browser. All you need to do is add <em class="bold">class=&quot;png&quot;</em> to the element such as the change in the following example:</p>\r\n\r\n<pre>\r\n&lt;img src=&quot;images/sample1.png&quot; alt=&quot;sample&quot; /&gt;\r\n\r\n</pre>\r\n\r\n<p>Change to</p>\r\n\r\n<pre>\r\n&lt;img src=&quot;images/sample1.png&quot; alt=&quot;sample&quot; <em class="bold">class="png"</em> /&gt;\r\n\r\n</pre>', '', 1, 5, 0, 34, '2010-03-23 18:00:59', 62, '', '2010-03-29 19:16:35', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:00:59', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 9, '', '', 0, 93, 'robots=\nauthor='),
(76, 'Optimization', 'optimization', '', '<div class="module-title" style="float: none;"><h2 class="title">Template Performance</h2></div><br />\r\n<p>The theme takes <strong>performance</strong> into account on all levels of its infrastructure from the <strong>condensed</strong> CSS files to the inbuilt <strong>caching</strong> facilities of Gantry.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=46&amp;Itemid=53"]Learn More[/readon2]', '', 1, 7, 0, 38, '2010-03-24 18:34:48', 62, '', '2010-03-30 12:55:05', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(56, 'Installation Instructions', 'installation-instructions', '', '<p>This guide covers the basics of installing a template.</p>\r\n\r\n<div class="media"><div class="typo-icon">\r\n  Video Tutorial Currently Available!\r\n  <a href="http://www.rockettheme.com/video/joomla15/template-installation-joomla15.mov" title="Video Tutorial :: Joomla Template Installation Video Tutorial" rel="rokbox[800 620]">Launch the Joomla Template Installation Video Tutorial now!</a>\r\n  </div></div>\r\n\r\n<h3>Downloading the necessary files</h3>\r\n\r\n<p>To install the template, you will need one of the following files:</p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong>Quantive Template (Standalone)</strong> <em>rt_quantive_j15.tgz</em> - This is the standalone template file that you use to install into Joomla.</li>\r\n	<li><strong>Quantive Template (Bundle)</strong> <em>rt_quantive_j15-bundle.tar.gz</em> - This is the bundle package, containing the template and Gantry library files, that you use to install into Joomla.</li>\r\n	<li><strong>RokNavMenu</strong> <em>rt_quantive_j15-extensions.zip or mod_roknavmenu.zip</em> - This is required for the menu to work, either download from the bundle package in the Quantive download section or from the RokNavMenu download area itself.</li>\r\n</ul>\r\n\r\n<div class="notice"><div class="typo-icon">Only use the Bundle package on a clean install, or on an install that does <strong>NOT</strong> have the Gantry library already installed - <em>/components/com_gantry</em>. Use the standalone package if the Gantry library is already present.</div></div>\r\n\r\n<p>There are other files that you may wish to download that accompany the release, but are not required for the template to work.</p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong>Quantive Source PNG(s)</strong> <em>rt_quantive_j15-sources.zip</em> - This contains all the Adobe&reg; Fireworks PNG source files for the template, and if applicable, the logo font.</li>\r\n	<li><strong>Quantive Extensions</strong> <em>rt_quantive_j15-extensions.zip</em> - This package contains all the extensions that accompany the template release.</li>\r\n	<li><strong>Quantive RocketLauncher</strong> <em>rt_quantive_j15-rocketlauncher.zip</em> - The RocketLauncher pack is a full Joomla install that contains all the demo content, including extensions and the template.</li>\r\n</ul>\r\n\r\n<div class="doc"><div class="typo-icon">The latest extensions can be downloaded from the Extensions Download area located <a href="http://www.rockettheme.com/extensions-downloads/" target="-blank">here</a></div></div>\r\n\r\n<h3><span>Step 1</span> - Using the Joomla installer</h3>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login into the Joomla administrator (<a href="#">http://yoursite.com/administrator</a>)</li>\r\n	<li>Go to <strong>Extensions &rarr; Install/Uninstall</strong></li>\r\n	<li>Select the browse button and find <strong>rt_quantive_j15.tgz</strong> or <strong>rt_quantive_j15-bundle.tar.gz</strong></li>\r\n	<li>Click <strong>Upload &amp; Install</strong></li>\r\n</ul>\r\n\r\n<p>The template is now installed.</p>\r\n\r\n<h3><span>Step 2</span> - Making Quantive Default</h3>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login into the Joomla administrator (<a href="#">http://yoursite.com/administrator</a>)</li>\r\n	<li>Go to <strong>Extensions &rarr; Template Manager</strong></li>\r\n	<li>Find <strong>rt_quantive_j15</strong></li>\r\n	<li>Select the radio icon to its left</li>\r\n	<li>Click <strong>Default</strong> in the top right button menu</li>\r\n</ul>\r\n\r\n<p>The template is now default and will appear as your site theme.</p>', '', 1, 5, 0, 34, '2010-03-23 18:01:10', 62, '', '2010-03-30 12:59:28', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:01:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 10, '', '', 0, 34, 'robots=\nauthor='),
(57, 'RocketLauncher Setup', 'rocketlauncher-setup', '', '<div class="alert"><div class="typo-icon">Note: All sample content images will be replaced with blank versions in the RocketLauncher version. Screenshots, such as those for the Logo Editing tutorial will remain however.</div></div>\r\n\r\n<h4>What is RocketLauncher?</h4>\r\n\r\n<p>RocketLauncher is a Joomla installation package that installs Joomla as the demo. The launcher installs the sample data, which has been customised to match the demo, and the template, extensions and images are already built in. The launcher is the best method to replicate the demo with ease.</p>\r\n\r\n<p>Due to the complexity of our demos, it is much easier to <em>see it in action</em> then it is to read in written tutorials and / or viewing screenshots. Therefore, the process of using the template on your Joomla site is much faster, simpler and makes for a better experience.\r\n</p>\r\n\r\n<h4>Version</h4>\r\n\r\n<p>We use the latest Joomla version available at the time for our launchers and when Joomla updates, we proceed to update all the launchers so they are up to date for all new downloads. Please go to the <a href="http://www.rockettheme.com/joomla-downloads/">Joomla Downloads</a> repository to see what version the RocketLauncher is using.</p>\r\n\r\n<p>For information on upgrading Joomla, please see: <a href="http://docs.joomla.org/Upgrading_1.5_from_an_existing_1.5x_version">http://docs.joomla.org</a></p>\r\n\r\n<div class="notice"><div class="typo-icon">RocketLauncher includes a FULL Joomla install, in addition to the template and demo contents. The Joomla installation process is necessary in creating the demo content, therefore RocketLauncher will only work properly as a new Joomla installation. It can not be used on an existing Joomla installation.</div></div>\r\n\r\n<h3>Instructions</h3>\r\n\r\n<h4>Step 1 - Upload the files</h4>\r\n\r\n<ul class="bullet-2">\r\n	<li>Download the Quantive RocketLauncher Package (rt_quantive_j15-rocketlauncher.zip) from the Quantive template downloads section</li>\r\n	<li>Unzip the zip package onto your computer to reveal the <em>rt_quantive_j15-rocketlauncher</em> folder</li>\r\n	<li>Upload this to your site using your FTP client</li>\r\n</ul>\r\n\r\n<p>Note, on some servers, you can upload the zip and extract the package directly onto your server using cPanel or SSH access. For more details on this, please contact your hosting provider.</p>\r\n\r\n<h4>Step 2 - Installation</h4>\r\n\r\n<ul class="bullet-2">\r\n	<li>Direct your browser to the installation such as <a href="#">www.yoursite.com/rt_quantive_j15-rocketlauncher</a> or to whatever directory you uploaded to</li>\r\n	<li>Choose a Language for your site then click next</li>\r\n	<li>Review the Pre-Installation Check page then click next</li>\r\n	<li>Review the License page then click next</li>\r\n	<li>Insert your Database information: host name, mysql username and mysql password then click next</li>\r\n	<li>Insert your main configuration information: site name, admin password and email address</li>\r\n	<li>Click <span class="highlight-bold">Install Sample Data</span> then click next</li>\r\n	<li>Delete the /installation directory on your server</li>\r\n</ul>\r\n\r\n<div class="alert"><div class="typo-icon">It is very important that you click the <span class="highlight-bold">Install Sample Data</span> button during the installation process, otherwise the launcher will be blank.</div></div>\r\n\r\n<h4>Further Guides</h4>\r\n\r\n<strong>RocketLauncher Installation Video Tutorial</strong><br />\r\n<p>Learn the steps to uploading the RocketLauncher package files to your server and installing the RocketLauncher template package by following along with the steps in this detailed video tutorial. It''s now easier than ever before to deploy a replica of the RocketTheme template demo sites.</p>\r\n<p><a class="readon" href="http://www.rockettheme.com/video/joomla15/installing-rocketlauncher-joomla15.mov" title="Video Tutorial :: Joomla RocketLauncher Installation Video Tutorial" rel="rokbox[503 356]"><span>Launch Video</span></a></p>\r\n\r\n<strong>Uploading RocketLauncher to your Root</strong><br />\r\n<p>An in depth guide that details the steps necessary to properly upload the files from the RocketLauncher template package directly to the root of your site. This will ensure your RocketLauncher installation installs to the root of your site, and not in a subfolder.  </p>\r\n<p><a class="readon" href="http://www.rockettheme.com/forum/index.php?t=20046&amp;rb_v=viewtopic" target="_blank"><span>Learn More</span></a></p>\r\n\r\n<strong>Updating RocketLauncher / Joomla on Mac</strong><br />\r\n<p>If you are a Mac user and develop in a localhost environment, you will want to use Terminal to update your Joomla as it is the fastest and simplest way to update locally on a Mac. </p>\r\n<p><a class="readon" href="http://www.rockettheme.com/forum/index.php?f=106&amp;t=64695&amp;rb_v=viewtopic#p335309" target="_blank"><span>Learn more</span></a></p>', '', 1, 5, 0, 34, '2010-03-23 18:01:22', 62, '', '2010-03-29 15:14:01', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:01:22', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 11, '', '', 0, 35, 'robots=\nauthor='),
(58, 'Style Control', 'style-control', '', '<div class="alert"><div class="typo-icon">Preview all available styles and any associated combination at the <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69">Preset Styles</a> page.</div></div>\r\n\r\n<p>The system allows you to quickly and effortlessly customise a preset to your liking, editing options to meet your requirements such as Font Settings.</p>\r\n\r\n<p>Control the Preset Settings via the template manager here: <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15 &rarr; Presets</strong></p>\r\n\r\n<p>After adjusting the parameters and on selection of a preset style, the administrator automatically updates the settings to match that particular style.</p>\r\n\r\n[readon url="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54"]Gantry Framework : Learn more[/readon]\r\n\r\n<h3>Available Settings/Options</h3>\r\n\r\n<p>The options are as follows, and the areas that they control are indicative in their name:</p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong>Style Presets:</strong> Preset 1 to Preset 10</li>\r\n	<li><strong>Background Level:</strong> Low - Medium - High <em>(slider)</em></li>\r\n	<li><strong>Background Style:</strong> Style1 to Style8 <em>(dropdown)</em></li>\r\n	<li><strong>Body Level:</strong> Low - Medium - High <em>(slider)</em></li>\r\n	<li><strong>Body Style:</strong> Light or Dark <em>(dropdown)</em></li>	\r\n	<li><strong>CSS Style:</strong> Style1 to Style8 <em>(dropdown)</em></li>\r\n	<li><strong>Link Color:</strong> Hex Color <em>(popup color wheel)</em></li>\r\n	<li><strong>Logo Style:</strong> Light or Dark <em>(dropdown)</em></li>\r\n	<li><strong>Article Title Style:</strong> Default, Square 1-6, Basic <em>(dropdown)</em></li>\r\n	<li><strong>Font Settings</strong>:\r\n		<ul>\r\n			<li><strong>Font Family:</strong> Geneva, Optima, Helvetica, Trebuchet, Lucida, Georgia, Palatino <em>(dropdown)</em></li>\r\n			<li><strong>Font Size:</strong> Default, Extra Large, Large, Small, Extra Small <em>(dropdown)</em></li>\r\n		</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><em>Other style option(s) worthy of note</em></p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong>Sidebar Class SFX:</strong> Insert the name of the suffix you wish for the Splitmenu sidebar to inherit <em>Menu Section - (text field)</em></li>\r\n</ul>\r\n\r\n<div class="note"><div class="typo-icon">Note: The <strong>Gantry Framework</strong> offers the ability to configure almost all of the available parameters, on a <strong>per menu item</strong> basis. For example, you can assign preset2 to one page and preset4 to another, all within the <strong>Gantry</strong> administrator.</div></div>\r\n\r\n<h3><span>Creating</span> your own Preset Styles</h3>\r\n\r\n<p>The Gantry Framework has an interface for creating your own custom presets via the template administrator. You ou do not need to edit the presets (or add your own) in the gantry.config.php file - although, it is still possible if you wish to do so.</p>\r\n\r\n<p>Simply go to <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15 &rarr; Settings</strong>, configure the options to fit your purposes, then click the <strong>Save Custom Presets as New</strong> button in the <strong>Presets tab</strong>. Follow the naming procedure on the popup then the custom preset will appear in Presets Showcase.</p>\r\n\r\n<p>Quick and Simple!</p>\r\n\r\n<div class="notice"><div class="typo-icon">The Quantive template has a plethora of configuration options available, many more beyond these Style Controls, simply go to <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong> and hover over the options for tips with descriptions to appear.</div></div>\r\n\r\n<h3>Assigning a Style to a Specific Page</h3>\r\n\r\n<p>With Gantry, the ability to assign a certain style to an individual page has never been easier and/or more efficient. Just follow these simple steps:</p>\r\n\r\n<ul class="bullet-2">\r\n	<li>Go to <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong></li>\r\n	<li>Select the <strong>Menu Items</strong> tab - located in the right column of the page in the orange box</li>\r\n	<li>Choose a menu item you wish to assign a different style to</li>\r\n	<li>Select your preset of choice from the <strong>Presets &rarr; Style Presets</strong> parameter area</li>\r\n	<li>Configure the <strong>Settings</strong> area to your personal preferences</li>\r\n	<li>Save</li>\r\n</ul>', '', 1, 5, 0, 34, '2010-03-23 18:01:34', 62, '', '2010-03-31 13:26:18', 63, 0, '0000-00-00 00:00:00', '2010-03-23 18:01:34', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 12, '', '', 0, 38, 'robots=\nauthor='),
(64, 'RokStories Article Two', 'rokstories-article-two', '', '<p><img src="images/stories/demo/frontpage/rokstories/blank2.png" alt="image"/></p>\r\n\r\n<span class="feature-title">choose from 10 presets in <span>either light or dark</span></span>\r\n<br />\r\n<p>\r\n<strong>The template is bundled with 10 style variations</strong>, each of which can have either a light or a dark mainbody. Also, there are <strong>High</strong>, <strong>Medium</strong> and <strong>Low</strong> modes, in regards to the detail level, which allows you to choose from either, a more graphically intense or a more graphically conservative variant of your style of choice. True stylistic versatility.\r\n</p>\r\n\r\n', '\r\n\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 6, 0, 37, '2010-03-24 18:07:15', 62, '', '2010-03-31 12:54:13', 63, 0, '0000-00-00 00:00:00', '2010-03-24 18:07:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 2, '', '', 0, 11, 'robots=\nauthor='),
(59, 'Menu Options', 'menu-options', '', '<div class="alert"><div class="typo-icon"><a href="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61">RokNavMenu</a> is an essential module for the template as the menus only operate when it is installed. The module does not need to be published for the menu to work.<br /><br />Please ensure you are using the latest version of RokNavMenu, available <a href="http://www.rockettheme.com/extensions-joomla/roknavmenu" target="_blank">here</a>.</div></div>\r\n\r\n<p>The template is accompanied by a series of menu systems which are outlined below:</p>\r\n\r\n<div class="media"><div class="typo-icon"><strong>Video Tutorial Currently Available!</strong> <a title="Video Tutorials :: Menu Configuration" href="http://www.rockettheme.com/video/joomla15/menu-configuration-joomla15.mov" rel="rokbox[504 336]">Launch the Joomla Menu Setup Video Tutorial now!</a></div></div>\r\n\r\n<h3><span>Menu</span> Types</h3>\r\n\r\n<p>Please click the links in the list below to load the various menu types.</p>\r\n\r\n<ul class="bullet-2">\r\n	<li><strong><a href="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66&amp;menu-type=fusionmenu">Fusion Menu</a></strong> - Fusion Menu, an advanced dropdown based CSS menu. It supports both Mootools powered transition and animation enhancements for its dropdown.</li>\r\n	<li><strong><a href="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66&amp;menu-type=splitmenu">SplitMenu</a></strong> - A static menu system that displays submenu items outside of the main horizontal menu, the 2nd level in a menu bar underneath, and the 3rd level items, in the side column.</li>\r\n	<li><strong><a href="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66&amp;menu-type=nomenu">No Menu</a></strong> - This option disables the inbuilt menu system in its entirety. As the menu is supplanted into a module position via Gantry, when the menu is disabled, you can continue to use the position as normal.</li>\r\n</ul>\r\n\r\n<div class="notice"><div class="typo-icon">In <strong>Internet Explorer 6</strong>, the Fusion Menu is automatically degraded to Suckerfish, a basic, static, CSS dropdown menu system; without all the javascript enhancements and effects of Fusion.</div></div>\r\n\r\n<p>The menu type used is set via template configuration at <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15 &rarr; Menu Control</strong>. Select your desired menu type from the dropdown and save. Also, the various Mootools effects of Fusion Menu can also be configured in the template manager.</p>\r\n\r\n<div class="attention"><div class="typo-icon">Descriptions of each template parameter can be seen when you mouseover the label of each option.</div></div>\r\n\r\n<h3><span>Fusion</span> Menu</h3>\r\n\r\n<div class="alert"><div class="typo-icon">Fusion requires the latest version RokNavMenu to be installed in order for it to work.</div></div>\r\n\r\n<p>Fusion is javascript-based dropdown menu system, with extensive functionality. The menu itself is built on the rewritten core of the latest revision of RokNavMenu, the core application behind all RocketTheme menus.</p>\r\n\r\n<p>Fusion offers a series of new abilities ranging from Menu Icons, Subtext support and much greater controls over the Multiple Column ability for dropdowns.</p>\r\n\r\n<div class="attention"><div class="typo-icon">For more information on RokNavMenu, please go to <a href="http://www.rockettheme.com/extensions-joomla/roknavmenu">http://www.rockettheme.com/extensions-joomla/roknavmenu</a></div></div>\r\n\r\n<h4>Template Configuration</h4>\r\n\r\n<p>You can configure Fusion Menu at <strong>Extensions &rarr; Template Manager &rarr; rt_quantive_j15</strong> and you will find all parameters under the <strong>Menu</strong> heading.</p>\r\n\r\n[readon url="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54"]Gantry Framework : Learn more[/readon]\r\n\r\n<h4>Menu Icons</h4>\r\n\r\n<p>Fusion has support for individual menu icons for its dropdown menu items. These images are loaded from the <strong>/templates/rt_quantive_j15/images/icons/</strong> directory where you will find 21 images by default.</p>\r\n\r\n<p>To setup a Menu Icon, go to <strong>Menu &rarr; Mainmenu &rarr; Select/Create a Menu Item</strong>. Locate the <strong>Menu Image</strong> field in <strong>Parameters (Template theme - gantry-fusion)</strong> and select an image from the dropdown.</p>\r\n\r\n<h4>Subtext</h4>\r\n\r\n<p>Subtext is the term used to describe the secondary text placed underneath the menu title.</p>\r\n\r\n<p>To add your own Subtext, go to <strong>Menu &rarr; Mainmenu &rarr; Select/Create a Menu Item</strong>. Locate the <strong>Subtext</strong> field in <strong>Parameters (Template theme - gantry-fusion)</strong> and insert your desired text. Also add your Subtext to the <strong>Parameters (Template theme - gantry-suckerfish)</strong> field so it appears in IE6.</p>\r\n\r\n<div class="notice"><div class="typo-icon">If you are using SplitMenu, insert your <strong>Subtext</strong> into the <strong>Parameters (Template theme - gantry-splitmenu) section</strong>.</div></div>\r\n\r\n<h4>Multiple Dropdown Columns</h4>\r\n\r\n<p>Fusion has the facility for dynamic column control for its dropdown. You can choose between single (1) or double (2) column modes for children of every single menu item via configuration.</p>\r\n\r\n<p>To control the number of columns of each menu item, go to <strong>Menu &rarr; Mainmenu &rarr; Select/Create a Menu Item</strong>. Locate the <strong>Columns of Children</strong> field in <strong>Parameters (Template theme - gantry-fusion)</strong> and choose either 1 or 2.</p>\r\n\r\n<h4>Dynamic Child Direction</h4>\r\n\r\n<p>Typically, a dropdown menu column will extend beyond the width of the browser window if you have enough child levels. However, with Fusion, the menu detects the width of the browser and will change the direction of menu pullouts so all menu items are visible without the need to scroll.</p>\r\n\r\n<h3>Splitmenu</h3>\r\n\r\n<p>A static menu system that displays submenu items outside of the main horizontal menu and the 2nd level items underneath it in a separate menu bar. Then, the 3rd level menu items are displayed in the Sidebar.</p>\r\n\r\n<h4>Configuration</h4>\r\n\r\n<p>You can determine which positions the 2nd level (submenu) and the 3rd level (sidemenu) menu items load in, using the Gantry administrator. Simply go to <strong>Extensions → Template Manager → rt_quantive_j15 → Menu</strong>. There are 3 options that pertain specifically to Splitmenu, these are <strong>Sub Menu Position</strong>, <strong>Sidebar Menu Position</strong> and <strong>Sidebar Class Sfx</strong>. The former two options control which position the 2nd and 3rd+ level menu items appear in. The latter option decides which module class suffix is used for Splitmenu.</p>\r\n\r\n<h4>Removing / Editing the <em>Menu</em> text</h4>\r\n\r\n<p>If you wish to remove or edit the Menu text that appears in the module title of the Splitmenu side menu, you will need to edit the <strong>/templates/rt_quantive_j15/html/modules.php</strong> file. Find and edit the following:</p>\r\n\r\n<pre style="width: 650px;">\r\n&lt;div class=&quot;module-title&quot;&gt;&lt;h2 class=&quot;title&quot;&gt;&lt;?php echo $menu_title_item-&gt;name.&#x27; &#x27;.JText::_(&#x27;Menu&#x27;); ?&gt;&lt;/h2&gt;&lt;/div&gt;\r\n\r\n</pre>\r\n\r\n<h3><span>How</span> to create Child / Sublevel menu items in Joomla</h3>\r\n\r\n<p>In order for menu dropdowns in Moomenu and Suckerfish, and the dropline / side column items of Splitmenu to appear, you need to setup parent and child menu items.</p>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login into the Joomla administrator</li>\r\n	<li>Go to <strong>Menu &rarr; <em>Menu Name</em></strong></li>\r\n	<li>Select a menu item that you wish to be in the dropdown</li>\r\n	<li>Locate the <strong>Parent Item</strong> form</li>\r\n	<li>Select the menu item that you wish for your item to appear under</li>\r\n	<li>Save</li>\r\n</ul>\r\n\r\n<p>Perform the same task for all menu items that you wish to be child items.</p>', '', 1, 5, 0, 34, '2010-03-23 18:01:44', 62, '', '2010-03-29 15:25:43', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:01:44', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 13, '', '', 0, 120, 'robots=\nauthor='),
(60, 'Logo Editing', 'logo-editing', '', '<div class="note"><div class="typo-icon">The template automatically changes the size of the logo based on what image is present. Therefore, there is no need to manually change the dimensions in the CSS.</div></div>\r\n\r\n<p>The following tutorial outlines how to edit the logo with <strong>Adobe&reg; Fireworks CS4</strong>. Fireworks is required for logo editing. CS3 can be used for image source editing.</p>\r\n\r\n<div class="media"><div class="typo-icon">\r\n  <a href="video/logo.mov" rel="rokbox[540 360]" title="Video Tutorial :: Logo Editing Video Tutorial">\r\n    <img src="images/stories/demo/general/logo-editing-video.jpg" alt="image" class="demo-tut-video-img"/>\r\n  </a>\r\n  \r\n  <h4>Logo Editing Video Tutorial</h4>\r\n  Learn how to customise your Quantive logo using Adobe&reg; Fireworks with this detailed video tutorial.<br />\r\n  \r\n  <p><a href="video/logo.mov" rel="rokbox[540 360]" title="Video Tutorial :: Logo Editing Video Tutorial"><strong>Watch Now!</strong></a></p>\r\n  <div class="clear"></div>\r\n  </div></div>\r\n\r\n<div class="attention"><div class="typo-icon">You will want to install the provided fonts before proceeding to edit in Fireworks, if you wish to use the same font for your logo editing.</div></div>\r\n\r\n<h2>Editing in Adobe&reg; Fireworks CS4</h2>\r\n\r\n<h3><a href="#step1" name="step1">Step 1</a></h3>\r\n\r\n<p>Open the <strong>logo-source.png</strong> file in Adobe&reg; Fireworks.</p>\r\n<a href="images/stories/demo/logo/logo1.jpg" title="Logo Editing Tutorial - Step 1 - Screenshot 1" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo1-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n\r\n<p>Focus on the right column, titled <strong>Layers</strong>. Select the <strong>Web layers</strong> directory and click the eye icon to the left of the logo slice (the green object). This will make the slice invisible so you can edit the file.</p>\r\n\r\n<h3><a href="#step2" name="step2">Step 2</a></h3>\r\n\r\n<p>Double click on the logo text. Now you can edit the text of logo to your choosing.</p>\r\n<a href="images/stories/demo/logo/logo2.jpg" title="Logo Editing Tutorial - Step 2 - Screenshot 1" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo2-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n<span class="demo-sep">&nbsp;</span>\r\n<a href="images/stories/demo/logo/logo3.jpg" title="Logo Editing Tutorial - Step 2 - Screenshot 2" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo3-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n\r\n<p>Next, double click on the slogan logo text. Now you can edit the text of logo to your choosing.</p>\r\n<a href="images/stories/demo/logo/logo4.jpg" title="Logo Editing Tutorial - Step 2 - Screenshot 3" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo4-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n<span class="demo-sep">&nbsp;</span>\r\n<a href="images/stories/demo/logo/logo5.jpg" title="Logo Editing Tutorial - Step 2 - Screenshot 4" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo5-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n\r\n<h3><a href="#step3" name="step3">Step 3</a></h3>\r\n\r\n<p>Reactivate the Slice in the Web Layers column, this will place a green rectangle over the logo image. Change the size of the slice (or move it) to match the new size if applicable.</p>\r\n\r\n<a href="images/stories/demo/logo/logo6.jpg" title="Logo Editing Tutorial - Step 3 - Screenshot 1" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo6-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n<span class="demo-sep">&nbsp;</span>\r\n<a href="images/stories/demo/logo/logo7.jpg" title="Logo Editing Tutorial - Step 3 - Screenshot 2" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo7-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n\r\n<h3><a href="#step4" name="step4">Step 4</a></h3>\r\n<p>Now you will want to export the logo. Right click on the image slice and select <strong>Exported Selected Slices...</strong> from the contextual menu. Proceed to export it to your computer for uploading.</p>\r\n<a href="images/stories/demo/logo/logo8.jpg" title="Logo Editing Tutorial - Step 4 - Screenshot 1" rel="rokbox(logo)"><img src="images/stories/demo/logo/logo8-thumb.jpg" alt="Logo" class="rt-image" /></a>\r\n\r\n<h3><a href="#step5" name="step5">Step 5</a></h3>\r\n<p>If you are new to Fireworks, you may be wondering why it appears that there is only one style variation in the source. This is not the case as we take advantage of the Frame features of Fireworks. You need to simply switch frames to see all the other style variation sources.</p>\r\n\r\n<p>There are a few ways to change frames and we will show 2 methods that you can use.</p>\r\n\r\n<p>In the right column where you find the Layers toolbar including the Web Layers area, you should see another tab/toolbar named Frames. Just left click on the title <b>Frames</b> to enter the frames area. Then you can click on either of the frames which are named to show which style variant is on that particular frame.</p>\r\n<img src="images/stories/demo/logo/logo-frame1.jpg" alt="Logo" class="rt-image" />\r\n\r\n<p>The second method is the easiest and simplest. At the bottom of the Fireworks canvas is a row of buttons and arrows. Select the arrows to switch between frames.</p>\r\n<img src="images/stories/demo/logo/logo-frame2.jpg" alt="Logo" class="rt-image" />\r\n\r\n<h2>Uploading the changed files</h2>\r\n\r\n<h3><a href="#step1" name="step1">Step 1</a></h3>\r\n<p>Once you have successfully edited then exported your new logo, you will need to upload it to your server. This process is best done via a FTP client such as <a href="http://filezilla.sourceforge.net/">Filezilla</a></p>\r\n\r\n<ol>\r\n  <li>Open your FTP client on your local computer.</li>\r\n  <li>Login to your web server where <strong>Quantive</strong> is installed.</li>\r\n  <li>Navigate to the /templates/rt_quantive_j15/images/logo/ directory.</li>\r\n  <li>Upload <strong>logo.png</strong> (and any other logo related images) to this directory (You may need to browse on the local panel in the FTP client to find where you have exported your logo).</li>\r\n  <li>Clear your browser cache before viewing such as using the keyboard commands on Windows, <strong>Ctrl+F5</strong>.</li>\r\n</ol>\r\n\r\n<div class="attention"><div class="typo-icon">Ensure that you are uploading the correct logo to avoid confusion if it does not change. Also take into account hosting permissions. Sometimes, hosts which are not designed for Joomla may have permissions not suited for the setup, thus, the upload will not be complete. In this case, contact your hosting provider.</div></div>', '', 1, 5, 0, 34, '2010-03-23 18:01:55', 62, '', '2010-03-30 20:53:02', 63, 0, '0000-00-00 00:00:00', '2010-03-23 18:01:55', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 14, '', '', 0, 28, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(61, 'Using Typography', 'using-typography', '', '<div class="media"><div class="typo-icon">\r\n  <strong>Video Tutorial Currently Available!</strong>\r\n  <a href="http://www.rockettheme.com/video/joomla15/using-typography-joomla15.mov" title="Video Tutorials :: Using Typography" rel="rokbox[540 380]">Launch the Joomla Using Typography Video Tutorial now!</a></div></div>\r\n\r\n<p>Every RocketTheme template is accompanied by custom content styles known as Typography. This guide outlines how to use Typography in your content.</p>\r\n\r\n<h3><span>Typography</span> - RokCandy Mode</h3>\r\n\r\n<p>All the typography in the template is using RokCandy syntax which is outlined at the <a href="index.php?option=com_content&amp;view=article&amp;id=53&amp;Itemid=60">RokCandy Examples</a> page. In this guide, we will use the Attention Span Style, which uses the <strong>&#91;div class="attention" class2="typo-icon"&#93;...&#91;/div&#93;</strong> syntax.</p>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login to the Joomla administrator</li>\r\n	<li>Go to <strong>Content &rarr; Article Manager</strong>; or, if you wish to use the syntax in custom modules, Go to <strong>Extensions &rarr; Module Manager</strong></li>\r\n	<li>Choose the Article, or Custom Module</li>\r\n	<li>Insert <strong>&#91;div class="attention" class2="typo-icon"&#93;</strong> <em>.... some content ....</em> <strong>&#91;/div&#93;</strong></li>\r\n	<li>Save</li>\r\n</ul>\r\n\r\n<p>As RokCandy is not affected by the stripping functions of the WYSIWYG editor, you can insert the RokCandy snippets without any issue. If you are in HTML mode, the snippets will still function.</p>\r\n\r\n<h3><span>Typography</span> - HTML Mode</h3>\r\n\r\n<p>Every RokCandy typographical element can be used in its HTML form as outlined at the <a href="index.php?option=com_content&amp;view=article&amp;id=52&amp;Itemid=59">HTML Examples</a> page. HTML typography allows for more custom control in the article but requires an additional step. In this guide, we will use the Attention Span Style, which uses the <strong>&lt;div class=&quot;attention&quot;&gt;&lt;div class=&quot;typo-icon&quot;&gt;...&lt;/div&gt;&lt;/div&gt;</strong> syntax.</p>\r\n\r\n<h4>Content Editor</h4>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login to the Joomla administrator</li>\r\n	<li>Go to <strong>Content &rarr; Article Manager</strong>; or, if you wish to use the syntax in custom modules, Go to <strong>Extensions &rarr; Module Manager</strong></li>\r\n	<li>Choose the Article, or Custom Module</li>\r\n	<li>Click the <strong>HTML mode</strong> or equivalent in your editor</li>\r\n	<li>Insert <strong>&lt;div class=&quot;attention&quot;&gt;&lt;div class=&quot;typo-icon&quot;&gt; ... some content ... &lt;/div&gt;&lt;/div&gt;</strong></li>\r\n	<li>Save</li>\r\n</ul>\r\n\r\n<div class="notice"><div class="typo-icon">If you are using the TinyMCE editor, go to <strong>Extensions &rarr; Plugin Manager</strong> and select <strong>TinyMCE 2.0</strong>. Locate <strong>Code Clean-up on Save</strong> and select <strong>Never</strong>.<br /><br />This prevents the stripping of HTML code from your content.</div></div>\r\n\r\n<h4>No Editor</h4>\r\n\r\n<ul class="bullet-2">\r\n	<li>Login to the Joomla administrator</li>\r\n	<li>Go to <strong>Content &rarr; Article Manager</strong>; or, if you wish to use the syntax in custom modules, Go to <strong>Extensions &rarr; Module Manager</strong></li>\r\n	<li>Choose the Article, or Custom Module</li>\r\n	<li>Insert <strong>&lt;div class=&quot;attention&quot;&gt;&lt;div class=&quot;typo-icon&quot;&gt; ... some content ... &lt;/div&gt;&lt;/div&gt;</strong></li>\r\n	<li>Save</li>\r\n</ul>\r\n\r\n<p>Note, with the Content Editor (WYSIWYG) enabled, you need to enter HTML mode otherwise the typography will not work. If you are running no editor, this is not the case as you are interacting with the content at a code level.</p>', '', 1, 5, 0, 34, '2010-03-23 18:02:06', 62, '', '2010-03-27 19:41:32', 62, 0, '0000-00-00 00:00:00', '2010-03-23 18:02:06', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 15, '', '', 0, 31, 'robots=\nauthor='),
(62, 'Preset Styles', 'preset-styles', '', '<p>Quantive has 10 preset styles / style variations with each having 3 different detail levels: <strong>High</strong>, <strong>Medium</strong> &amp; <strong>Low</strong>. You can edit the combinations in your template as outlined on the <a href="index.php?option=com_content&amp;view=article&amp;id=58&amp;Itemid=65">Style Control</a> page.</p>\r\n\r\n[readon url="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54"]Gantry Framework : Learn more[/readon]\r\n\r\n<div class="notice"><div class="typo-icon">View all styles live by appending <strong>?presets=preset#</strong> or <strong>&amp;presets=preset#</strong> to the end of your URL such as <strong><a href="#">http://yoursite.com/index.php?presets=preset4</a></strong>.</div></div>\r\n\r\n<p>Below is a preview / screenshot of each style variation, in sequential order, <strong>Preset 1 - Preset 10</strong>. Please click on on the image to load a live example of each style variation.</p>\r\n\r\n<div class="demo-sv-title"><h2>High</h2></div>\r\n<div class="demo-sv-title"><h2>Medium</h2></div>\r\n<div class="demo-sv-title"><h2>Low</h2></div>\r\n\r\n<div class="clear"></div>\r\n\r\n<div class="demo-img">\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset1&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset1" src="images/stories/demo/styles/ss1-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset1&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset1" src="images/stories/demo/styles/ss1-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset1&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset1" src="images/stories/demo/styles/ss1-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  \r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset2&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset2" src="images/stories/demo/styles/ss2-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset2&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset2" src="images/stories/demo/styles/ss2-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset2&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset2" src="images/stories/demo/styles/ss2-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  \r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset3&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset3" src="images/stories/demo/styles/ss3-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset3&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset3" src="images/stories/demo/styles/ss3-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset3&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset3" src="images/stories/demo/styles/ss3-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  \r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset4&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset4" src="images/stories/demo/styles/ss4-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset4&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset4" src="images/stories/demo/styles/ss4-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset4&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset4" src="images/stories/demo/styles/ss4-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  \r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset5&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset5" src="images/stories/demo/styles/ss5-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset5&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset5" src="images/stories/demo/styles/ss5-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset5&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset5" src="images/stories/demo/styles/ss5-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  \r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset6&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset6" src="images/stories/demo/styles/ss6-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset6&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset6" src="images/stories/demo/styles/ss6-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset6&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset6" src="images/stories/demo/styles/ss6-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset7&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset7" src="images/stories/demo/styles/ss7-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset7&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset7" src="images/stories/demo/styles/ss7-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset7&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset7" src="images/stories/demo/styles/ss7-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset8&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset8" src="images/stories/demo/styles/ss8-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset8&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset8" src="images/stories/demo/styles/ss8-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset8&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset8" src="images/stories/demo/styles/ss8-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset9&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset9" src="images/stories/demo/styles/ss9-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset9&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset9" src="images/stories/demo/styles/ss9-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset9&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset9" src="images/stories/demo/styles/ss9-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset10&amp;backgroundlevel=high&amp;bodylevel=high">\r\n    <img alt="Preset10" src="images/stories/demo/styles/ss10-high.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset10&amp;backgroundlevel=med&amp;bodylevel=med">\r\n    <img alt="Preset10" src="images/stories/demo/styles/ss10-med.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n  <a href="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69&amp;presets=preset10&amp;backgroundlevel=low&amp;bodylevel=low">\r\n    <img alt="Preset10" src="images/stories/demo/styles/ss10-low.jpg" class="demo-sv-img rt-image"/>\r\n  </a>\r\n</div>\r\n\r\n<div class="clear"></div>', '', 1, 5, 0, 34, '2010-03-23 18:02:17', 62, '', '2010-03-30 18:37:10', 63, 0, '0000-00-00 00:00:00', '2010-03-23 18:02:17', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 16, '', '', 0, 502, 'robots=\nauthor='),
(63, 'Child Item', 'child-item', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dapibus, tellus ac ornare aliquam, massa diam tristique urna, id faucibus lectus erat ut pede. Maecenas varius neque nec libero laoreet faucibus. Phasellus sodales, lectus sed vulputate rutrum, ipsum nulla lacinia magna, sed imperdiet ligula nisi eu ipsum. Donec nunc magna, posuere eget, aliquam in, vulputate in, lacus. Sed venenatis. Donec nec dolor vitae mauris dapibus ullamcorper. Etiam iaculis mollis tortor.</p>\r\n\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', '', 1, 5, 0, 34, '2010-03-23 21:10:21', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2010-03-23 21:10:21', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 17, '', '', 0, 164, 'robots=\nauthor='),
(65, 'Menu Theme', 'menu-theme', '', '<div class="demo-tab1">\r\n<img src="images/blank.png" class="floatright" alt="Feature Tab Image" />\r\n<div class="module-title" style="float: none;"><h2 class="title">Fusion Menu</h2></div><br />\r\n<p>The <strong>Fusion Menu</strong> is a CSS driven <strong>dropdown</strong> menu, enriched by the <strong>Mootools</strong> javascript library.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66"]Learn More[/readon2]\r\n</div>', '', 1, 7, 0, 38, '2010-03-24 18:34:48', 62, '', '2010-03-30 04:08:10', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 18, 0, 1, '', '', 0, 0, 'robots=\nauthor='),
(66, 'Utilise the plethora of Gantry configuration options', 'utilise-the-plethora-of-gantry-configuration-options', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dapibus, tellus ac ornare aliquam, massa diam tristique urna, id faucibus lectus erat ut pede. Maecenas varius neque nec libero laoreet faucibus. Phasellus sodales, lectus sed vulputate rutrum, ipsum nulla lacinia magna, sed imperdiet ligula nisi eu ipsum. Donec nunc magna, posuere eget, aliquam in, vulputate in, lacus. Sed venenatis. Donec nec dolor vitae mauris dapibus ullamcorper. Etiam iaculis mollis tortor.</p>\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>', 1, 8, 0, 39, '2010-01-05 00:00:00', 62, '', '2010-03-29 20:51:12', 62, 0, '0000-00-00 00:00:00', '2010-01-05 00:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
(67, 'Combine multiple module suffixes together', 'combine-multiple-module-suffixes-together', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dapibus, tellus ac ornare aliquam, massa diam tristique urna, id faucibus lectus erat ut pede. Maecenas varius neque nec libero laoreet faucibus. Phasellus sodales, lectus sed vulputate rutrum, ipsum nulla lacinia magna, sed imperdiet ligula nisi eu ipsum. Donec nunc magna, posuere eget, aliquam in, vulputate in, lacus. Sed venenatis. Donec nec dolor vitae mauris dapibus ullamcorper. Etiam iaculis mollis tortor.</p>\r\n\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>', '', 1, 8, 0, 39, '2010-02-19 00:00:00', 62, '', '2010-03-29 20:50:14', 62, 0, '0000-00-00 00:00:00', '2010-02-19 00:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 2, '', '', 0, 7, 'robots=\nauthor='),
(68, 'Easily alternative between light and dark variants', 'easily-alternative-between-light-and-dark-variants', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam dapibus, tellus ac ornare aliquam, massa diam tristique urna, id faucibus lectus erat ut pede. Maecenas varius neque nec libero laoreet faucibus. Phasellus sodales, lectus sed vulputate rutrum, ipsum nulla lacinia magna, sed imperdiet ligula nisi eu ipsum. Donec nunc magna, posuere eget, aliquam in, vulputate in, lacus. Sed venenatis. Donec nec dolor vitae mauris dapibus ullamcorper. Etiam iaculis mollis tortor.</p>\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>', 1, 8, 0, 39, '2010-03-29 00:00:00', 62, '', '2010-03-29 20:48:20', 62, 0, '0000-00-00 00:00:00', '2010-03-23 00:00:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 1, '', '', 0, 5, 'robots=\nauthor='),
(69, 'RokStories', 'rokstories', '', '<img src="images/stories/demo/frontpage/sidebar-1.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokStories</em><br />\r\n<a class="demo-extra-a" href="#">Available Now</a>\r\n<p>Extension to rotate content: text, images or both.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:39:10', 62, '', '2010-03-30 13:54:02', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:39:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 1, '', '', 0, 16, 'robots=\nauthor='),
(70, 'RokTabs', 'roktabs', '', '<img src="images/stories/demo/frontpage/sidebar-2.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokTabs</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>Tabbed content extension with many features.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:45:35', 62, '', '2010-03-30 13:54:10', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:45:35', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 2, '', '', 0, 11, 'robots=\nauthor='),
(71, 'More To Explore', 'more-to-explore', '', '{rokstyle}.bodystyle-dark .demo-tab1 img {background: url(images/stories/demo/frontpage/feature-tab-dark.jpg) no-repeat;}\r\n.bodystyle-light .demo-tab1 img {background: url(images/stories/demo/frontpage/feature-tab-light.jpg) no-repeat;}\r\n.bodystyle-dark .demo-ft-a img {background: url(images/stories/demo/frontpage/feature-a-dark.jpg) no-repeat;}\r\n.bodystyle-light .demo-ft-a img {background: url(images/stories/demo/frontpage/feature-a-light.jpg) no-repeat;}\r\n.bodystyle-dark .image-full img[src$="blank1.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories1-dark.jpg) no-repeat;}\r\n.bodystyle-light .image-full img[src$="blank1.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories1.jpg) no-repeat;}\r\n.bodystyle-dark .image-full img[src$="blank2.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories2-dark.jpg) no-repeat;}\r\n.bodystyle-light .image-full img[src$="blank2.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories2.jpg) no-repeat;}\r\n.bodystyle-dark .image-full img[src$="blank3.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories3-dark.jpg) no-repeat;}\r\n.bodystyle-light .image-full img[src$="blank3.png"] {background: url(images/stories/demo/frontpage/rokstories/rokstories3.jpg) no-repeat;}\r\n.bodystyle-light .demo-fp-main1 img {background: url(images/stories/demo/frontpage/main-1-light.jpg) no-repeat;}\r\n.bodystyle-light .demo-fp-main2 img {background: url(images/stories/demo/frontpage/main-2-light.jpg) no-repeat;}\r\n.bodystyle-light .demo-fp-main3 img {background: url(images/stories/demo/frontpage/main-3-light.jpg) no-repeat;}\r\n.bodystyle-light .demo-fp-main4 img {background: url(images/stories/demo/frontpage/main-4-light.jpg) no-repeat;}\r\n.bodystyle-light .demo-fp-main5 img {background: url(images/stories/demo/frontpage/main-5-light.jpg) no-repeat;}\r\n.bodystyle-dark .demo-fp-main1 img {background: url(images/stories/demo/frontpage/main-1-dark.jpg) no-repeat;}\r\n.bodystyle-dark .demo-fp-main2 img {background: url(images/stories/demo/frontpage/main-2-dark.jpg) no-repeat;}\r\n.bodystyle-dark .demo-fp-main3 img {background: url(images/stories/demo/frontpage/main-3-dark.jpg) no-repeat;}\r\n.bodystyle-dark .demo-fp-main4 img {background: url(images/stories/demo/frontpage/main-4-dark.jpg) no-repeat;}\r\n.bodystyle-dark .demo-fp-main5 img {background: url(images/stories/demo/frontpage/main-5-dark.jpg) no-repeat;}\r\n{/rokstyle}\r\n<p>Listed below are some of the core features of the <strong>Quantive</strong> template:</p>\r\n<div class="demo-fp-main">\r\n	<div class="demo-fp-main1">\r\n	<img src="images/blank.png" class="png floatleft" alt="Frontpage Image" />\r\n	<em class="bold">Full Template / Gantry RTL Support</em><br />\r\n	Native Right-To-Left (RTL) Support for both Gantry and independent template elements such as module styling.<br />\r\n	<a href="images/stories/demo/general/rtl-preview-full.jpg" class="readon" rel="rokbox[715 1261]" title="RTL Preview :: Preview of the Demo Frontpage in RTL mode"><span>Preview RTL</span></a>\r\n	<div class="module-title">&nbsp;</div></div>\r\n\r\n	<div class="demo-fp-main2">\r\n	<img src="images/blank.png" class="png floatleft" alt="Frontpage Image" />\r\n	<em class="bold">Individual Module Styling</em><br />\r\n	Thirteen Module Variations, ranging from shaded styles to structural variants, allowing for individual module control.<br />\r\n	[readon2 url="index.php?option=com_content&amp;view=article&amp;id=49&amp;Itemid=56"]Learn More[/readon2]\r\n	<div class="module-title">&nbsp;</div></div>\r\n\r\n	<div class="demo-fp-main3">\r\n	<img src="images/blank.png" class="png floatleft" alt="Frontpage Image" />\r\n	<em class="bold">Numerous Layout Configurations</em><br />\r\n	The template has 68 collapsible positions, allowing for a multitude of many different layout options.<br />\r\n	[readon2 url="index.php?option=com_content&amp;view=article&amp;id=50&amp;Itemid=57"]Learn More[/readon2]\r\n	<div class="module-title">&nbsp;</div></div>\r\n\r\n	<div class="demo-fp-main4">\r\n	<img src="images/blank.png" class="png floatleft" alt="Frontpage Image" />\r\n	<em class="bold">Styled RocketTheme Extensions</em><br />\r\n	A series of RocketTheme modules have been styled, perfect for using them with the Quantive theme.<br />\r\n	[readon2 url="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61"]Learn More[/readon2]\r\n	<div class="module-title">&nbsp;</div></div>\r\n\r\n	<div class="demo-fp-main5">\r\n	<img src="images/blank.png" class="png floatleft" alt="Frontpage Image" />\r\n	<em class="bold">PNG Image Sources</em><br />\r\n	We provide Adobe&reg; Fireworks PNG image sources with every template, allowing for quick customization.<br />\r\n	[readon2 url="index.php?option=com_content&amp;view=article&amp;id=60&amp;Itemid=67"]Learn More[/readon2]\r\n	<div class="module-title">&nbsp;</div></div>\r\n\r\n	[readon2 url="index.php?option=com_content&amp;view=article&amp;id=46&amp;Itemid=53"]View More Features[/readon2]\r\n</div>', '', 1, 5, 0, 34, '2010-03-25 14:51:49', 62, '', '2010-03-30 17:48:56', 62, 0, '0000-00-00 00:00:00', '2010-03-25 14:51:49', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 29, 0, 18, '', '', 0, 1, 'robots=\nauthor='),
(72, 'Layout Options', 'layout-options', '', '<div class="module-title" style="float: none;"><h2 class="title">Complex &amp; Diverse Construction</h2></div><br />\r\n<p>With <strong>68</strong> module positions and the Gantry <strong>layout interface</strong>, the template allows you construct diverse and complex layouts with complete ease.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=50&amp;Itemid=57"]Learn More[/readon2]', '', 1, 7, 0, 38, '2010-03-24 18:34:48', 62, '', '2010-03-28 17:29:31', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 2, '', '', 0, 0, 'robots=\nauthor='),
(73, 'Browser Compatibility', 'browser-compatibility', '', '<div class="module-title" style="float: none;"><h2 class="title">Limited IE6 Template Support</h2></div><br />\r\n<p>Restricted support: <strong>LTR (Left-To-Right)</strong> only, <strong>low</strong> background/body levels only and <strong>Fusion</strong> menu is degraded to <strong>Suckerfish</strong>, amongst other limitations.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=46&amp;Itemid=53"]Learn More[/readon2]', '', 1, 7, 0, 38, '2010-03-24 18:34:48', 62, '', '2010-03-28 17:30:51', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 3, '', '', 0, 0, 'robots=\nauthor='),
(74, 'RokStories Article One', 'rokstories-article-one', '', '<p><img src="images/stories/demo/frontpage/rokstories/blank1.png" alt="image"/></p>\r\n\r\n<span class="feature-title">the next generation of <span>digital design</span></span>\r\n<br />\r\n<p>\r\n<strong>Quantive, the April 2010 Template Club release</strong>, encapsulates the notion of <em>simply complex</em>, featuring a more subtle and conservative design, in contrast to other 2010 releases. Naturally, the Gantry Framework forms the core of the theme, driving the complex mechanisms and features that lie beneath.\r\n</p>\r\n\r\n', '\r\n\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 6, 0, 37, '2010-03-24 18:07:15', 62, '', '2010-03-29 14:40:56', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:07:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 1, '', '', 0, 16, 'robots=\nauthor='),
(75, 'RokStories Article Three', 'rokstories-article-three', '', '<p><img src="images/stories/demo/frontpage/rokstories/blank3.png" alt="image"/></p>\r\n\r\n<span class="feature-title">powered by the <span>gantry framework</span></span>\r\n<br />\r\n<p>\r\n<strong>The Gantry Framework is the defacto core of our recent themes</strong>, which provides an unparalleled foundation of functionality in the joomlaverse. It dramatically extends the core templating / extensions ability of Joomla to produce true versatility and flexibility, for both developers and normal users alike.\r\n</p>\r\n\r\n', '\r\n\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 6, 0, 37, '2010-03-24 18:07:15', 62, '', '2010-03-29 14:42:20', 62, 0, '0000-00-00 00:00:00', '2010-03-24 18:07:15', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 3, '', '', 0, 5, 'robots=\nauthor='),
(77, 'Featured Article Headline', 'featured-article-headline', '', '<img src="modules/mod_rokstories/images/sample//rokstories3.jpg" alt="image" />\r\n\r\n<p>Integer consequat iaculis sollicitudin. Donec faucibus urna mattis ipsum egestas ullamcorper. Nam semper lacinia blandit. Integer aliquet quam sit amet nibh posuere pharetra. Fusce fermentum, neque ut tincidunt suscipit, tortor mauris placerat augue, at ultricies tortor ante id est.</p>', '', 1, 6, 0, 41, '2009-06-11 06:09:41', 62, '', '2010-03-29 21:03:14', 62, 0, '0000-00-00 00:00:00', '2009-06-11 06:09:41', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 3, '', '', 0, 4, 'robots=\nauthor='),
(78, 'Another Featured Article', 'another-featured-article', '', '<img src="modules/mod_rokstories/images/sample/rokstories2.jpg" alt="image" />\r\n\r\n<p>Phasellus sit amet odio eros. Ut sagittis metus volutpat eros bibendum accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In scelerisque aliquam tincidunt. Duis quis dui ac augue hendrerit elementum. Phasellus risus mauris, volutpat eget molestie vel, rhoncus eu lorem. Morbi a nisi quam.</p>', '', 1, 6, 0, 41, '2009-06-11 06:11:38', 62, '', '2010-03-29 21:03:04', 62, 0, '0000-00-00 00:00:00', '2009-06-11 06:11:38', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 2, '', '', 0, 4, 'robots=\nauthor='),
(79, 'Important Featured Story', 'important-featured-story', '', '<img src="modules/mod_rokstories/images/sample/rokstories1.jpg" alt="image" />\r\n\r\n<p>Phasellus sit amet odio eros. Ut sagittis metus volutpat eros bibendum accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In scelerisque aliquam tincidunt. Duis quis dui ac augue hendrerit elementum. Phasellus risus mauris, volutpat eget molestie vel, rhoncus eu lorem. Morbi a nisi quam.</p>', '', 1, 6, 0, 41, '2009-06-11 06:12:23', 62, '', '2010-03-29 21:02:56', 62, 0, '0000-00-00 00:00:00', '2009-06-11 06:12:23', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 1, '', '', 0, 4, 'robots=\nauthor=');
INSERT INTO `#__content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(88, 'RokPad', 'rokpad', '', '<img src="images/stories/demo/frontpage/sidebar-6.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokPad</em><br />\r\n<a class="demo-extra-a" href="#">Available Now</a>\r\n<p>Impressive code / text editor, perfect for Developers.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:39:10', 62, '', '2010-03-30 17:19:11', 62, 0, '0000-00-00 00:00:00', '2010-03-25 14:39:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 6, '', '', 0, 4, 'robots=\nauthor='),
(81, 'Example Tab Four', 'example-tab-four', '', '<img src="images/stories/demo/general/tabs2.jpg" alt="Tabs" class="rt-image floatleft" />\r\n<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing </strong>elit. Vestibulum at sem ut <em>ipsum vestibulum</em> euismod. Mauris et massa <strong>porta leo facilisis</strong> feugiat. Suspendisse id neque a <a href="#">sem facilisis</a> blandit.</p>\r\n[readon url="#"]Learn More[/readon]', '', 1, 7, 0, 42, '2010-03-24 18:34:48', 62, '', '2010-03-30 14:01:14', 63, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 4, '', '', 0, 0, 'robots=\nauthor='),
(82, 'Example Tab Three', 'example-tab-three', '', '<img src="images/stories/demo/general/tabs1.jpg" alt="Tabs" class="rt-image floatleft" />\r\n<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing </strong>elit. Vestibulum at sem ut <em>ipsum vestibulum</em> euismod. Mauris et massa <strong>porta leo facilisis</strong> feugiat. Suspendisse id neque a <a href="#">sem facilisis</a> blandit.</p>\r\n[readon url="#"]Learn More[/readon]', '', 1, 7, 0, 42, '2010-03-24 18:34:48', 62, '', '2010-03-30 14:01:06', 63, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 21, 0, 3, '', '', 0, 0, 'robots=\nauthor='),
(84, 'Example Tab One', 'example-tab-one', '', '<img src="images/stories/demo/general/tabs1.jpg" alt="Tabs" class="rt-image floatleft" />\r\n<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing </strong>elit. Vestibulum at sem ut <em>ipsum vestibulum</em> euismod. Mauris et massa <strong>porta leo facilisis</strong> feugiat. Suspendisse id neque a <a href="#">sem facilisis</a> blandit.</p>\r\n[readon url="#"]Learn More[/readon]', '', 1, 7, 0, 42, '2010-03-24 18:34:48', 62, '', '2010-03-30 14:00:53', 63, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 1, '', '', 0, 0, 'robots=\nauthor='),
(85, 'Example Tab Two', 'example-tab-two', '', '<img src="images/stories/demo/general/tabs2.jpg" alt="Tabs" class="rt-image floatleft" />\r\n<p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing </strong>elit. Vestibulum at sem ut <em>ipsum vestibulum</em> euismod. Mauris et massa <strong>porta leo facilisis</strong> feugiat. Suspendisse id neque a <a href="#">sem facilisis</a> blandit.</p>\r\n[readon url="#"]Learn More[/readon]', '', 1, 7, 0, 42, '2010-03-24 18:34:48', 62, '', '2010-03-30 14:01:00', 63, 0, '0000-00-00 00:00:00', '2010-03-24 18:34:48', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 2, '', '', 0, 0, 'robots=\nauthor='),
(86, 'RokBox', 'rokbox', '', '<img src="images/stories/demo/frontpage/sidebar-3.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokBox</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>Popup plugin for images, videos and even HTML.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:39:10', 62, '', '2010-03-30 13:54:22', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:39:10', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=1\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 3, '', '', 0, 2, 'robots=\nauthor='),
(87, 'RokCandy', 'rokcandy', '', '<img src="images/stories/demo/frontpage/sidebar-4.jpg" class="floatleft" alt="Image"/>\r\n<em class="bold">RokCandy</em><br />\r\n<a href="#" class="demo-extra-a">Available Now</a>\r\n<p>Plugin to provide custom content syntax.</p>\r\n\r\n', '\r\n<p>In erat. Pellentesque erat. Mauris vehicula vestibulum justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla pulvinar est. Integer urna. Pellentesque pulvinar dui a magna. Nulla facilisi. Proin imperdiet. Aliquam ornare, metus vitae gravida dignissim, nisi nisl ultricies felis, ac tristique enim pede eget elit. Integer non erat nec turpis sollicitudin malesuada. Vestibulum dapibus. Nulla facilisi. Nulla iaculis, leo sit amet mollis luctus, sapien eros consectetur dolor, eu faucibus elit nibh eu nibh. Maecenas lacus pede, lobortis non, rhoncus id, tristique a, mi. Cras auctor libero vitae sem vestibulum euismod. Nunc fermentum.</p>\r\n\r\n<p>Mauris lobortis. Aliquam lacinia purus. Pellentesque magna. Mauris euismod metus nec tortor. Phasellus elementum, quam a euismod imperdiet, ligula felis faucibus enim, eu malesuada nunc felis sed turpis. Morbi convallis luctus tortor. Integer bibendum lacinia velit. Suspendisse mi lorem, porttitor ut, interdum et, lobortis a, lectus. Phasellus vitae est at massa luctus iaculis. In tincidunt.</p>\r\n\r\n<p>Integer fermentum elit in tellus. Integer ligula ipsum, gravida aliquet, fringilla non, interdum eget, ipsum. Praesent id dolor non erat viverra volutpat. Fusce tellus libero, luctus adipiscing, tincidunt vel, egestas vitae, eros. Vestibulum mollis, est id rhoncus volutpat, dolor velit tincidunt neque, vitae pellentesque ante sem eu nisl. Donec facilisis, magna eget elementum pellentesque, augue arcu aliquet eros, eget convallis mauris ante quis magna. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean et libero. Nam aliquam. Quisque vitae tortor id neque dignissim laoreet. Duis eu ante. Integer at sapien. Praesent sed nisl tempor est pulvinar tristique. Maecenas non lorem quis mi laoreet adipiscing. Sed ac arcu. Sed tincidunt libero eu dolor. Cras pharetra posuere eros. Donec ac eros id diam tempor faucibus. Fusce feugiat consequat nulla. Vestibulum tincidunt vulputate ipsum.</p>\r\n\r\n<p>Nullam eget neque. Nullam imperdiet venenatis ligula. Integer a leo. Nunc consectetur. Maecenas sem. Proin vulputate, massa vel volutpat laoreet, purus erat pretium ligula, eget varius arcu nibh sed libero. Fusce ante. Nullam interdum aliquet metus. Ut ultrices vestibulum tellus. Praesent quis erat. Nam id turpis sit amet neque cursus luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque id tortor. In vitae sapien. Nunc quis tellus.</p>', 1, 8, 0, 40, '2010-03-25 14:45:35', 62, '', '2010-03-30 13:54:30', 63, 0, '0000-00-00 00:00:00', '2010-03-25 14:45:35', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=1\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 4, '', '', 0, 3, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Table structure for table `#__content_frontpage`
--

DROP TABLE IF EXISTS `#__content_frontpage`;
CREATE TABLE IF NOT EXISTS `#__content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
);

--
-- Dumping data for table `#__content_frontpage`
--

INSERT INTO `#__content_frontpage` (`content_id`, `ordering`) VALUES
(71, 1);

-- --------------------------------------------------------

--
-- Table structure for table `#__content_rating`
--

DROP TABLE IF EXISTS `#__content_rating`;
CREATE TABLE IF NOT EXISTS `#__content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
);

--
-- Dumping data for table `#__content_rating`
--

INSERT INTO `#__content_rating` (`content_id`, `rating_sum`, `rating_count`, `lastip`) VALUES
(69, 3, 1, '127.0.0.1'),
(70, 4, 1, '127.0.0.1'),
(87, 2, 1, '83.100.225.23'),
(86, 1, 1, '83.100.225.23'),
(88, 4, 1, '83.100.225.23'),
(90, 3, 1, '83.100.225.23'),
(91, 1, 1, '83.100.225.23'),
(89, 3, 1, '83.100.225.23');


-- --------------------------------------------------------

--
-- Table structure for table `#__groups`
--

DROP TABLE IF EXISTS `#__groups`;
CREATE TABLE IF NOT EXISTS `#__groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
);

--
-- Dumping data for table `#__groups`
--

INSERT INTO `#__groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Table structure for table `#__menu`
--

DROP TABLE IF EXISTS `#__menu`;
CREATE TABLE IF NOT EXISTS `#__menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
);

--
-- Dumping data for table `#__menu`
--

INSERT INTO `#__menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Home', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=0\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=0\nshow_vote=0\nshow_icons=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=1\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=Quantive - April 2010 Template Demo\nshow_page_title=0\npageclass_sfx=demo-home\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(153, 'mainmenu', 'Section Layout', 'section-layout', 'index.php?option=com_content&view=section&layout=blog&id=1', 'component', -2, 0, 20, 1, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=The News\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(151, 'mainmenu', 'Preset 11', 'preset-11', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset11&backgroundlevel=high&bodylevel=high', 'url', -2, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(152, 'mainmenu', 'Preset 12', 'preset-12', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset12&backgroundlevel=high&bodylevel=high', 'url', -2, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(11, 'othermenu', 'Joomla! Home', 'joomla-home', 'http://www.joomla.org', 'url', 1, 0, 0, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(12, 'othermenu', 'Joomla! Forums', 'joomla-forums', 'http://forum.joomla.org', 'url', 1, 0, 0, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(13, 'othermenu', 'Joomla! Documentation', 'joomla-documentation', 'http://docs.joomla.org', 'url', 1, 0, 0, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(14, 'othermenu', 'Joomla! Community', 'joomla-community', 'http://community.joomla.org', 'url', 1, 0, 0, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(15, 'othermenu', 'Joomla! Magazine', 'joomla-community-magazine', 'http://community.joomla.org/magazine.html', 'url', 1, 0, 0, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(16, 'othermenu', 'OSM Home', 'osm-home', 'http://www.opensourcematters.org', 'url', 1, 0, 0, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 6, 'menu_image=-1\n\n', 0, 0, 0),
(17, 'othermenu', 'Administrator', 'administrator', 'administrator/', 'url', 1, 0, 0, 0, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'menu_image=-1\n\n', 0, 0, 0),
(18, 'topmenu', 'News', 'news', 'index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1', 'component', 1, 0, 11, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n', 0, 0, 0),
(20, 'usermenu', 'Your Details', 'your-details', 'index.php?option=com_user&view=user&task=edit', 'component', 1, 0, 14, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(24, 'usermenu', 'Logout', 'logout', 'index.php?option=com_user&view=login', 'component', 1, 0, 14, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 1, 3, '', 0, 0, 0),
(38, 'keyconcepts', 'Content Layouts', 'content-layouts', 'index.php?option=com_content&view=article&id=24', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(27, 'mainmenu', 'J! Stuff', 'j-stuff', 'index.php?option=com_content&view=article&id=19', 'component', 1, 0, 20, 0, 12, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=0\nshow_title=\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(28, 'topmenu', 'About Joomla!', 'about-joomla', 'index.php?option=com_content&view=article&id=25', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(29, 'topmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=22', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(30, 'topmenu', 'The Community', 'the-community', 'index.php?option=com_content&view=article&id=27', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(149, 'mainmenu', 'Preset 9', 'preset-9', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset9&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(150, 'mainmenu', 'Preset 10', 'preset-10', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset10&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 10, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(40, 'keyconcepts', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=26', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(43, 'keyconcepts', 'Example Pages', 'example-pages', 'index.php?option=com_content&view=article&id=43', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(44, 'ExamplePages', 'Section Blog', 'section-blog', 'index.php?option=com_content&view=section&layout=blog&id=3', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(45, 'ExamplePages', 'Section Table', 'section-table', 'index.php?option=com_content&view=section&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(46, 'ExamplePages', 'Category Blog', 'categoryblog', 'index.php?option=com_content&view=category&layout=blog&id=31', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(47, 'ExamplePages', 'Category Table', 'category-table', 'index.php?option=com_content&view=category&id=32', 'component', 1, 0, 20, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n', 0, 0, 0),
(48, 'mainmenu', 'Web Links', 'web-links', 'index.php?option=com_weblinks&view=category&id=2', 'component', 1, 27, 4, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_feed_link=1\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\ntarget=\nlink_icons=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=Weblinks\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(50, 'mainmenu', 'Blog Layout', 'blog-layout', 'index.php?option=com_content&view=category&layout=blog&id=1', 'component', 1, 27, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=The News\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(51, 'usermenu', 'Submit an Article', 'submit-an-article', 'index.php?option=com_content&view=article&layout=form', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(52, 'usermenu', 'Submit a Web Link', 'submit-a-web-link', 'index.php?option=com_weblinks&view=weblink&layout=form', 'component', 1, 0, 4, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 2, 0, '', 0, 0, 0),
(53, 'mainmenu', 'Features', 'features', 'index.php?option=com_content&view=article&id=46', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=2\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(54, 'mainmenu', 'Gantry Framework', 'gantry-framework', 'index.php?option=com_content&view=article&id=47', 'component', 1, 53, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(55, 'mainmenu', 'Preset Styles', 'preset-styles', 'index.php?Itemid=69', 'menulink', 1, 53, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=69\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(142, 'mainmenu', 'Preset 2', 'preset-2', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset2&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(56, 'mainmenu', 'Module Variations', 'module-variations', 'index.php?option=com_content&view=article&id=49', 'component', 1, 53, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(57, 'mainmenu', 'Module Positions', 'module-positions', 'index.php?option=com_content&view=article&id=50', 'component', 1, 53, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(58, 'mainmenu', 'Typography', 'typography', 'index.php?option=com_content&view=article&id=51', 'component', 1, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(59, 'mainmenu', 'HTML Examples', 'html-examples', 'index.php?option=com_content&view=article&id=52', 'component', 1, 58, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(60, 'mainmenu', 'RokCandy Examples', 'rokcandy-examples', 'index.php?option=com_content&view=article&id=53', 'component', 1, 58, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(61, 'mainmenu', 'Extensions', 'extensions', 'index.php?option=com_content&view=article&id=54', 'component', 1, 0, 20, 0, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=2\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(62, 'mainmenu', 'Tutorials', 'tutorials', 'index.php?option=com_content&view=article&id=55', 'component', 1, 0, 20, 0, 10, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(63, 'mainmenu', 'Installation', 'installation', 'index.php?option=com_content&view=article&id=56', 'component', 1, 62, 20, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(64, 'mainmenu', 'RocketLauncher', 'rocketlauncher', 'index.php?option=com_content&view=article&id=57', 'component', 1, 62, 20, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(65, 'mainmenu', 'Style Control', 'style-control', 'index.php?option=com_content&view=article&id=58', 'component', 1, 62, 20, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(66, 'mainmenu', 'Menu Options', 'menu-options', 'index.php?option=com_content&view=article&id=59', 'component', 1, 62, 20, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(67, 'mainmenu', 'Logo Editing', 'logo-editing', 'index.php?option=com_content&view=article&id=60', 'component', 1, 62, 20, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(68, 'mainmenu', 'Using Typography', 'using-typography', 'index.php?option=com_content&view=article&id=61', 'component', 1, 62, 20, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(69, 'mainmenu', 'Preset Styles', 'preset-styles', 'index.php?option=com_content&view=article&id=62', 'component', 1, 0, 20, 0, 11, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(70, 'mainmenu', 'Contact Us', 'contact-us', 'index.php?option=com_contact&view=contact&id=1', 'component', 1, 27, 7, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(71, 'mainmenu', 'Member Access', 'member-access', 'index.php?option=com_user&view=login', 'component', 1, 27, 14, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_login_title=1\nheader_login=\nlogin=\nlogin_message=0\ndescription_login=0\ndescription_login_text=\nimage_login=-1\nimage_login_align=right\nshow_logout_title=1\nheader_logout=\nlogout=\nlogout_message=1\ndescription_logout=1\ndescription_logout_text=\nimage_logout=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(72, 'mainmenu', 'Wrapper', 'wrapper', 'index.php?option=com_wrapper&view=wrapper', 'component', 1, 27, 17, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'url=http://www.google.com\nscrolling=auto\nwidth=100%\nheight=600\nheight_auto=0\nadd_scheme=1\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(73, 'mainmenu', 'Menu Icons', 'menu-icons', 'index.php?Itemid=66', 'menulink', 1, 53, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=66\nfusion_item_subtext=\nfusion_columns=2\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(75, 'mainmenu', 'Add Icon', 'add-icon', '', 'url', 1, 73, 0, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-add.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(74, 'mainmenu', 'Child Items', 'child-items74', 'index.php?option=com_content&view=article&id=63', 'component', 1, 53, 20, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(76, 'mainmenu', 'Arrow Icon', 'arrow-icon', '', 'url', 1, 73, 0, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-arrow.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(77, 'mainmenu', 'Briefcase Icon', 'briefcase-icon', '', 'url', 1, 73, 0, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-briefcase.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(78, 'mainmenu', 'Calendar Icon', 'calendar-icon', '', 'url', 1, 73, 0, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-calendar.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(79, 'mainmenu', 'Check Icon', 'check-icon', '', 'url', 1, 73, 0, 2, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-check.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(80, 'mainmenu', 'Crank Icon', 'crank-icon', '', 'url', 1, 73, 0, 2, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-crank.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(81, 'mainmenu', 'Delete Icon', 'delete-icon', '', 'url', 1, 73, 0, 2, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-delete.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(82, 'mainmenu', 'Docs Icon', 'docs-icon', '', 'url', 1, 73, 0, 2, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-docs.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(83, 'mainmenu', 'Email Icon', 'email-icon', '', 'url', 1, 73, 0, 2, 9, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-email.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(84, 'mainmenu', 'Home Icon', 'home-icon', '', 'url', 1, 73, 0, 2, 10, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-home.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(85, 'mainmenu', 'Key Icon', 'key-icon', '', 'url', 1, 73, 0, 2, 11, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-key.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(86, 'mainmenu', 'Lock Icon', 'lock-icon', '', 'url', 1, 73, 0, 2, 12, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-key1.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(87, 'mainmenu', 'Unlock Icon', 'unlock-icon', '', 'url', 1, 73, 0, 2, 13, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-key2.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(88, 'mainmenu', 'Minus Icon', 'minus-icon', '', 'url', 1, 73, 0, 2, 14, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-minus.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(89, 'mainmenu', 'Monitor Icon', 'monitor-icon', '', 'url', 1, 73, 0, 2, 15, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-monitor.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(90, 'mainmenu', 'Notes Icon', 'notes-icon', '', 'url', 1, 73, 0, 2, 16, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-notes.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(91, 'mainmenu', 'Post Icon', 'post-icon', '', 'url', 1, 73, 0, 2, 17, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-post.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(92, 'mainmenu', 'Printer Icon', 'printer-icon', '', 'url', 1, 73, 0, 2, 18, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-printer.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(93, 'mainmenu', 'RSS Icon', 'rss-icon', '', 'url', 1, 73, 0, 2, 19, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-rss.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(94, 'mainmenu', 'Warning Icon', 'warning-icon', '', 'url', 1, 73, 0, 2, 20, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-warning.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(95, 'mainmenu', 'Write Icon', 'write-icon', '', 'url', 1, 73, 0, 2, 21, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=icon-write.png\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(96, 'mainmenu', 'Child Item', 'child-item96', 'index.php?option=com_content&view=article&id=63', 'component', 1, 74, 20, 2, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=Single Column Example\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(97, 'mainmenu', 'Child Item', 'child-item97', 'index.php?option=com_content&view=article&id=63', 'component', 1, 96, 20, 3, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(98, 'mainmenu', 'Child Item', 'child-item98', 'index.php?option=com_content&view=article&id=63', 'component', 1, 97, 20, 4, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(99, 'mainmenu', 'Child Item', 'child-item99', 'index.php?option=com_content&view=article&id=63', 'component', 1, 98, 20, 5, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(100, 'mainmenu', 'Child Item', 'child-item100', 'index.php?option=com_content&view=article&id=63', 'component', 1, 98, 20, 5, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(101, 'mainmenu', 'Child Item', 'child-item101', 'index.php?option=com_content&view=article&id=63', 'component', 1, 98, 20, 5, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(102, 'mainmenu', 'Child Item', 'child-item102', 'index.php?option=com_content&view=article&id=63', 'component', 1, 98, 20, 5, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(103, 'mainmenu', 'Child Item', 'child-item103', 'index.php?option=com_content&view=article&id=63', 'component', 1, 97, 20, 4, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(104, 'mainmenu', 'Child Item', 'child-item104', 'index.php?option=com_content&view=article&id=63', 'component', 1, 97, 20, 4, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(105, 'mainmenu', 'Child Item', 'child-item105', 'index.php?option=com_content&view=article&id=63', 'component', 1, 97, 20, 4, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(106, 'mainmenu', 'Child Item', 'child-item106', 'index.php?option=com_content&view=article&id=63', 'component', 1, 96, 20, 3, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(107, 'mainmenu', 'Child Item', 'child-item107', 'index.php?option=com_content&view=article&id=63', 'component', 1, 96, 20, 3, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(108, 'mainmenu', 'Child Item', 'child-item108', 'index.php?option=com_content&view=article&id=63', 'component', 1, 96, 20, 3, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(109, 'mainmenu', 'Child Item', 'child-item109', 'index.php?option=com_content&view=article&id=63', 'component', 1, 74, 20, 2, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=Multi-Column Example\nfusion_columns=2\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(110, 'mainmenu', 'Child Item', 'child-item110', 'index.php?option=com_content&view=article&id=63', 'component', 1, 74, 20, 2, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(111, 'mainmenu', 'Child Item', 'child-item111', 'index.php?option=com_content&view=article&id=63', 'component', 1, 74, 20, 2, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(112, 'mainmenu', 'Child Item', 'child-item112', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(113, 'mainmenu', 'Child Item', 'child-item113', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(114, 'mainmenu', 'Child Item', 'child-item114', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(115, 'mainmenu', 'Child Item', 'child-item115', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(116, 'mainmenu', 'Child Item', 'child-item116', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(117, 'mainmenu', 'Child Item', 'child-item117', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=Single Column Example\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(118, 'mainmenu', 'Child Item', 'child-item118', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(119, 'mainmenu', 'Child Item', 'child-item119', 'index.php?option=com_content&view=article&id=63', 'component', 1, 109, 20, 3, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(120, 'mainmenu', 'Child Item', 'child-item120', 'index.php?option=com_content&view=article&id=63', 'component', 1, 117, 20, 4, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(121, 'mainmenu', 'Child Item', 'child-item121', 'index.php?option=com_content&view=article&id=63', 'component', 1, 117, 20, 4, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);
INSERT INTO `#__menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(122, 'mainmenu', 'Child Item', 'child-item122', 'index.php?option=com_content&view=article&id=63', 'component', 1, 117, 20, 4, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(123, 'mainmenu', 'Child Item', 'child-item123', 'index.php?option=com_content&view=article&id=63', 'component', 1, 117, 20, 4, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(124, 'mainmenu', 'RokTabs', 'roktabs', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(125, 'mainmenu', 'RokAjaxSearch', 'rokajaxsearch', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(126, 'mainmenu', 'RokStories', 'rokstories', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(127, 'mainmenu', 'RokNewsPager', 'roknewspager', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(128, 'mainmenu', 'RokBox', 'rokbox', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(129, 'mainmenu', 'RokNavMenu', 'roknavmenu', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(130, 'mainmenu', 'RokGZipper', 'rokgzipper', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(131, 'mainmenu', 'RokCandy', 'rokcandy', 'index.php?Itemid=61', 'menulink', 1, 61, 0, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(132, 'mainmenu', 'Using Typography', 'using-typography', 'index.php?Itemid=68', 'menulink', 1, 58, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=68\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(133, 'mainmenu', 'Gantry Framework', 'gantry-framework', 'index.php?Itemid=54', 'menulink', 1, 1, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=54\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(134, 'mainmenu', '13 Module Variations', '13-module-variations', 'index.php?Itemid=56', 'menulink', 1, 1, 0, 1, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=56\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(135, 'mainmenu', '68 Module Positions', '68-module-positions', 'index.php?Itemid=57', 'menulink', 1, 1, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=57\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(136, 'mainmenu', '10 Style Variations', '10-style-variations', 'index.php?Itemid=69', 'menulink', 1, 1, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=69\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(137, 'mainmenu', 'Integrated Extensions', 'integrated-extensions', 'index.php?Itemid=61', 'menulink', 1, 1, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_item=61\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(141, 'mainmenu', 'Preset 1', 'preset-1', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset1&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(143, 'mainmenu', 'Preset 3', 'preset-3', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset3&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(144, 'mainmenu', 'Preset 4', 'preset-4', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset4&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(145, 'mainmenu', 'Preset 5', 'preset-5', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset5&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(146, 'mainmenu', 'Preset 6', 'preset-6', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset6&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(147, 'mainmenu', 'Preset 7', 'preset-7', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset7&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 7, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0),
(148, 'mainmenu', 'Preset 8', 'preset-8', 'index.php?option=com_content&view=article&id=62&Itemid=69&presets=preset8&backgroundlevel=high&bodylevel=high', 'url', 1, 69, 0, 1, 8, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'menu_image=-1\nfusion_item_subtext=\nfusion_columns=1\nfusion_customimage=\nsplitmenu_item_subtext=\nsuckerfish_item_subtext=\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `#__menu_types`
--

DROP TABLE IF EXISTS `#__menu_types`;
CREATE TABLE IF NOT EXISTS `#__menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
);

--
-- Dumping data for table `#__menu_types`
--

INSERT INTO `#__menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'usermenu', 'User Menu', 'A Menu for logged in Users'),
(3, 'topmenu', 'Top Menu', 'Top level navigation'),
(4, 'othermenu', 'Resources', 'Additional links'),
(5, 'ExamplePages', 'Example Pages', 'Example Pages'),
(6, 'keyconcepts', 'Key Concepts', 'This describes some critical information for new Users.');

-- --------------------------------------------------------

--
-- Table structure for table `#__messages`
--

DROP TABLE IF EXISTS `#__messages`;
CREATE TABLE IF NOT EXISTS `#__messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
);

--
-- Dumping data for table `#__messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__messages_cfg`
--

DROP TABLE IF EXISTS `#__messages_cfg`;
CREATE TABLE IF NOT EXISTS `#__messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
);

--
-- Dumping data for table `#__messages_cfg`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__migration_backlinks`
--

DROP TABLE IF EXISTS `#__migration_backlinks`;
CREATE TABLE IF NOT EXISTS `#__migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
);

--
-- Dumping data for table `#__migration_backlinks`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__modules`
--

DROP TABLE IF EXISTS `#__modules`;
CREATE TABLE IF NOT EXISTS `#__modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
);

--
-- Dumping data for table `#__modules`
--

INSERT INTO `#__modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(5, 'Menu Stats', '', 5, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_stats', 0, 2, 1, '', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 0, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(16, 'Polls', '', 10, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_poll', 0, 0, 1, 'id=14\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(17, 'User Menu', '', 4, 'left', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 1, 1, 'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1', 1, 0, ''),
(18, 'Login Form', '', 0, 'popup', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, 'cache=0\nmoduleclass_sfx=\npretext=\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n', 1, 0, ''),
(19, 'Latest News', '', 0, 'content-top-a', 0, '0000-00-00 00:00:00', 1, 'mod_latestnews', 0, 0, 1, 'count=5\nordering=c_dsc\nuser_id=0\nshow_front=1\nsecid=\ncatid=1\nmoduleclass_sfx=\ncache=1\ncache_time=900\n\n', 1, 0, ''),
(21, 'Who''s Online', '', 11, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_whosonline', 0, 0, 1, 'cache=0\nshowmode=0\nmoduleclass_sfx=square2\n\n', 0, 0, ''),
(22, 'Popular', '', 0, 'content-top-b', 0, '0000-00-00 00:00:00', 1, 'mod_mostread', 0, 0, 1, 'moduleclass_sfx=\nshow_front=1\ncount=5\ncatid=1\nsecid=\ncache=1\ncache_time=900\n\n', 0, 0, ''),
(25, 'Newsflash', '', 0, 'content-bottom-a', 0, '0000-00-00 00:00:00', 1, 'mod_newsflash', 0, 0, 1, 'catid=3\nlayout=default\nimage=0\nlink_titles=\nshowLastSeparator=1\nreadmore=0\nitem_title=0\nitems=\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(35, 'Breadcrumbs', '', 0, 'breadcrumb', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 1, 'showHome=1\nhomeText=Home\nshowLast=1\nseparator=\nmoduleclass_sfx=\ncache=0\n\n', 1, 0, ''),
(41, 'Welcome to Joomla!', '<div style="padding: 5px">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href="http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews" target="_blank">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href="http://www.joomla.org/download.html" target="_blank">latest Joomla! release;</a> and (3) a <a href="http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup" target="_blank" title="good Web host">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href="http://docs.joomla.org/Category:Security_Checklist" target="_blank" title="Joomla! Security Checklist">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href="http://developer.joomla.org/security/contact-the-team.html" target="_blank" title="Joomla! Security Task Force">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   "<a href="http://docs.joomla.org/beginners" target="_blank">Absolute Beginner''s   Guide to Joomla!.</a>" There, you will find a Quick Start to Joomla!   <a href="http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf" target="_blank">guide</a>   and <a href="http://help.joomla.org/ghop/feb2008/task167/index.html" target="_blank">video</a>,   amongst many other tutorials. The   <a href="http://community.joomla.org/magazine/view-all-issues.html" target="_blank">Joomla!   Community Magazine</a> also has   <a href="http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html" target="_blank">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href="http://docs.joomla.org/Category:FAQ" target="_blank">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href="http://forum.joomla.org/" target="_blank">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name="twjs" title="twjs"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href="http://www.joomla.org/about-joomla/contribute-to-joomla.html" target="_blank">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>', 0, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 2, 1, 'moduleclass_sfx=\n\n', 1, 1, ''),
(42, 'Joomla! Security Newsfeed', '', 6, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_feed', 0, 0, 1, 'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n', 0, 1, ''),
(43, 'RokAjaxSearch', '', 0, 'utility-a', 0, '0000-00-00 00:00:00', 1, 'mod_rokajaxsearch', 0, 0, 0, 'moduleclass_sfx=\nsearch_page=index.php?option=com_search&view=search&tmpl=component\nadv_search_page=index.php?option=com_search&view=search\ninclude_css=0\ntheme=light\nsearchphrase=any\nordering=newest\nlimit=10\nperpage=3\nwebsearch=0\nblogsearch=0\nimagesearch=0\nvideosearch=0\nwebsearch_api=0\nshow_pagination=1\nsafesearch=MODERATE\nimage_size=MEDIUM\nshow_estimated=1\nhide_divs=\ninclude_link=1\nshow_description=1\ninclude_category=1\nshow_readmore=1\n\n', 0, 0, ''),
(44, 'Site Navigation', '', 0, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_roknavmenu', 0, 0, 1, 'menutype=mainmenu\nlimit_levels=0\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\ntheme=/templates/rt_quantive_j15/html/mod_roknavmenu/themes/gantry-splitmenu\nenable_js=0\nopacity=1\neffect=slidefade\nhidedelay=500\nmenu_animation=Quad.easeOut\nmenu_duration=400\npill=0\npill_animation=Back.easeOut\npill_duration=400\ncentered-offset=0\ntweakInitial_x=0\ntweakInitial_y=0\ntweakSubsequent_x=0\ntweakSubsequent_y=0\nenable_current_id=0\nroknavmenu_splitmenu_enable_current_id=0\nroknavmenu_fusion_load_css=1\nroknavmenu_fusion_enable_js=0\nroknavmenu_fusion_opacity=1\nroknavmenu_fusion_effect=slidefade\nroknavmenu_fusion_hidedelay=500\nroknavmenu_fusion_menu_animation=Quad.easeOut\nroknavmenu_fusion_menu_duration=400\nroknavmenu_fusion_pill=0\nroknavmenu_fusion_pill_animation=Back.easeOut\nroknavmenu_fusion_pill_duration=400\nroknavmenu_fusion_centeredOffset=0\nroknavmenu_fusion_tweakInitial_x=0\nroknavmenu_fusion_tweakInitial_y=0\nroknavmenu_fusion_tweakSubsequent_x=0\nroknavmenu_fusion_tweakSubsequent_y=0\nroknavmenu_fusion_enable_current_id=0\ncustom_layout=default.php\ncustom_formatter=default.php\nurl_type=relative\ncache=0\nmodule_cache=1\ncache_time=900\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_link=0\n\n', 1, 0, ''),
(45, 'Our Blog', '', 2, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_roknewspager', 0, 0, 1, 'load_css=1\ntheme=light\ncontent_type=joomla\nsecid=8\ncatid=39\nshow_front=1\narticle_count=3\nshow_accordion=0\nshow_paging=1\nmaxpages=8\nshow_title=1\nshow_thumbnails=0\nthumb_width=90\nthumbnail_link=1\nshow_overlay=1\noverlay=-1\nshow_ratings=0\nshow_readmore=0\nreadmore_text=View More Posts\nitemsOrdering=order\nshow_preview_text=0\nstrip_tags=a,br\npreview_count=200\nshow_comment_count=0\nshow_author=0\nshow_published_date=1\nautoupdate=0\nautoupdate_delay=5000\nmoduleclass_sfx=\ncache=0\nmodule_ident=id\ncache_time=900\n\n', 0, 0, ''),
(46, 'FP RokStories', '', 1, 'showcase-a', 0, '0000-00-00 00:00:00', 1, 'mod_rokstories', 0, 0, 0, 'moduleclass_sfx=\nload_css=1\nlayout_type=layout2\ncontent_type=joomla\nsecid=6\ncatid=37\nshow_front=1\narticle_count=4\nitemsOrdering=order\nstrip_tags=a,i,br,strong,em,h2,span\ncontent_position=left\nshow_article_title=0\nshow_created_date=0\nshow_article=1\nshow_article_link=1\nthumb_width=90\nstart_width=auto\nuser_id=0\nstart_element=0\nthumbs_opacity=0.3\nmouse_type=click\nautoplay=0\nautoplay_delay=5000\nshow_label_article_title=0\nshow_arrows=1\narrows_placement=outside\nshow_thumbs=0\nfixed_thumb=1\nlink_titles=0\nlink_labels=0\nlink_images=0\nleft_offset_x=-40\nleft_offset_y=-100\nright_offset_x=-30\nright_offset_y=-100\nleft_f_offset_x=-40\nleft_f_offset_y=-100\nright_f_offset_x=-30\nright_f_offset_y=-100\ncache=0\nmodule_cache=1\ncache_time=900\n\n', 0, 0, ''),
(127, 'Built with Gantry', '<div class="demo-ft-a">\r\n<img src="images/blank.png" class="floatright" alt="Feature Image" />\r\n<br />\r\n<p>The <strong>Gantry Framework</strong> forms the core foundation of <strong>Quantive</strong>, combining a complex and powerful <strong>infrastructure</strong> with an intuitive and simple <strong>control interface</strong>.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=47&amp;Itemid=54"]Learn More[/readon2]\r\n</div>', 0, 'feature-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(47, 'FP RokTabs', '', 1, 'feature-b', 0, '0000-00-00 00:00:00', 1, 'mod_roktabs', 0, 0, 0, 'style=base\ncontent_type=joomla\nsecid=0\ncatid=38\nshow_front=1\nitemsOrdering=order\nwidth=438\ntabs_count=0\nduration=600\ntransition_type=scrolling\ntransition_fx=Quad.easeInOut\nlinksMargins=0\ntabs_position=top\ntabs_event=click\ntabs_title=content\ntabs_incremental=Tab\ntabs_hideh6=1\ntabs_showicons=0\ntabs_iconside=left\ntabs_iconpath=__module__/images\ntabs_icon=icon_home.gif,icon_security.gif,icon_comment.gif,icon_world.gif,icon_note.gif\nautoplay=0\nautoplay_delay=2000\nmoduleclass_sfx=\ncache=0\nmodule_cache=1\ncache_time=900\n\n', 0, 0, ''),
(128, '3rd Level SplitMenu', '<p>Displays first tier child menu items in the main <strong>horizontal bar</strong>, and then its children in the <strong>side</strong> column.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=59&amp;Itemid=66"]Learn More[/readon2]', 2, 'maintop-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(129, 'Styled Extensions', '<p>An assortment of <strong>RocketTheme</strong> extensions with specific styling, such as <strong>RokTabs</strong> and <strong>RokAjaxSearch</strong>.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=54&amp;Itemid=61"]Learn More[/readon2]', 0, 'maintop-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(130, 'Custom Typography', '<p>A selection of pre-built typography to <strong>enhance</strong> your site''s <strong>article</strong> or <strong>modular</strong> content.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=51&amp;Itemid=58"]Learn More[/readon2]', 0, 'maintop-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(48, 'Top A', '<p>The <a href="javascript:void(0);">Top-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'top-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(49, 'Top B', '<p>The <a href="javascript:void(0);">Top-b</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 3, 'top-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(50, 'Top C', '<p>The <a href="javascript:void(0);">Top-c</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'top-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(51, 'Top D', '<p>The <a href="javascript:void(0);">Top-d</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'top-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(52, 'Top E', '<p>The <a href="javascript:void(0);">Top-e</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'top-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(53, 'Top F', '<p>The <a href="javascript:void(0);">Top-f</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'top-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(54, 'Showcase A', '<p>The <a href="javascript:void(0);">Showcase-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 3, 'showcase-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(55, 'Showcase B', '<p>The <a href="javascript:void(0);">Showcase-b</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'showcase-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(56, 'Showcase C', '<p>The <a href="javascript:void(0);">Showcase-c</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'showcase-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(57, 'Showcase D', '<p>The <a href="javascript:void(0);">Showcase-d</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'showcase-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(58, 'Showcase E', '<p>The <a href="javascript:void(0);">Showcase-e</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'showcase-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(59, 'Showcase F', '<p>The <a href="javascript:void(0);">Showcase-f</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'showcase-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(60, 'MainTop A', '<p>The <a href="javascript:void(0);">MainTop-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'maintop-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(61, 'MainTop B', '<p>The <a href="javascript:void(0);">MainTop-b</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'maintop-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(62, 'MainTop C', '<p>The <a href="javascript:void(0);">MainTop-c</a> position, using the <strong>square2</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'maintop-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(63, 'MainTop D', '<p>The <a href="javascript:void(0);">MainTop-d</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'maintop-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square3\n\n', 0, 0, ''),
(64, 'MainTop E', '<p>The <a href="javascript:void(0);">MainTop-e</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'maintop-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(65, 'MainTop F', '<p>The <a href="javascript:void(0);">MainTop-f</a> position, using the <strong>square5</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'maintop-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(66, 'MainBottom A', '<p>The <a href="javascript:void(0);">MainBottom-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'mainbottom-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(67, 'MainBottom B', '<p>The <a href="javascript:void(0);">MainBottom-b</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'mainbottom-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(70, 'MainBottom E', '<p>The <a href="javascript:void(0);">MainBottom-e</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'mainbottom-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(71, 'MainBottom F', '<p>The <a href="javascript:void(0);">MainBottom-f</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'mainbottom-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(72, 'Bottom A', '<p>The <a href="javascript:void(0);">Bottom-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'bottom-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(73, 'Bottom B', '<p>The <a href="javascript:void(0);">Bottom-b</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'bottom-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(74, 'Bottom C', '<p>The <a href="javascript:void(0);">Bottom-c</a> position, using the <strong>square2</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'bottom-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(75, 'Bottom D', '<p>The <a href="javascript:void(0);">Bottom-d</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'bottom-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square3\n\n', 0, 0, ''),
(76, 'Bottom E', '<p>The <a href="javascript:void(0);">Bottom-e</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'bottom-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(77, 'Bottom F', '<p>The <a href="javascript:void(0);">Bottom-f</a> <br />position, using the <strong>square5</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'bottom-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(78, 'Footer A', '<p>The <a href="javascript:void(0);">Footer-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'footer-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(79, 'Footer B', '<p>The <a href="javascript:void(0);">Footer-b</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'footer-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(80, 'Footer C', '<p>The <a href="javascript:void(0);">Footer-c</a> position, using the <strong>square2</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'footer-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(81, 'Footer D', '<p>The <a href="javascript:void(0);">Footer-d</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'footer-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square3\n\n', 0, 0, ''),
(82, 'Footer E', '<p>The <a href="javascript:void(0);">Footer-e</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'footer-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(83, 'Footer F', '<p>The <a href="javascript:void(0);">Footer-f</a> position, using the <strong>square5</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'footer-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(84, 'Copyright Module Position - Default Styling', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at sem ut ipsum vestibulum euismod. Mauris et massa porta leo facilisis feugiat. Suspendisse id neque a sem facilisis blandit. Aliquam sem leo, commodo ut, rutrum auctor, iaculis nec, eros. Aenean massa. Mauris tincidunt. Vivamus consectetur, tortor sit amet dictum sagittis, urna lectus dapibus metus, ut congue ligula odio sed nunc. Suspendisse potenti.</p>', 1, 'copyright', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(85, 'Feature A', '<p>The <a href="javascript:void(0);">Feature-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'feature-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(86, 'Feature B', '<p>The <a href="javascript:void(0);">Feature-b</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'feature-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(87, 'Feature C', '<p>The <a href="javascript:void(0);">Feature-c</a> position, using the <strong>square2</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'feature-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(88, 'Feature D', '<p>The <a href="javascript:void(0);">Feature-d</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'feature-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square3\n\n', 0, 0, ''),
(89, 'Feature E', '<p>The <a href="javascript:void(0);">Feature-e</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'feature-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(90, 'Feature F', '<p>The <a href="javascript:void(0);">Feature-f</a> position, using the <strong>square5</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'feature-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(91, 'Header A', '<p>The <a href="javascript:void(0);">Header-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'header-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(92, 'Header B', '<p>The <a href="javascript:void(0);">Header-b</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'header-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(95, 'Header E', '<p>The <a href="javascript:void(0);">Header-e</a> position, using its <strong>default</strong> module styling.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'header-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(96, 'Header F', '<p>The <a href="javascript:void(0);">Header-f</a> position, using its <strong>default</strong> module styling.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'header-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(97, 'Utility A', '<p>The <a href="javascript:void(0);">Utility-a</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'utility-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(98, 'Utility B', '<p>The <a href="javascript:void(0);">Utility-b</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'utility-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(99, 'Utility C', '<p>The <a href="javascript:void(0);">Utility-c</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'utility-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(100, 'Utility D', '<p>The <a href="javascript:void(0);">Utility-d</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 1, 'utility-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(101, 'Utility E', '<p>The <a href="javascript:void(0);">Utility-e</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'utility-e', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(102, 'Utility F', '<p>The <a href="javascript:void(0);">Utility-f</a> position, using its <strong>default</strong> module styling.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'utility-f', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(103, 'Content Top A', '<p>The <a href="javascript:void(0);">Content-Top-a</a> position, using the <strong>square6</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'content-top-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square6\n\n', 0, 0, ''),
(104, 'Content Top C', '<p>The <a href="javascript:void(0);">Content-Top-c</a> position, using the <strong>title1</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'content-top-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title1\n\n', 0, 0, ''),
(105, 'Content Bottom A', '<p>The <a href="javascript:void(0);">Content-Bottom-a</a> position, using the <strong>title3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'content-bottom-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title3\n\n', 0, 0, ''),
(106, 'Content Bottom C', '<p>The <a href="javascript:void(0);">Content-Bottom-c</a> position, using the <strong>square6</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'content-bottom-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square6\n\n', 0, 0, ''),
(107, 'Sidebar A', '<p>All <strong>Sidebar</strong> positions can be alternated, such as <strong>Side <em>Main</em> Side Side</strong>.</p>\r\n<p>This is done via a sliding configuration option in the template manager.</p>\r\n[readon url="#"]Read More[/readon]', 5, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(108, 'Sidebar B', '<p>The <a href="javascript:void(0);">Sidebar-b</a> position, using the <strong>square4</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 5, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square4\n\n', 0, 0, ''),
(109, 'Sidebar C', '<p>The <a href="javascript:void(0);">Sidebar-c</a> position, using the <strong>title3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 0, 'sidebar-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title3\n\n', 0, 0, ''),
(110, 'Sidebar C', '<p>The <a href="javascript:void(0);">Sidebar-c</a> position, using the <strong>square5</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 3, 'sidebar-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(111, 'Sidebar C', '<p>The <a href="javascript:void(0);">Sidebar-c</a> position, using the <strong>square3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 2, 'sidebar-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square3\n\n', 0, 0, ''),
(112, 'Sidebar C', '<p>The <a href="javascript:void(0);">Sidebar-c</a> position, using its <strong>default</strong> module styling.</p>\r\n<p>Nullam eget neque. Integer imperdiet venenatis ligula.</p>\r\n[readon url="#"]Read More[/readon]', 4, 'sidebar-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(113, 'Sidebar B', '<p>The <a href="javascript:void(0);">Sidebar-b</a> position, using the <strong>title1</strong> module class suffix.</p>\r\n<p>Nullam eget neque. Integer imperdiet venenatis ligula.</p>\r\n[readon url="#"]Read More[/readon]', 6, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title1\n\n', 0, 0, ''),
(119, 'Sidebar A', '<p>The <a href="javascript:void(0);">Sidebar-a</a> position, using the <strong>square1</strong> module class suffix.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sit amet nibh. Vivamus non arcu.</p>\r\n[readon url="#"]Read More[/readon]', 6, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square1\n\n', 0, 0, ''),
(115, 'Sidebar B', '<p>The <a href="javascript:void(0);">Sidebar-b</a> position, using the <strong>title2</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 3, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title2\n\n', 0, 0, ''),
(118, 'Sidebar A', '<p>The <a href="javascript:void(0);">Sidebar-a</a> position, using the <strong>title2</strong> module class suffix.</p>\r\n<p>Nullam eget neque. Integer imperdiet venenatis ligula.</p>\r\n[readon url="#"]Read More[/readon]', 7, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title2\n\n', 0, 0, ''),
(117, 'Sidebar B', '<p>The <a href="javascript:void(0);">Sidebar-b</a> position, using the <strong>title1 title3</strong> module class suffix.</p>\r\n[readon url="#"]Read More[/readon]', 4, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=title1 title3\n\n', 0, 0, ''),
(121, 'Gantry Blog Docs', '<p>We advise reading the blog entries below to gain a greater understanding of Gantry. They go into much greater detail than the overview on this page.</p>\r\n\r\n<ul>\r\n  <li><a href="http://www.rockettheme.com/blog/coding/511-gantry-framework-overview" target="_blank">Part 1: Overview</a></li>\r\n  <li><a href="http://www.rockettheme.com/blog/coding/512-gantry-framework-layouts" target="_blank">Part 2: Layouts</a></li>\r\n  <li><a href="http://www.rockettheme.com/blog/coding/520-gantry-framework-body-features" target="_blank">Part 3: Body + Features</a></li>\r\n  <li><a href="http://www.rockettheme.com/blog/coding/534-gantry-framework-going-gpl" target="_blank">Part 4: v2.0 Going GPL</a></li>\r\n  <li><a href="http://www.rockettheme.com/blog/coding/543-gantry-framework-part-5-20-features" target="_blank">Part 5: 2.0 Features</a></li>\r\n</ul>', 9, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(122, 'Gantry RTL Preview', '<p>Below is a preview of the demo frontpage in RTL mode, please click on the image for a larger preview via RokBox:</p>\r\n\r\n<p><a title="Preview of the Demo Frontpage in RTL mode" rel="rokbox[715 1261]" href="images/stories/demo/general/rtl-preview-full.jpg"><img class="rt-image" src="images/stories/demo/general/rtl-preview.jpg" alt="RTL Preview" /></a></p>', 11, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(123, 'Gantry Top Features', '<p>Below is a list of some of the top features of Gantry:</p>\r\n\r\n<p class="dropcap"><span class="dropcap">1</span><a target="_blank" href="http://www.rockettheme.com/blog/coding/543-gantry-framework-part-5-20-features"><strong>RTL Support</strong></a>: automatic grid inversion when RTL is detected in Joomla.</p>\r\n<p class="dropcap"><span class="dropcap">2</span><a target="_blank" href="http://www.rockettheme.com/blog/coding/543-gantry-framework-part-5-20-features"><strong>Custom Presets</strong></a>: a simple user interface for creating your own custom presets.</p>\r\n<p class="dropcap"><span class="dropcap">3</span><a target="_blank" href="http://www.rockettheme.com/blog/coding/543-gantry-framework-part-5-20-features"><strong>Menu Item Control</strong></a>: set various template options on a per menu item basis.</p>', 8, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(124, 'Demo Launcher', '<p>Download our <strong>RocketLauncher</strong> package to install an exact <strong>copy</strong> / <strong>replica</strong> of the Quantive demo on your own server or domain.</p>\r\n[readon url="index.php?option=com_content&amp;view=article&amp;id=57&amp;Itemid=64"]More[/readon]', 0, 'footer-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(125, 'XHTML/CSS3 Valid', '<p>The template is fully compliant with the <strong>XHTML 1.0 Transitional</strong> and <a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fdemo.rockettheme.com%2Fapr10&amp;profile=css3&amp;usermedium=all&amp;warning=1&amp;lang=en" target="_blank">CSS3 standards</a>, as set by the World Wide Web Consortium.</p>\r\n[readon url="http://validator.w3.org/check?uri=http://demo.rockettheme.com/apr10/"]Validate (HTML)[/readon]', 2, 'footer-c', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(131, 'Light and Dark Styles', '<p>Quantive''s collection of <strong>preset styles</strong>, allow you to choose from either <strong>light</strong> or <strong>dark</strong> style variations.</p>\r\n[readon2 url="index.php?option=com_content&amp;view=article&amp;id=62&amp;Itemid=69"]Learn More[/readon2]', 0, 'maintop-d', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(126, 'Site Information', '<p>All demo content is for demo <strong>purposes</strong> only, to show an example of a <strong>live site</strong>. All images are the copyright of their respective owners.</p>\r\n[readon url="#"]More[/readon]', 2, 'footer-a', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square5\n\n', 0, 0, ''),
(132, 'Today''s Poll', '', 2, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_poll', 0, 0, 1, 'id=15\nmoduleclass_sfx=\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(133, 'Main Menu', '', 0, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_roknavmenu', 0, 0, 1, 'menutype=mainmenu\nlimit_levels=1\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\ntheme=/templates/rt_quantive_j15/html/mod_roknavmenu/themes/gantry-splitmenu\nenable_js=0\nopacity=1\neffect=slidefade\nhidedelay=500\nmenu_animation=Quad.easeOut\nmenu_duration=400\npill=0\npill_animation=Back.easeOut\npill_duration=400\ncentered-offset=0\ntweakInitial_x=0\ntweakInitial_y=0\ntweakSubsequent_x=0\ntweakSubsequent_y=0\nenable_current_id=0\nroknavmenu_splitmenu_enable_current_id=0\nroknavmenu_fusion_load_css=1\nroknavmenu_fusion_enable_js=0\nroknavmenu_fusion_opacity=1\nroknavmenu_fusion_effect=slidefade\nroknavmenu_fusion_hidedelay=500\nroknavmenu_fusion_menu_animation=Quad.easeOut\nroknavmenu_fusion_menu_duration=400\nroknavmenu_fusion_pill=0\nroknavmenu_fusion_pill_animation=Back.easeOut\nroknavmenu_fusion_pill_duration=400\nroknavmenu_fusion_centeredOffset=0\nroknavmenu_fusion_tweakInitial_x=0\nroknavmenu_fusion_tweakInitial_y=0\nroknavmenu_fusion_tweakSubsequent_x=0\nroknavmenu_fusion_tweakSubsequent_y=0\nroknavmenu_fusion_enable_current_id=0\ncustom_layout=default.php\ncustom_formatter=default.php\nurl_type=relative\ncache=0\nmodule_cache=1\ncache_time=900\ntag_id=\nclass_sfx=\nmoduleclass_sfx=square4\nmaxdepth=10\nmenu_images=0\nmenu_images_link=0\n\n', 0, 0, ''),
(134, 'Extra Content', '', 4, 'sidebar-a', 0, '0000-00-00 00:00:00', 1, 'mod_roknewspager', 0, 0, 1, 'load_css=1\ntheme=light\ncontent_type=joomla\nsecid=8\ncatid=40\nshow_front=1\narticle_count=2\nshow_accordion=0\nshow_paging=1\nmaxpages=8\nshow_title=0\nshow_thumbnails=1\nthumb_width=78\nthumbnail_link=1\nshow_overlay=1\noverlay=-1\nshow_ratings=1\nshow_readmore=0\nreadmore_text=View More Posts\nitemsOrdering=order\nshow_preview_text=1\nstrip_tags=a,br,strong,em\npreview_count=200\nshow_comment_count=0\nshow_author=0\nshow_published_date=0\nautoupdate=0\nautoupdate_delay=5000\nmoduleclass_sfx=\ncache=0\nmodule_ident=id\ncache_time=900\n\n', 0, 0, ''),
(135, 'Connect with us at:', '<img src="images/stories/demo/frontpage/connect.png" alt="Connect" class="png" />', 7, 'sidebar-b', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=square2\n\n', 0, 0, ''),
(136, 'SP RokStories', '', 2, 'showcase-a', 0, '0000-00-00 00:00:00', 1, 'mod_rokstories', 0, 0, 0, 'moduleclass_sfx=\nload_css=1\nlayout_type=layout2\ncontent_type=joomla\nsecid=6\ncatid=41\nshow_front=1\narticle_count=4\nitemsOrdering=order\nstrip_tags=a,i,br,strong,em,h2,span\ncontent_position=left\nshow_article_title=1\nshow_created_date=1\nshow_article=1\nshow_article_link=1\nthumb_width=90\nstart_width=auto\nuser_id=0\nstart_element=0\nthumbs_opacity=0.3\nmouse_type=click\nautoplay=0\nautoplay_delay=5000\nshow_label_article_title=0\nshow_arrows=1\narrows_placement=outside\nshow_thumbs=0\nfixed_thumb=1\nlink_titles=0\nlink_labels=0\nlink_images=0\nleft_offset_x=-40\nleft_offset_y=-100\nright_offset_x=-30\nright_offset_y=-100\nleft_f_offset_x=-40\nleft_f_offset_y=-100\nright_f_offset_x=-30\nright_f_offset_y=-100\ncache=0\nmodule_cache=1\ncache_time=900\n\n', 0, 0, ''),
(137, 'RokTabs', '', 0, 'content-top-a', 0, '0000-00-00 00:00:00', 1, 'mod_roktabs', 0, 0, 0, 'style=base\ncontent_type=joomla\nsecid=0\ncatid=42\nshow_front=1\nitemsOrdering=order\nwidth=678\ntabs_count=0\nduration=600\ntransition_type=scrolling\ntransition_fx=Quad.easeInOut\nlinksMargins=0\ntabs_position=top\ntabs_event=click\ntabs_title=content\ntabs_incremental=Tab\ntabs_hideh6=1\ntabs_showicons=1\ntabs_iconside=left\ntabs_iconpath=__module__/images\ntabs_icon=icon_home.gif,icon_security.gif,icon_comment.gif,icon_world.gif,icon_note.gif\nautoplay=0\nautoplay_delay=2000\nmoduleclass_sfx=\ncache=0\nmodule_cache=1\ncache_time=900\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `#__modules_menu`
--

DROP TABLE IF EXISTS `#__modules_menu`;
CREATE TABLE IF NOT EXISTS `#__modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
);

--
-- Dumping data for table `#__modules_menu`
--

INSERT INTO `#__modules_menu` (`moduleid`, `menuid`) VALUES
(16, 27),
(16, 48),
(16, 50),
(16, 53),
(16, 57),
(16, 58),
(16, 59),
(16, 60),
(16, 62),
(16, 63),
(16, 64),
(16, 65),
(16, 66),
(16, 67),
(16, 68),
(16, 69),
(16, 70),
(16, 74),
(16, 96),
(16, 97),
(16, 98),
(16, 99),
(16, 100),
(16, 101),
(16, 102),
(16, 103),
(16, 104),
(16, 105),
(16, 106),
(16, 107),
(16, 108),
(16, 109),
(16, 110),
(16, 111),
(16, 112),
(16, 113),
(16, 114),
(16, 115),
(16, 116),
(16, 117),
(16, 118),
(16, 119),
(16, 120),
(16, 121),
(16, 122),
(16, 123),
(17, 0),
(18, 0),
(19, 27),
(19, 48),
(19, 70),
(19, 71),
(21, 27),
(21, 48),
(21, 50),
(21, 53),
(21, 57),
(21, 58),
(21, 59),
(21, 60),
(21, 62),
(21, 63),
(21, 64),
(21, 65),
(21, 66),
(21, 67),
(21, 68),
(21, 69),
(21, 70),
(21, 71),
(21, 74),
(21, 96),
(21, 97),
(21, 98),
(21, 99),
(21, 100),
(21, 101),
(21, 102),
(21, 103),
(21, 104),
(21, 105),
(21, 106),
(21, 107),
(21, 108),
(21, 109),
(21, 110),
(21, 111),
(21, 112),
(21, 113),
(21, 114),
(21, 115),
(21, 116),
(21, 117),
(21, 118),
(21, 119),
(21, 120),
(21, 121),
(21, 122),
(21, 123),
(22, 27),
(22, 48),
(22, 70),
(22, 71),
(25, 27),
(25, 48),
(25, 50),
(25, 70),
(25, 71),
(35, 11),
(35, 12),
(35, 13),
(35, 14),
(35, 15),
(35, 16),
(35, 17),
(35, 18),
(35, 20),
(35, 24),
(35, 27),
(35, 28),
(35, 29),
(35, 30),
(35, 38),
(35, 40),
(35, 43),
(35, 44),
(35, 45),
(35, 46),
(35, 47),
(35, 48),
(35, 50),
(35, 51),
(35, 52),
(35, 53),
(35, 54),
(35, 55),
(35, 56),
(35, 57),
(35, 58),
(35, 59),
(35, 60),
(35, 61),
(35, 62),
(35, 63),
(35, 64),
(35, 65),
(35, 66),
(35, 67),
(35, 68),
(35, 69),
(35, 70),
(35, 71),
(35, 72),
(35, 73),
(35, 74),
(35, 75),
(35, 76),
(35, 77),
(35, 78),
(35, 79),
(35, 80),
(35, 81),
(35, 82),
(35, 83),
(35, 84),
(35, 85),
(35, 86),
(35, 87),
(35, 88),
(35, 89),
(35, 90),
(35, 91),
(35, 92),
(35, 93),
(35, 94),
(35, 95),
(35, 96),
(35, 97),
(35, 98),
(35, 99),
(35, 100),
(35, 101),
(35, 102),
(35, 103),
(35, 104),
(35, 105),
(35, 106),
(35, 107),
(35, 108),
(35, 109),
(35, 110),
(35, 111),
(35, 112),
(35, 113),
(35, 114),
(35, 115),
(35, 116),
(35, 117),
(35, 118),
(35, 119),
(35, 120),
(35, 121),
(35, 122),
(35, 123),
(35, 124),
(35, 125),
(35, 126),
(35, 127),
(35, 128),
(35, 129),
(35, 130),
(35, 131),
(35, 132),
(35, 133),
(35, 134),
(35, 135),
(35, 136),
(35, 137),
(35, 141),
(35, 142),
(35, 143),
(35, 144),
(35, 145),
(35, 146),
(35, 147),
(35, 148),
(43, 61),
(44, 11),
(44, 12),
(44, 13),
(44, 14),
(44, 15),
(44, 16),
(44, 17),
(44, 18),
(44, 20),
(44, 24),
(44, 27),
(44, 28),
(44, 29),
(44, 30),
(44, 38),
(44, 40),
(44, 43),
(44, 44),
(44, 45),
(44, 46),
(44, 47),
(44, 48),
(44, 50),
(44, 51),
(44, 52),
(44, 53),
(44, 55),
(44, 57),
(44, 58),
(44, 59),
(44, 60),
(44, 61),
(44, 62),
(44, 63),
(44, 64),
(44, 65),
(44, 66),
(44, 67),
(44, 68),
(44, 69),
(44, 70),
(44, 71),
(44, 73),
(44, 75),
(44, 76),
(44, 77),
(44, 78),
(44, 79),
(44, 80),
(44, 81),
(44, 82),
(44, 83),
(44, 84),
(44, 85),
(44, 86),
(44, 87),
(44, 88),
(44, 89),
(44, 90),
(44, 91),
(44, 92),
(44, 93),
(44, 94),
(44, 95),
(44, 124),
(44, 125),
(44, 126),
(44, 127),
(44, 128),
(44, 129),
(44, 130),
(44, 131),
(44, 132),
(45, 1),
(46, 1),
(47, 1),
(48, 56),
(49, 56),
(50, 56),
(51, 56),
(52, 56),
(53, 56),
(54, 56),
(55, 56),
(56, 56),
(57, 56),
(58, 56),
(59, 56),
(60, 56),
(61, 56),
(62, 56),
(63, 56),
(64, 56),
(65, 56),
(66, 56),
(67, 56),
(70, 56),
(71, 56),
(72, 56),
(73, 56),
(74, 56),
(75, 56),
(76, 56),
(77, 56),
(78, 56),
(79, 56),
(80, 56),
(81, 56),
(82, 56),
(83, 56),
(84, 56),
(85, 56),
(86, 56),
(87, 56),
(88, 56),
(89, 56),
(90, 56),
(91, 56),
(92, 56),
(95, 56),
(96, 56),
(97, 56),
(98, 56),
(99, 56),
(100, 56),
(101, 56),
(102, 56),
(103, 56),
(104, 56),
(105, 56),
(106, 56),
(107, 56),
(108, 56),
(109, 56),
(110, 56),
(111, 56),
(112, 56),
(113, 56),
(115, 56),
(117, 56),
(118, 56),
(119, 56),
(121, 54),
(122, 54),
(123, 54),
(124, 1),
(124, 11),
(124, 12),
(124, 13),
(124, 14),
(124, 15),
(124, 16),
(124, 17),
(124, 18),
(124, 20),
(124, 24),
(124, 27),
(124, 28),
(124, 29),
(124, 30),
(124, 38),
(124, 40),
(124, 43),
(124, 44),
(124, 45),
(124, 46),
(124, 47),
(124, 48),
(124, 50),
(124, 51),
(124, 52),
(124, 53),
(124, 54),
(124, 55),
(124, 57),
(124, 58),
(124, 59),
(124, 60),
(124, 61),
(124, 62),
(124, 63),
(124, 64),
(124, 65),
(124, 66),
(124, 67),
(124, 68),
(124, 69),
(124, 70),
(124, 71),
(124, 72),
(124, 73),
(124, 74),
(124, 75),
(124, 76),
(124, 77),
(124, 78),
(124, 79),
(124, 80),
(124, 81),
(124, 82),
(124, 83),
(124, 84),
(124, 85),
(124, 86),
(124, 87),
(124, 88),
(124, 89),
(124, 90),
(124, 91),
(124, 92),
(124, 93),
(124, 94),
(124, 95),
(124, 96),
(124, 97),
(124, 98),
(124, 99),
(124, 100),
(124, 101),
(124, 102),
(124, 103),
(124, 104),
(124, 105),
(124, 106),
(124, 107),
(124, 108),
(124, 109),
(124, 110),
(124, 111),
(124, 112),
(124, 113),
(124, 114),
(124, 115),
(124, 116),
(124, 117),
(124, 118),
(124, 119),
(124, 120),
(124, 121),
(124, 122),
(124, 123),
(124, 124),
(124, 125),
(124, 126),
(124, 127),
(124, 128),
(124, 129),
(124, 130),
(124, 131),
(124, 132),
(125, 1),
(125, 11),
(125, 12),
(125, 13),
(125, 14),
(125, 15),
(125, 16),
(125, 17),
(125, 18),
(125, 20),
(125, 24),
(125, 27),
(125, 28),
(125, 29),
(125, 30),
(125, 38),
(125, 40),
(125, 43),
(125, 44),
(125, 45),
(125, 46),
(125, 47),
(125, 48),
(125, 50),
(125, 51),
(125, 52),
(125, 53),
(125, 54),
(125, 55),
(125, 57),
(125, 58),
(125, 59),
(125, 60),
(125, 61),
(125, 62),
(125, 63),
(125, 64),
(125, 65),
(125, 66),
(125, 67),
(125, 68),
(125, 69),
(125, 70),
(125, 71),
(125, 72),
(125, 73),
(125, 74),
(125, 75),
(125, 76),
(125, 77),
(125, 78),
(125, 79),
(125, 80),
(125, 81),
(125, 82),
(125, 83),
(125, 84),
(125, 85),
(125, 86),
(125, 87),
(125, 88),
(125, 89),
(125, 90),
(125, 91),
(125, 92),
(125, 93),
(125, 94),
(125, 95),
(125, 96),
(125, 97),
(125, 98),
(125, 99),
(125, 100),
(125, 101),
(125, 102),
(125, 103),
(125, 104),
(125, 105),
(125, 106),
(125, 107),
(125, 108),
(125, 109),
(125, 110),
(125, 111),
(125, 112),
(125, 113),
(125, 114),
(125, 115),
(125, 116),
(125, 117),
(125, 118),
(125, 119),
(125, 120),
(125, 121),
(125, 122),
(125, 123),
(125, 124),
(125, 125),
(125, 126),
(125, 127),
(125, 128),
(125, 129),
(125, 130),
(125, 131),
(125, 132),
(126, 1),
(126, 11),
(126, 12),
(126, 13),
(126, 14),
(126, 15),
(126, 16),
(126, 17),
(126, 18),
(126, 20),
(126, 24),
(126, 27),
(126, 28),
(126, 29),
(126, 30),
(126, 38),
(126, 40),
(126, 43),
(126, 44),
(126, 45),
(126, 46),
(126, 47),
(126, 48),
(126, 50),
(126, 51),
(126, 52),
(126, 53),
(126, 54),
(126, 55),
(126, 57),
(126, 58),
(126, 59),
(126, 60),
(126, 61),
(126, 62),
(126, 63),
(126, 64),
(126, 65),
(126, 66),
(126, 67),
(126, 68),
(126, 69),
(126, 70),
(126, 71),
(126, 72),
(126, 73),
(126, 74),
(126, 75),
(126, 76),
(126, 77),
(126, 78),
(126, 79),
(126, 80),
(126, 81),
(126, 82),
(126, 83),
(126, 84),
(126, 85),
(126, 86),
(126, 87),
(126, 88),
(126, 89),
(126, 90),
(126, 91),
(126, 92),
(126, 93),
(126, 94),
(126, 95),
(126, 96),
(126, 97),
(126, 98),
(126, 99),
(126, 100),
(126, 101),
(126, 102),
(126, 103),
(126, 104),
(126, 105),
(126, 106),
(126, 107),
(126, 108),
(126, 109),
(126, 110),
(126, 111),
(126, 112),
(126, 113),
(126, 114),
(126, 115),
(126, 116),
(126, 117),
(126, 118),
(126, 119),
(126, 120),
(126, 121),
(126, 122),
(126, 123),
(126, 124),
(126, 125),
(126, 126),
(126, 127),
(126, 128),
(126, 129),
(126, 130),
(126, 131),
(126, 132),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(134, 61),
(135, 1),
(136, 61),
(137, 61);

-- --------------------------------------------------------

--
-- Table structure for table `#__newsfeeds`
--

DROP TABLE IF EXISTS `#__newsfeeds`;
CREATE TABLE IF NOT EXISTS `#__newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
);

--
-- Dumping data for table `#__newsfeeds`
--

INSERT INTO `#__newsfeeds` (`catid`, `id`, `name`, `alias`, `link`, `filename`, `published`, `numarticles`, `cache_time`, `checked_out`, `checked_out_time`, `ordering`, `rtl`) VALUES
(4, 1, 'Joomla! Announcements', 'joomla-official-news', 'http://feeds.joomla.org/JoomlaAnnouncements', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(4, 2, 'Joomla! Core Team Blog', 'joomla-core-team-blog', 'http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(4, 3, 'Joomla! Community Magazine', 'joomla-community-magazine', 'http://feeds.joomla.org/JoomlaMagazine', '', 1, 20, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(4, 4, 'Joomla! Developer News', 'joomla-developer-news', 'http://feeds.joomla.org/JoomlaDeveloper', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(4, 5, 'Joomla! Security News', 'joomla-security-news', 'http://feeds.joomla.org/JoomlaSecurityNews', '', 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(5, 6, 'Free Software Foundation Blogs', 'free-software-foundation-blogs', 'http://www.fsf.org/blogs/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0),
(5, 7, 'Free Software Foundation', 'free-software-foundation', 'http://www.fsf.org/news/RSS', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(5, 8, 'Software Freedom Law Center Blog', 'software-freedom-law-center-blog', 'http://www.softwarefreedom.org/feeds/blog/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(5, 9, 'Software Freedom Law Center News', 'software-freedom-law-center', 'http://www.softwarefreedom.org/feeds/news/', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(5, 10, 'Open Source Initiative Blog', 'open-source-initiative-blog', 'http://www.opensource.org/blog/feed', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 5, 0),
(6, 11, 'PHP News and Announcements', 'php-news-and-announcements', 'http://www.php.net/feed.atom', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 1, 0),
(6, 12, 'Planet MySQL', 'planet-mysql', 'http://www.planetmysql.org/rss20.xml', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 2, 0),
(6, 13, 'Linux Foundation Announcements', 'linux-foundation-announcements', 'http://www.linuxfoundation.org/press/rss20.xml', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 3, 0),
(6, 14, 'Mootools Blog', 'mootools-blog', 'http://feeds.feedburner.com/mootools-blog', NULL, 1, 5, 3600, 0, '0000-00-00 00:00:00', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `#__plugins`
--

DROP TABLE IF EXISTS `#__plugins`;
CREATE TABLE IF NOT EXISTS `#__plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
);

--
-- Dumping data for table `#__plugins`
--

INSERT INTO `#__plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE', 'tinymce', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', 'mode=advanced\nskin=0\ncompressed=0\ncleanup_startup=0\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=1\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=1\ncontextmenu=1\ninlinepopups=1\nsafari=1\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(34, 'System - RokCandy', 'rokcandy_system', 'system', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(35, 'Button - RokCandy', 'rokcandy_button', 'editors-xtd', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(36, 'RokNavMenu - Boost', 'boost', 'roknavmenu', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(37, 'RokNavMenu - Extended Link', 'extendedlink', 'roknavmenu', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(38, 'Content - RokBox', 'rokbox', 'content', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'thumb_ext=_thumb\nthumb_class=album\nthumb_dir=cache\nthumb_width=150\nthumb_height=100\nthumb_quality=90\n'),
(39, 'System - RokBox', 'rokbox', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'theme=light\ncustom-theme=sample\n'),
(40, 'System - RokGantry Cache', 'rokgantrycache', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(41, 'System - RokGZipper', 'rokgzipper', 'system', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'cache_time=900\nexpires_header_time=1440\nstrip_css=1\n'),
(42, 'Editor - RokPad', 'rokpad', 'editors', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '@spacer=<div id="parser-type"   style="font-weight:normal;font-size:12px;color:#fff;padding:4px;margin:0;background:#666;">Parser Type</div>\nrokpad-parser=xhtmlmixed\nrokpad-tidylevel=XHTML 1.0 Transitional\nrokpad-show-formatter=1\n@spacer=<div id="editor-parameters"   style="font-weight:normal;font-size:12px;color:#fff;padding:4px;margin:0;background:#666;">Editor Parameters</div>\nrokpad-height=350\nrokpad-passdelay=200\nrokpad-passtime=50\nrokpad-linenumberdelay=200\nrokpad-linenumbertime=50\nrokpad-continuous=500\nrokpad-matchparens=1\nrokpad-history=50\nrokpad-history-delay=800\nrokpad-lineHandler=1\nrokpad-textwrapperHandler=1\nrokpad-indentunit=2\nrokpad-tabmode=indent\nrokpad-loadindent=1\n'),
(43, 'Content - RokStyle Access', 'rokstyle', 'content', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `#__polls`
--

DROP TABLE IF EXISTS `#__polls`;
CREATE TABLE IF NOT EXISTS `#__polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
);

--
-- Dumping data for table `#__polls`
--

INSERT INTO `#__polls` (`id`, `title`, `alias`, `voters`, `checked_out`, `checked_out_time`, `published`, `access`, `lag`) VALUES
(14, 'Joomla! is used for?', 'joomla-is-used-for', 17, 0, '0000-00-00 00:00:00', 1, 0, 86400),
(15, 'Favourite Web Browser', 'favourite-web-browser', 7, 0, '0000-00-00 00:00:00', 1, 0, 86400);

-- --------------------------------------------------------

--
-- Table structure for table `#__poll_data`
--

DROP TABLE IF EXISTS `#__poll_data`;
CREATE TABLE IF NOT EXISTS `#__poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
);

--
-- Dumping data for table `#__poll_data`
--

INSERT INTO `#__poll_data` (`id`, `pollid`, `text`, `hits`) VALUES
(1, 14, 'Community Sites', 3),
(2, 14, 'Public Brand Sites', 4),
(3, 14, 'eCommerce', 1),
(4, 14, 'Blogs', 0),
(5, 14, 'Intranets', 0),
(6, 14, 'Photo and Media Sites', 3),
(7, 14, 'All of the Above!', 6),
(8, 14, '', 0),
(9, 14, '', 0),
(10, 14, '', 0),
(11, 14, '', 0),
(12, 14, '', 0),
(13, 15, 'Mozilla Firefox', 3),
(14, 15, 'Apple Safari', 3),
(15, 15, 'Google Chrome', 1),
(16, 15, 'Internet Explorer 8', 0),
(17, 15, 'Other', 0),
(18, 15, '', 0),
(19, 15, '', 0),
(20, 15, '', 0),
(21, 15, '', 0),
(22, 15, '', 0),
(23, 15, '', 0),
(24, 15, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `#__poll_date`
--

DROP TABLE IF EXISTS `#__poll_date`;
CREATE TABLE IF NOT EXISTS `#__poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
);

--
-- Dumping data for table `#__poll_date`
--

INSERT INTO `#__poll_date` (`id`, `date`, `vote_id`, `poll_id`) VALUES
(1, '2006-10-09 13:01:58', 1, 14),
(2, '2006-10-10 15:19:43', 7, 14),
(3, '2006-10-11 11:08:16', 7, 14),
(4, '2006-10-11 15:02:26', 2, 14),
(5, '2006-10-11 15:43:03', 7, 14),
(6, '2006-10-11 15:43:38', 7, 14),
(7, '2006-10-12 00:51:13', 2, 14),
(8, '2007-05-10 19:12:29', 3, 14),
(9, '2007-05-14 14:18:00', 6, 14),
(10, '2007-06-10 15:20:29', 6, 14),
(11, '2007-07-03 12:37:53', 2, 14),
(12, '2010-03-29 11:54:09', 2, 14),
(13, '2010-03-29 13:45:19', 13, 15),
(14, '2010-03-29 15:04:57', 14, 15),
(15, '2010-03-29 15:05:10', 7, 14),
(16, '2010-03-29 17:46:31', 14, 15),
(17, '2010-03-29 17:46:49', 13, 15),
(18, '2010-03-29 21:18:36', 15, 15),
(19, '2010-03-30 01:57:58', 6, 14),
(20, '2010-03-30 07:50:27', 13, 15),
(21, '2010-03-30 12:48:59', 14, 15),
(22, '2010-03-31 02:48:14', 7, 14),
(23, '2010-03-31 13:00:16', 7, 14),
(24, '2010-03-31 16:16:30', 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `#__poll_menu`
--

DROP TABLE IF EXISTS `#__poll_menu`;
CREATE TABLE IF NOT EXISTS `#__poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
);

--
-- Dumping data for table `#__poll_menu`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__rokcandy`
--

DROP TABLE IF EXISTS `#__rokcandy`;
CREATE TABLE IF NOT EXISTS `#__rokcandy` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL,
  `macro` text NOT NULL,
  `html` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `checked_out` int(11) NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `ordering` int(11) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
);

--
-- Dumping data for table `#__rokcandy`
--

INSERT INTO `#__rokcandy` (`id`, `catid`, `macro`, `html`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`) VALUES
(20, 35, '[code]{text}[/code]', '<code>{text}</code>', 1, 0, '0000-00-00 00:00:00', 7, ''),
(21, 35, '[i]{text}[/i]', '<em>{text}</em>', 1, 0, '0000-00-00 00:00:00', 6, ''),
(22, 35, '[b]{text}[/b]', '<strong>{text}</strong>', 1, 0, '0000-00-00 00:00:00', 5, ''),
(23, 35, '[h4]{text}[/h4]', '<h4>{text}</h4>', 1, 0, '0000-00-00 00:00:00', 4, ''),
(24, 35, '[h1]{text}[/h1]', '<h1>{text}</h1>', 1, 0, '0000-00-00 00:00:00', 1, ''),
(25, 35, '[h2]{text}[/h2]', '<h2>{text}</h2>', 1, 0, '0000-00-00 00:00:00', 2, ''),
(26, 35, '[h3]{text}[/h3]', '<h3>{text}</h3>', 1, 0, '0000-00-00 00:00:00', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `#__sections`
--

DROP TABLE IF EXISTS `#__sections`;
CREATE TABLE IF NOT EXISTS `#__sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
);

--
-- Dumping data for table `#__sections`
--

INSERT INTO `#__sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'News', '', 'news', 'articles.jpg', 'content', 'right', 'Select a news topic from the list below, then select a news article to read.', 1, 0, '0000-00-00 00:00:00', 3, 0, 2, ''),
(3, 'FAQs', '', 'faqs', 'key.jpg', 'content', 'left', 'From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.', 1, 0, '0000-00-00 00:00:00', 5, 0, 23, ''),
(4, 'About Joomla!', '', 'about-joomla', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 2, 0, 14, ''),
(5, 'Demo Content', '', 'demo-content', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 6, 0, 1, ''),
(6, 'RokStories', '', 'rokstories', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 7, 0, 2, ''),
(7, 'RokTabs', '', 'roktabs', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 8, 0, 2, ''),
(8, 'RokNewsPager', '', 'roknewspager', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 9, 0, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `#__session`
--

DROP TABLE IF EXISTS `#__session`;
CREATE TABLE IF NOT EXISTS `#__session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
);

-- --------------------------------------------------------

--
-- Table structure for table `#__stats_agents`
--

DROP TABLE IF EXISTS `#__stats_agents`;
CREATE TABLE IF NOT EXISTS `#__stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
);

--
-- Dumping data for table `#__stats_agents`
--


-- --------------------------------------------------------

--
-- Table structure for table `#__templates_menu`
--

DROP TABLE IF EXISTS `#__templates_menu`;
CREATE TABLE IF NOT EXISTS `#__templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
);

--
-- Dumping data for table `#__templates_menu`
--

INSERT INTO `#__templates_menu` (`template`, `menuid`, `client_id`) VALUES
('rt_quantive_j15', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `#__users`
--

DROP TABLE IF EXISTS `#__users`;
CREATE TABLE IF NOT EXISTS `#__users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
);

-- --------------------------------------------------------

--
-- Table structure for table `#__weblinks`
--

DROP TABLE IF EXISTS `#__weblinks`;
CREATE TABLE IF NOT EXISTS `#__weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
);

--
-- Dumping data for table `#__weblinks`
--

INSERT INTO `#__weblinks` (`id`, `catid`, `sid`, `title`, `alias`, `url`, `description`, `date`, `hits`, `published`, `checked_out`, `checked_out_time`, `ordering`, `archived`, `approved`, `params`) VALUES
(1, 2, 0, 'Joomla!', 'joomla', 'http://www.joomla.org', 'Home of Joomla!', '2005-02-14 15:19:02', 5, 1, 0, '0000-00-00 00:00:00', 1, 0, 1, 'target=0'),
(2, 2, 0, 'php.net', 'php', 'http://www.php.net', 'The language that Joomla! is developed in', '2004-07-07 11:33:24', 8, 1, 0, '0000-00-00 00:00:00', 3, 0, 1, ''),
(3, 2, 0, 'MySQL', 'mysql', 'http://www.mysql.com', 'The database that Joomla! uses', '2004-07-07 10:18:31', 3, 1, 0, '0000-00-00 00:00:00', 5, 0, 1, ''),
(4, 2, 0, 'OpenSourceMatters', 'opensourcematters', 'http://www.opensourcematters.org', 'Home of OSM', '2005-02-14 15:19:02', 13, 1, 0, '0000-00-00 00:00:00', 2, 0, 1, 'target=0'),
(5, 2, 0, 'Joomla! - Forums', 'joomla-forums', 'http://forum.joomla.org', 'Joomla! Forums', '2005-02-14 15:19:02', 6, 1, 0, '0000-00-00 00:00:00', 4, 0, 1, 'target=0'),
(6, 2, 0, 'Ohloh Tracking of Joomla!', 'ohloh-tracking-of-joomla', 'http://www.ohloh.net/projects/20', 'Objective reports from Ohloh about Joomla''s development activity. Joomla! has some star developers with serious kudos.', '2007-07-19 09:28:31', 3, 1, 0, '0000-00-00 00:00:00', 6, 0, 1, 'target=0\n\n');
