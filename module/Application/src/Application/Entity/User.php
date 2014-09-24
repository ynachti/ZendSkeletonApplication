<?


// namespace Application\Entity;

// use Doctrine\ORM\Mapping as ORM;
// //use Doctrine\ORM\Mapping\ManyToMany;
// //use Doctrine\ORM\Mapping\JoinTable;
// //use Doctrine\ORM\Mapping\JoinColumn;
// use Doctrine\Common\Collections\ArrayCollection;

// /**
//  * user_role
//  *
//  * @ORM\Table(name="user_role")
//  * @ORM\Entity
//  * @ORM\HasLifecycleCallbacks
//  */

// class User {
    
//     protected $roles;
    
// 	/**
// 	 * @ORM\Id
	  
// 	 * @ORM\Column(type="integer",name="id")
// 	 */
// 	protected $user_id;

// 	/** 
// 	 * @ORM\Column(type="integer", name="parent_id") 
// 	 */
// 	protected $parent_id;

// // 	/** @ORM\Column(type="string", name="name") */
// // 	protected $name;

// // 	/** @ORM\Column(type="string", name="email") */
// // 	protected $email;

// 	//Setters and getters

// 	public function getUserId() {
// 		return $this->userId;
// 	}

// // 	public function setName($name) {
// // 		$this->name = $name;
// // 	}

// // 	public function getName() {
// // 		return $this->name;
// // 	}

// // 	public function getEmail() {
// // 		return $this->email;
// // 	}

// // 	public function setEmail($email) {
// // 		$this->email = $email;
// // 	}

//     /** ONE-TO-MANY UNIDIRECTIONAL, WITH JOIN TABLE ONLY WORK WITH MANY-TO-MANY ANNOTATION AND A UNIQUE CONSTRAINT
//       * @ORM\ManyToMany(targetEntity="Application\Entity\UserRoleLinker")
//       * @ORM\JoinTable(
//       *                 name="user_role_linker",
//       *                 joinColumns={
//       *                     @ORM\JoinColumn(
//       *                                 name="user_id", 
//       *                                 referencedColumnName="id"
//       *                                 )
//       *                 },
//       *                 inverseJoinColumns={
//       *                     @ORM\JoinColumn(
//       *                                     name="role_id", 
//       *                                     referencedColumnName="id", 
//       *                                     unique=true
//       *                                     )
//       *                 }
//       * )
//       */	
// 	private $role_id;
	
// 	public function __construct()
// 	{
// 		$this->role_id = new ArrayCollection();
// 	}

// 	/** @return Collection */
// 	public function getRoleId()
// 	{
// 		return $this->role_id;
// 	}
	
// 	/**
// 	 * Get roles.
// 	 *
// 	 * @return ArrayCollection
// 	 */
// 	public function getRoles()
// 	{
// 		return $this->roles;
// 	}
	
// 	/**
// 	 * Add a role to the user.
// 	 *
// 	 * @param Role $role
// 	 *
// 	 * @return User
// 	 */
// 	public function addRole(Role $role)
// 	{
// 		$this->roles[] = $role;
	
// 		return $this;
// 	}
	
// 	/**
// 	 * Remove a role from the user
// 	 *
// 	 * @param Role $role
// 	 *
// 	 * @return User
// 	 */
// 	public function removeRole(Role $role)
// 	{
// 		$this->roles->removeElement($role);
	
// 		return $this;
// 	}
	
	

// }
// ?>