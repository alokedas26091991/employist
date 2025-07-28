<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GalleryImages Model
 *
 * @property \App\Model\Table\GalleriesTable&\Cake\ORM\Association\BelongsTo $Galleries
 *
 * @method \App\Model\Entity\GalleryImage newEmptyEntity()
 * @method \App\Model\Entity\GalleryImage newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\GalleryImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GalleryImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\GalleryImage findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\GalleryImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GalleryImage[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GalleryImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GalleryImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GalleryImage[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GalleryImage[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\GalleryImage[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GalleryImage[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GalleryImagesTable extends Table
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

        $this->setTable('gallery_images');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Galleries', [
            'foreignKey' => 'gallery_id',
            'joinType' => 'INNER',
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
            ->integer('gallery_id')
            ->notEmptyString('gallery_id');

        $validator
            ->scalar('image')
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->boolean('is_active')
            ->notEmptyString('is_active');

        $validator
            ->boolean('is_deleted')
            ->notEmptyString('is_deleted');

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->requirePresence('updated_at', 'create')
            ->notEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('gallery_id', 'Galleries'), ['errorField' => 'gallery_id']);

        return $rules;
    }
}
