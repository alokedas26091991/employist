<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Services Model
 *
 * @method \App\Model\Entity\Service newEmptyEntity()
 * @method \App\Model\Entity\Service newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Service[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ServicesTable extends Table
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

        $this->setTable('services');
        $this->setDisplayField('name');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('align')
            ->requirePresence('align', 'create')
            ->notEmptyString('align');

        $validator
            ->scalar('title_1')
            ->maxLength('title_1', 255)
            ->allowEmptyString('title_1');

        $validator
            ->scalar('title_2')
            ->maxLength('title_2', 255)
            ->allowEmptyString('title_2');

        $validator
            ->scalar('title_3')
            ->maxLength('title_3', 255)
            ->allowEmptyString('title_3');

        $validator
            ->scalar('title_4')
            ->maxLength('title_4', 255)
            ->allowEmptyString('title_4');

        $validator
            ->scalar('title_5')
            ->maxLength('title_5', 255)
            ->allowEmptyString('title_5');

        $validator
            ->scalar('title_6')
            ->maxLength('title_6', 255)
            ->allowEmptyString('title_6');

        $validator
            ->scalar('title_7')
            ->maxLength('title_7', 255)
            ->allowEmptyString('title_7');

        $validator
            ->scalar('title_8')
            ->maxLength('title_8', 255)
            ->allowEmptyString('title_8');

        $validator
            ->scalar('title_9')
            ->maxLength('title_9', 255)
            ->allowEmptyString('title_9');

        $validator
            ->scalar('title_10')
            ->maxLength('title_10', 255)
            ->allowEmptyString('title_10');

        return $validator;
    }
}
