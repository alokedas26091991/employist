<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Socials Model
 *
 * @method \App\Model\Entity\Social newEmptyEntity()
 * @method \App\Model\Entity\Social newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Social[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Social get($primaryKey, $options = [])
 * @method \App\Model\Entity\Social findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Social patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Social[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Social|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Social saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Social[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SocialsTable extends Table
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

        $this->setTable('socials');
        $this->setDisplayField('email');
        $this->setPrimaryKey('id');
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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('fb')
            ->requirePresence('fb', 'create')
            ->notEmptyString('fb');

        $validator
            ->scalar('instagram')
            ->requirePresence('instagram', 'create')
            ->notEmptyString('instagram');

        $validator
            ->scalar('youtube')
            ->requirePresence('youtube', 'create')
            ->notEmptyString('youtube');

        $validator
            ->scalar('office_hour')
            ->requirePresence('office_hour', 'create')
            ->notEmptyString('office_hour');

        return $validator;
    }
}
