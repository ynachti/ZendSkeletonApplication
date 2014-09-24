<?php

/**
 * Application Module
*
* @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
* @license http://framework.zend.com/license/new-bsd New BSD License
*/

namespace Application\Acl;

use Zend\Permissions\Acl\Role\RoleInterface;

/**
 * Interface for a role with a possible parent role.
 *
 * @author Yassine Nachti
 */
interface HierarchicalRoleInterface extends RoleInterface
{
	/**
	 * Get the parent role
	 *
	 * @return \Zend\Permissions\Acl\Role\RoleInterface|null
	 */
	public function getParent();
}