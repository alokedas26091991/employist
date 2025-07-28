<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StaticPages Model
 *
 * @method \App\Model\Entity\StaticPage newEmptyEntity()
 * @method \App\Model\Entity\StaticPage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage get($primaryKey, $options = [])
 * @method \App\Model\Entity\StaticPage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StaticPage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StaticPage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StaticPage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StaticPage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StaticPage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StaticPage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StaticPage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaticPagesTable extends Table
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

        $this->setTable('static_pages');
        $this->setDisplayField('page_name');
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
            ->scalar('page_name')
            ->maxLength('page_name', 3200)
            ->requirePresence('page_name', 'create')
            ->notEmptyString('page_name');


        return $validator;
    }
}
