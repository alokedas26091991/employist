<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $user_type
 * @property string|null $department
 * @property string|null $designation
 * @property string|null $gender
 * @property string $phone_no
 * @property string $image
 * @property string $password
 * @property \Cake\I18n\FrozenTime $last_login_date
 * @property \Cake\I18n\FrozenTime $create_date
 * @property bool $is_active
 * @property bool $is_deleted
 * @property \Cake\I18n\FrozenDate|null $dob
 * @property string|null $school
 *
 * @property \App\Model\Entity\Cart[] $carts
 * @property \App\Model\Entity\Invoice[] $invoices
 * @property \App\Model\Entity\UserBranch[] $user_branches
 * @property \App\Model\Entity\UserCourseLmsDetail[] $user_course_lms_details
 * @property \App\Model\Entity\UserExamination[] $user_examinations
 * @property \App\Model\Entity\UserRole[] $user_roles
 * @property \App\Model\Entity\UserSubscription[] $user_subscriptions
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'name' => true,
        'email' => true,
        'user_type' => true,
        'department' => true,
        'designation' => true,
        'gender' => true,
        'phone_no' => true,
        'image' => true,
        'password' => true,
        'last_login_date' => true,
        'create_date' => true,
        'is_active' => true,
        'is_deleted' => true,
        'dob' => true,
        'school' => true,
        'carts' => true,
        'invoices' => true,
        'user_branches' => true,
        'user_course_lms_details' => true,
        'user_examinations' => true,
        'user_roles' => true,
        'user_subscriptions' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password'
    ];
	protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
