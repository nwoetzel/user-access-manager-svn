<?php
//---Lang Settings---
define('TXT_SETTINGS', __('Settings', 'user-access-manager'));

define('TXT_POST_SETTING', __('Post settings', 'user-access-manager'));
define('TXT_POST_SETTING_DESC', __('Set up the behaviour of locked posts', 'user-access-manager'));
define('TXT_POST_TITLE', __('Post title', 'user-access-manager'));
define('TXT_POST_TITLE_DESC', __('Displayed text as post title if user has no access', 'user-access-manager'));
define('TXT_DISPLAY_POST_TITLE', __('Hide post titel', 'user-access-manager'));
define('TXT_DISPLAY_POST_TITLE_DESC', sprintf(__('Selecting "Yes" will show the text which is defined at "%s" if user has no access.', 'user-access-manager'), TXT_POST_TITLE));
define('TXT_POST_CONTENT', __('Post content', 'user-access-manager'));
define('TXT_POST_CONTENT_DESC', __('Content displayed if user has no access. You can add an login-form by adding the keyword <b>[LOGIN_FORM]</b>. This form will shown on single posts, otherwise a link will shown.', 'user-access-manager'));
define('TXT_SHOW_POST_CONTENT_BEFORE_MORE', __('Show post content before &lt;!--more--&gt; tag', 'user-access-manager'));
define('TXT_SHOW_POST_CONTENT_BEFORE_MORE_DESC', sprintf(__('Shows the post content before the &lt;!--more--&gt; tag and after that the defined text at "%s". If no &lt;!--more--&gt; is set he defined text at "%s" will shown.', 'user-access-manager'), TXT_POST_CONTENT, TXT_POST_CONTENT));
define('TXT_HIDE_POST', __('Hide complete posts', 'user-access-manager'));
define('TXT_HIDE_POST_DESC', __('Selecting "Yes" will hide posts if the user has no access.', 'user-access-manager'));
define('TXT_POST_COMMENT_CONTENT', __('Post commtent text', 'user-access-manager'));
define('TXT_POST_COMMENT_CONTENT_DESC', __('Displayed text as post comment text if user has no access', 'user-access-manager'));
define('TXT_DISPLAY_POST_COMMENT', __('Hide post comments', 'user-access-manager'));
define('TXT_DISPLAY_POST_COMMENT_DESC', sprintf(__('Selecting "Yes" will show the text which is defined at "%s" if user has no access.', 'user-access-manager'), TXT_POST_COMMENT_CONTENT) );
define('TXT_ALLOW_COMMENTS_LOCKED', __('Allow comments', 'user-access-manager'));
define('TXT_ALLOW_COMMENTS_LOCKED_DESC', __('Selecting "yes" allows users to comment on locked posts', 'user-access-manager'));

define('TXT_PAGE_SETTING', __('Page settings', 'user-access-manager'));
define('TXT_PAGE_SETTING_DESC', __('Set up the behaviour of locked pages', 'user-access-manager'));
define('TXT_PAGE_TITLE', __('Page title', 'user-access-manager'));
define('TXT_PAGE_TITLE_DESC', __('Displayed text as page title if user has no access', 'user-access-manager'));
define('TXT_DISPLAY_PAGE_TITLE', __('Hide page titel', 'user-access-manager'));
define('TXT_DISPLAY_PAGE_TITLE_DESC', sprintf(__('Selecting "Yes" will show the text which is defined at "%s" if user has no access.', 'user-access-manager'), TXT_POST_TITLE));
define('TXT_PAGE_CONTENT', __('Page content', 'user-access-manager'));
define('TXT_PAGE_CONTENT_DESC', __('Content displayed if user has no access. You can add an login-form by adding the keyword <b>[LOGIN_FORM]</b>. This form will shown on single pages, otherwise a link will shown.', 'user-access-manager'));
define('TXT_HIDE_PAGE', __('Hide complete pages', 'user-access-manager'));
define('TXT_HIDE_PAGE_DESC', __('Selecting "Yes" will hide pages if the user has no access. Pages will also hide in the navigation.', 'user-access-manager'));

define('TXT_FILE_SETTING', __('File settings', 'user-access-manager'));
define('TXT_FILE_SETTING_DESC', __('Set up the behaviour of files', 'user-access-manager'));
define('TXT_LOCK_FILE', __('Lock files', 'user-access-manager'));
define('TXT_LOCK_FILE_DESC', __('If you select "Yes" all files will locked by a .htaccess file and only users with access can download files.', 'user-access-manager'));
define('TXT_SELECTED_FILE_TYPES', __('Filetypes to lock: ', 'user-access-manager'));
define('TXT_NOT_SELECTED_FILE_TYPES', __('Filetypes not to lock: ', 'user-access-manager'));
define('TXT_DOWNLOAD_FILE_TYPE', __('Locked file types', 'user-access-manager'));
define('TXT_DOWNLOAD_FILE_TYPE_DESC', __('Lock all files, type in file types which you will lock if the post/page is locked or define file types which will not be locked. <b>Note:</b> If you have no problems use all to get the maximum security.', 'user-access-manager'));
define('TXT_FILE_PASS_TYPE', __('.htaccess password', 'user-access-manager'));
define('TXT_FILE_PASS_TYPE_DESC', __('Set up the password for the .htaccess access. This password is only needed if you need a direct access to your files.', 'user-access-manager'));
define('TXT_RANDOM_PASS', __('Use a random generated pass word.', 'user-access-manager'));
define('TXT_CURRENT_LOGGEDIN_ADMIN_PASS', __('Use the password of the current logged in admin.', 'user-access-manager'));
define('TXT_DOWNLOAD_TYPE', __('Download type', 'user-access-manager'));
define('TXT_DOWNLOAD_TYPE_DESC', __('Selecting the type for downloading. <strong>Note:</strong> For using fopen you need "safe_mode = off".', 'user-access-manager'));
define('TXT_NORMAL', __('Normal', 'user-access-manager'));
define('TXT_FOPEN', __('fopen', 'user-access-manager'));

define('TXT_OTHER_SETTING', __('Other settings', 'user-access-manager'));
define('TXT_OTHER_SETTING_DESC', __('Here you will find all other settings', 'user-access-manager'));
define('TXT_PROTECT_FEED', __('Protect Feed', 'user-access-manager'));
define('TXT_PROTECT_FEED_DESC', __('Selecting "Yes" will also protect your feed entries.', 'user-access-manager'));
define('TXT_HIDE_EMPTY_CATEGORIES', __('Hide empty categories', 'user-access-manager'));
define('TXT_HIDE_EMPTY_CATEGORIES_DESC', __('Selecting "Yes" will hide empty categories which are containing only empty childs or no childs.', 'user-access-manager'));
define('TXT_REDIRECT', __('Redirect user', 'user-access-manager'));
define('TXT_REDIRECT_DESC', __('Setup what happen if a user visit a post/page with no access.', 'user-access-manager'));
define('TXT_REDIRECT_TO_BOLG', __('To blog startpage', 'user-access-manager'));
define('TXT_REDIRECT_TO_PAGE', __('Custom page: ', 'user-access-manager'));
define('TXT_REDIRECT_TO_URL', __('Custom URL: ', 'user-access-manager'));
define('TXT_LOCK_RECURSIVE', __('Lock recursive', 'user-access-manager'));
define('TXT_LOCK_RECURSIVE_DESC', __('Selecting "Yes" will lock all child posts/pages of a post/page if a user has no access to the parent page. Note: Setting this option to "No" could result in display errors relating to the hierarchy.', 'user-access-manager'));
define('TXT_BLOG_ADMIN_HINT_TEXT', __('Admin hint text', 'user-access-manager'));
define('TXT_BLOG_ADMIN_HINT_TEXT_DESC', __('The text which will shown behinde the post/page.', 'user-access-manager'));
define('TXT_BLOG_ADMIN_HINT', __('Show admin hint at Posts', 'user-access-manager'));
define('TXT_BLOG_ADMIN_HINT_DESC', sprintf(__('Selecting "Yes" will show the defined text at "%s" behinde the post/page to an logged in admin to show him which posts/pages are locked if he visits his blog.', 'user-access-manager'), TXT_BLOG_ADMIN_HINT_TEXT));
define('TXT_FULL_ACCESS_LEVEL', __('Access Level with full access', 'user-access-manager'));
define('TXT_FULL_ACCESS_LEVEL_DESC', __('All user with access level equal or higher to this has full access. <b>Note: 10 is the highest value.</b>', 'user-access-manager'));
define('TXT_CORE_MOD', __('Core modifications installed?', 'user-access-manager'));
define('TXT_CORE_MOD_DESC', __('If you installed the core modifications activated this option.', 'user-access-manager'));

define('TXT_YES', __('Yes', 'user-access-manager'));
define('TXT_NO', __('No', 'user-access-manager'));

define('TXT_UPDATE_SETTING', __('Update settings', 'user-access-manager'));
define('TXT_UPDATE_SETTINGS', __('Settings updated.', 'user-access-manager'));

//---Access groups---

define('TXT_MANAGE_GROUP', __('Manage user access groups', 'user-access-manager'));
define('TXT_GROUP_ROLE', __('Role affiliation', 'user-access-manager'));
define('TXT_NAME', __('Name', 'user-access-manager'));
define('TXT_DESCRIPTION', __('Description', 'user-access-manager'));
define('TXT_READ_ACCESS', __('Read access', 'user-access-manager'));
define('TXT_WRITE_ACCESS', __('Write access', 'user-access-manager'));
define('TXT_POSTS', __('Posts', 'user-access-manager'));
define('TXT_PAGES', __('Pages', 'user-access-manager'));
define('TXT_FILES', __('Files', 'user-access-manager'));
define('TXT_CATEGORY', __('Categories', 'user-access-manager'));
define('TXT_USERS', __('Users', 'user-access-manager'));
define('TXT_DELETE', __('Delete', 'user-access-manager'));
define('TXT_UPDATE_GROUP', __('Update group', 'user-access-manager'));
define('TXT_ADD', __('Add', 'user-access-manager'));
define('TXT_ADD_GROUP', __('Add access group', 'user-access-manager'));
define('TXT_GROUP_NAME', __('Access group name', 'user-access-manager'));
define('TXT_GROUP_NAME_DESC', __('The name is used to identify the access user group.', 'user-access-manager'));
define('TXT_GROUP_DESC', __('Access group description', 'user-access-manager'));
define('TXT_GROUP_DESC_DESC', __('The description of the group.', 'user-access-manager'));
define('TXT_GROUP_IP_RANGE', __('IP range', 'user-access-manager'));
define('TXT_GROUP_IP_RANGE_DESC', __('Type in the IP ranges of users which are join these groups by there IP address without loggin. Set ranges like "BEGIN"-"END", seperate ranges by using ";", single IPs are also allowded. Example: 192.168.0.1-192.168.0.10;192.168.0.20-192.168.0.30', 'user-access-manager'));
define('TXT_GROUP_READ_ACCESS', __('Read access', 'user-access-manager'));
define('TXT_GROUP_READ_ACCESS_DESC', __('The read access.', 'user-access-manager'));
define('TXT_GROUP_WRITE_ACCESS', __('Write access', 'user-access-manager'));
define('TXT_GROUP_WRITE_ACCESS_DESC', __('The write access.', 'user-access-manager'));
define('TXT_GROUP_ADDED', __('Group was added successfully.', 'user-access-manager'));
define('TXT_DEL_GROUP', __('Group(s) was deleted successfully.', 'user-access-manager'));
define('TXT_NONE', __('none', 'user-access-manager')); 
define('TXT_ACCESS_GROUP_EDIT_SUC', __('Access group edit successfully.', 'user-access-manager'));
define('TXT_CONTAIN_POSTS', __('Contains %1$s of %2$s posts', 'user-access-manager'));
define('TXT_CONTAIN_PAGES', __('Contains %1$s of %2$s pages', 'user-access-manager'));
define('TXT_CONTAIN_FILES', __('Contains %1$s of %2$s files', 'user-access-manager'));
define('TXT_CONTAIN_CATEGORIES', __('Contains %1$s of %2$s categories', 'user-access-manager'));
define('TXT_CONTAIN_USERS', __('Contains %1$s of %2$s users', 'user-access-manager'));
define('TXT_IP_RANGE', __('IP range', 'user-access-manager'));

//---Misc---
define('TXT_FULL_ACCESS', __('Full access', 'user-access-manager'));
define('TXT_FULL_ACCESS_ADMIN', __('Full access (Administrator)', 'user-access-manager'));
define('TXT_NO_GROUP', __('No group', 'user-access-manager'));
define('TXT_SET_ACCESS', __('Set access', 'user-access-manager'));

define('TXT_DATE', __('Date', 'user-access-manager'));
define('TXT_TITLE', __('Title', 'user-access-manager'));
define('TXT_GROUP_ACCESS', __('Group access', 'user-access-manager'));
define('TXT_USERNAME', __('Username', 'user-access-manager'));

define('TXT_MAIL', __('E-mail', 'user-access-manager'));
define('TXT_ACCESS', __('Access', 'user-access-manager'));
define('TXT_ADMIN_HINT', __('<strong>Note:</strong> An administrator has allways access to all posts/pages.', 'user-access-manager'));

define('TXT_SET_POST_ACCESS', __('Set post access', 'user-access-manager'));
define('TXT_SET_PAGE_ACCESS', __('Set page access', 'user-access-manager'));
define('TXT_GROUPS', __('Access Groups', 'user-access-manager'));
define('TXT_CREATE_GROUP_FIRST', __('Please create a access group first.', 'user-access-manager'));
define('TXT_SET_USER_ACCESS', __('Set user access', 'user-access-manager'));

define('TXT_SET_UP_USERGROUPS', __('Set up usergroups', 'user-access-manager'));

define('TXT_ITSELF', __('itself', 'user-access-manager'));
define('TXT_INFO', __('Info', 'user-access-manager'));
define('TXT_GROUP_INFO', __('Group infos', 'user-access-manager'));
define('TXT_GROUP_LOCK_INFO', __('Locked by', 'user-access-manager'));
define('TXT_IS_ADMIN', __('User is Admin. Full access.', 'user-access-manager'));
define('TXT_EXPAND', __('expand', 'user-access-manager'));
define('TXT_EXPAND_ALL', __('expand all', 'user-access-manager'));
define('TXT_COLLAPS', __('collaps', 'user-access-manager'));
define('TXT_COLLAPS_ALL', __('collaps all', 'user-access-manager'));
define('TXT_ALL', __('all', 'user-access-manager'));
define('TXT_ONLY_GROUP_USERS', __('only group users', 'user-access-manager'));

define('TXT_SETUP', __('Setup', 'user-access-manager'));
define('TXT_RESET_UAM', __('Reset User Access Manager', 'user-access-manager'));
define('TXT_RESET_UAM_DESC', __('Warning: The reset of the User Access Manager can not be undone. All settings and user groups will permanently lost.', 'user-access-manager'));
define('TXT_RESET', __('reset', 'user-access-manager'));
define('TXT_UAM_RESET_SUC', __('User Access Manager was reset successfully', 'user-access-manager'));
?>