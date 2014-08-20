<?php
/**
 * This file is part of the user-access-manager, a plugin for WordPress.
 *
 */

if (!defined('ABSPATH')) {
    die();
}

/**
 * manage groups in the user-access-manager plugin
 *
 * @package wp-cli
 * @subpackage commands/community
 * @maintainer nwoetzel
 */
class Groups_Command extends WP_CLI_Command {

    protected $obj_type = 'UamUserGroup';
    protected $obj_fields = array(
            'id',
            TXT_UAM_NAME,
            TXT_UAM_DESCRIPTION,
            TXT_UAM_READ_ACCESS,
            TXT_UAM_WRITE_ACCESS,
            TXT_UAM_GROUP_ROLE,
            TXT_UAM_IP_RANGE,
    );

    /**
     * list groups
     *
     * ## OPTIONS
     *
	 * [--format=<format>]
	 * : Accepted values: table, csv, json, count, ids. Default: table
	 *
     * ## EXAMPLES
     *
     * wp groups list
     *
     * @subcommand list
     */
    public function list_( $_, $assoc_args) {
        global $oUserAccessManager;
        $aUamUserGroups = $oUserAccessManager->getAccessHandler()->getUserGroups();

        if (!isset($aUamUserGroups)) {
            WP_CLI:error( "no groups defined yet!");
        }

        $groups = array();

        foreach ($aUamUserGroups as $oUamUserGroup) {
            $group = array();
            $group[ 'id'] = $oUamUserGroup->getId();
            $group[ TXT_UAM_NAME] = $oUamUserGroup->getGroupName();
   			$group[ TXT_UAM_DESCRIPTION] = $oUamUserGroup->getGroupDesc();
            $group[ TXT_UAM_READ_ACCESS] = $oUamUserGroup->getReadAccess();
            $group[ TXT_UAM_WRITE_ACCESS] = $oUamUserGroup->getWriteAccess();
            $group[ TXT_UAM_GROUP_ROLE] = implode( ",", array_keys( $oUamUserGroup->getObjectsFromType('role')));
            $group[ TXT_UAM_IP_RANGE] = $oUamUserGroup->getIpRange() == null ? "" : $oUamUserGroup->getIpRange();

            // add current group
            $groups[] = $group;
        }

        $formatter = $this->get_formatter( $assoc_args );
        $formatter->display_items( $groups );
    }

    /**
     * delete groups
     *
     * ## OPTIONS
     *
     * ## EXAMPLES
     *
     * wp groups del 3 5
     *
     * @subcommand del
     */
    public function del( $_, $assoc_args) {
        global $oUserAccessManager;

        if( count( $_) < 1) {
            WP_CLI::error("Expected: wp uam groups del <id> ..");
        }

        foreach ($_ as $delId) {
            if ($oUserAccessManager->getAccessHandler()->getUserGroups($delId) == null) {
                WP_CLI::error( "no group with this id: " . $delId);
            }
            $oUserAccessManager->getAccessHandler()->deleteUserGroup($delId);
        }
        WP_CLI::success( "successfully deleted groups: " . implode( " ", $_));
    }

    protected function get_formatter( &$assoc_args ) {
        return new \WP_CLI\Formatter( $assoc_args, $this->obj_fields, $this->obj_type );
    }

}

// add the command
WP_CLI::add_command( 'uam groups', 'Groups_Command' );
