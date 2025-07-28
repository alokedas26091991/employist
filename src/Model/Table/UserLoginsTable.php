<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\VendorsTable&\Cake\ORM\Association\BelongsTo $Vendors
 * @property \App\Model\Table\BrandrequestsTable&\Cake\ORM\Association\HasMany $Brandrequests
 * @property \App\Model\Table\CancelPaymentsTable&\Cake\ORM\Association\HasMany $CancelPayments
 * @property \App\Model\Table\CartOriginalsTable&\Cake\ORM\Association\HasMany $CartOriginals
 * @property \App\Model\Table\CartsTable&\Cake\ORM\Association\HasMany $Carts
 * @property \App\Model\Table\CombosTable&\Cake\ORM\Association\HasMany $Combos
 * @property \App\Model\Table\CourseCommentsTable&\Cake\ORM\Association\HasMany $CourseComments
 * @property \App\Model\Table\CourseRatingsTable&\Cake\ORM\Association\HasMany $CourseRatings
 * @property \App\Model\Table\CourseRemainderEmailsTable&\Cake\ORM\Association\HasMany $CourseRemainderEmails
 * @property \App\Model\Table\InvoiceCourseHistoryTable&\Cake\ORM\Association\HasMany $InvoiceCourseHistory
 * @property \App\Model\Table\InvoiceCoursesTable&\Cake\ORM\Association\HasMany $InvoiceCourses
 * @property \App\Model\Table\InvoicesTable&\Cake\ORM\Association\HasMany $Invoices
 * @property \App\Model\Table\ManualCartsTable&\Cake\ORM\Association\HasMany $ManualCarts
 * @property \App\Model\Table\OfflineCartsTable&\Cake\ORM\Association\HasMany $OfflineCarts
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\HasMany $Payments
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 * @property \App\Model\Table\RefundRequestsTable&\Cake\ORM\Association\HasMany $RefundRequests
 * @property \App\Model\Table\RequestcallsTable&\Cake\ORM\Association\HasMany $Requestcalls
 * @property \App\Model\Table\ReviewEmailsTable&\Cake\ORM\Association\HasMany $ReviewEmails
 * @property \App\Model\Table\ReviewLikeDislikesTable&\Cake\ORM\Association\HasMany $ReviewLikeDislikes
 * @property \App\Model\Table\ReviewsTable&\Cake\ORM\Association\HasMany $Reviews
 * @property \App\Model\Table\SellerbrandsTable&\Cake\ORM\Association\HasMany $Sellerbrands
 * @property \App\Model\Table\SocialProfilesTable&\Cake\ORM\Association\HasMany $SocialProfiles
 * @property \App\Model\Table\SupportsTable&\Cake\ORM\Association\HasMany $Supports
 * @property \App\Model\Table\TempCartsTable&\Cake\ORM\Association\HasMany $TempCarts
 * @property \App\Model\Table\UserCouponsTable&\Cake\ORM\Association\HasMany $UserCoupons
 * @property \App\Model\Table\UserDeliveryDetailsTable&\Cake\ORM\Association\HasMany $UserDeliveryDetails
 * @property \App\Model\Table\UserDevicesTable&\Cake\ORM\Association\HasMany $UserDevices
 * @property \App\Model\Table\UserLoginsTable&\Cake\ORM\Association\HasMany $UserLogins
 * @property \App\Model\Table\UserProductsTable&\Cake\ORM\Association\HasMany $UserProducts
 * @property \App\Model\Table\UserRolesTable&\Cake\ORM\Association\HasMany $UserRoles
 * @property \App\Model\Table\UserSettingsTable&\Cake\ORM\Association\HasMany $UserSettings
 * @property \App\Model\Table\WishlistsTable&\Cake\ORM\Association\HasMany $Wishlists
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UserLoginsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('user_logins');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
      
       
        
     
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
		
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
  
}
