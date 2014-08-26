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
class Groups_Command extends \WP_CLI\CommandWithDBObject {
    private static $aAllowedAccessValues = array( "group", "all");

    protected $obj_type = 'uam_accessgroup';
    protected $obj_fields = array(
            'ID',
            'groupname',
            'groupdesc',
            'read_access',
            'write_access',
            'roles',
            'ip_range',
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
     * wp uam groups list
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
            $group[ 'ID'          ] = $oUamUserGroup->getId();
            $group[ 'groupname'   ] = $oUamUserGroup->getGroupName();
            $group[ 'groupdesc'   ] = $oUamUserGroup->getGroupDesc();
            $group[ 'read_access' ] = $oUamUserGroup->getReadAccess();
            $group[ 'write_access'] = $oUamUserGroup->getWriteAccess();
            $group[ 'roles'       ] = implode( ",", array_keys( $oUamUserGroup->getObjectsFromType('role')));
            $group[ 'ip_range'    ] = $oUamUserGroup->getIpRange() == null ? "" : $oUamUserGroup->getIpRange();

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
     * <group_id>
     * : id of the group(s) to delete; accepts unlimited ids
     *
     * ## EXAMPLES
     *
     * wp uam groups del 3 5
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

    /**
     * add group
     *
     * ## OPTIONS
     * <groupname>
     * : the name of the new group
     *
     * [--porcelain]
     * : Output just the new post id.
     *
     * [--roles=<list>]
     * : comma seperated list of group associated roles
     *
     * [--<field>=<value>]
     * : Associative args for new UamUserGroup object
     * allowed fields and values are: groupdesc="", read_access={group,all*}, write_access={group,all*}, ip_range="192.168.0.1-192.168.0.10;192.168.0.20-192.168.0.30"
     * *=default
     *
     * ## EXAMPLES
     *
     * wp uam groups add fighters --read_access=all
     *
     */
    public function add( $_, $assoc_args) {
        global $oUserAccessManager;

        $porcelain = isset( $assoc_args[ "porcelain"]);

        $groupname      = $_[0];

        $aUamUserGroups = $oUserAccessManager->getAccessHandler()->getUserGroups();

        foreach ($aUamUserGroups as $oUamUserGroup) {
            if( $oUamUserGroup->getGroupName() == $groupname) {
                WP_CLI::error( "group with the same name already exists: " . $oUamUserGroup->getId());
            }
        }

        $groupdesc      = $assoc_args[ 'groupdesc'];
        $read_access    = $assoc_args[ 'read_access'];
        $write_access   = $assoc_args[ 'write_access'];
        $ip_range       = $assoc_args[ 'ip_range'];

        $oUamUserGroup = new UamUserGroup($oUserAccessManager->getAccessHandler(), null);

        if( !in_array( $read_access, self::$aAllowedAccessValues)) {
            if( !$porcelain) {
                WP_CLI::line( "setting read_access to ".self::$aAllowedAccessValues[0]);
            }
            $read_access = self::$aAllowedAccessValues[0];
        }

        if( !in_array( $write_access, self::$aAllowedAccessValues)) {
            if( !$porcelain) {
                WP_CLI::line( "setting write_access to ".self::$aAllowedAccessValues[0]);
            }
            $write_access = self::$aAllowedAccessValues[0];
        }

        $oUamUserGroup->setGroupName(   $groupname);
        $oUamUserGroup->setGroupDesc(   $groupdesc);
        $oUamUserGroup->setReadAccess(  $read_access);
        $oUamUserGroup->setWriteAccess( $write_access);
        $oUamUserGroup->setIpRange(     $ip_range);

        // add roles
        if( isset( $assoc_args[ 'roles'])) {
            $roles = explode( ",", $assoc_args[ 'roles']);

            $oUamUserGroup->unsetObjects('role', true);

            foreach ($roles as $role) {
                $oUamUserGroup->addObject('role', $role);
            }
        }

        $oUamUserGroup->save();

        $oUserAccessManager->getAccessHandler()->addUserGroup($oUamUserGroup);

        if( $porcelain) {
            WP_CLI::line( $oUamUserGroup->getId());
        }
        else {
            WP_CLI::success( "added new group " . $groupname . " with id " . $oUamUserGroup->getId());
        }
    }
}

/**
 * manage objects in the user-access-manager plugin
 *
 * @package wp-cli
 * @subpackage commands/community
 * @maintainer nwoetzel
 */
class Objects_Command extends WP_CLI_Command {

    /**
     * update groups for an object
     *
     * ## OPTIONS
     *
     * <operation>
     * : 'add', 'remove' or 'update'
     *
     * <object_type>
     * : 'page', 'post', 'user', 'role' or 'category'
     *
     * <object_id>
     * : the id of the object (string for role)
     *
     * [--groups=<list>]
     * : comma seperated list of group names or ids to add,remove of upate to for the object
     *
     * ## EXAMPLES
     *
     * wp uam object add    user     1      --groups=fighters,loosers
     * wp uam object remove role     author --groups=figthers
     * wp uam object update category 5      --groups=controller
     *
     */
    public function __invoke( $_, $assoc_args) {
        $sOperation  = $_[0];
        $sObjectType = $_[1];
        $sObjectId   = $_[2];

        // check that operation is valid
        switch ( $sOperation) {
            case "add":
                break;
            case "update":
                break;
            case "remove":
                break;
            default:
                WP_CLI::error( "operation is not valid: " . $sOperation);
        }

        global $oUserAccessManager;
        $oUamAccessHandler = $oUserAccessManager->getAccessHandler();

        // groups passes
        $groups = array_unique( explode( ",", $assoc_args[ 'groups']));

        // convert the string to and associative array of index and group
        $aAddUserGroups = array();
        $aUamUserGroups = $oUamAccessHandler->getUserGroups();

        // find the UserGroup object for the ids or strings given on the commandline
        foreach( $groups as $group) {
            if( is_numeric( $group)) {
                $oUamUserGroup = $oUamAccessHandler->getUserGroups( $group);
                if( !$oUamUserGroup) {
                    WP_CLI::error( "there is no group with the id: " . $group);
                }
                $aAddUserGroups[ $group] = $oUamUserGroup;
            } else {
                $found = false;
                foreach( $aUamUserGroups as $oUamUserGroup) {
                    if( $oUamUserGroup->getGroupName() == $group) {
                        $aAddUserGroups[ $oUamUserGroup->getId()] = $oUamUserGroup;
                        $found = true;
                        break;
                    }
                }
                if( !$found) {
                    WP_CLI::error( "there is no group with the name: " . $group);
                }
            }
        }

        $aRemoveUserGroups = $oUamAccessHandler->getUserGroupsForObject($sObjectType, $sObjectId);
        $blRemoveOldAssignments = true;

        switch ( $sOperation) {
            case "add":
                $blRemoveOldAssignments = false;
                break;
            case "update":
                break;
            case "remove":
                $aRemoveUserGroups = $aAddUserGroups;
                $aAddUserGroups = array();
                break;
            default:
                WP_CLI::error( "operation is not valid: " . $sOperation);
        }

        foreach ($aUamUserGroups as $sGroupId => $oUamUserGroup) {
            if (isset($aRemoveUserGroups[$sGroupId])) {
                $oUamUserGroup->removeObject($sObjectType, $sObjectId);
            }

            if (isset($aAddUserGroups[$sGroupId])) {
                $oUamUserGroup->addObject($sObjectType, $sObjectId);
            }

            $oUamUserGroup->save($blRemoveOldAssignments);
        }

        switch ( $sOperation) {
            case "add":
                WP_CLI::success( implode( " ", array( "groups:", $assoc_args[ 'groups'], "sucessfully added to", $sObjectType, $sObjectId)));
                break;
            case "update":
                WP_CLI::success( implode( " ", array( "sucessfully updated", $sObjectType, $sObjectId, "with groups:", $assoc_args[ 'groups'])));
                break;
            case "remove":
                WP_CLI::success( implode( " ", array( "sucessfully removed groups:", $assoc_args[ 'groups'], "from", $sObjectType, $sObjectId)));
                break;
            default:
        }
    }
}

// add the command
WP_CLI::add_command( 'uam groups', 'Groups_Command'  );
WP_CLI::add_command( 'uam objects', 'Objects_Command' );
