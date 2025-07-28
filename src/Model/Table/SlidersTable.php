<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sliders Model
 *
 * @method \App\Model\Entity\Slider newEmptyEntity()
 * @method \App\Model\Entity\Slider newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Slider[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Slider get($primaryKey, $options = [])
 * @method \App\Model\Entity\Slider findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Slider patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Slider[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Slider|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slider saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slider[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slider[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slider[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slider[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SlidersTable extends Table
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

        $this->setTable('sliders');
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
            ->maxLength('name', 512)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('photo')
            ->allowEmptyString('photo');

        $validator
            ->scalar('image_link')
            ->allowEmptyFile('image_link');

        $validator
            ->scalar('caption')
            ->allowEmptyString('caption');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->integer('created_by')
            ->allowEmptyString('created_by');

        $validator
            ->date('create_date')
            ->allowEmptyDate('create_date');

        $validator
            ->integer('is_deleted')
            ->notEmptyString('is_deleted');

        return $validator;
    }
}
