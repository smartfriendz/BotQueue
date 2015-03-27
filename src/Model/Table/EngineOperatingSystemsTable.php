<?php
namespace App\Model\Table;

use App\Model\Entity\EngineOperatingSystem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EngineOperatingSystems Model
 */
class EngineOperatingSystemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('engine_operating_systems');
        $this->displayField('engine_id');
        $this->primaryKey(['engine_id', 'operating_system']);
        $this->belongsTo('Engines', [
            'foreignKey' => 'engine_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('engine_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('engine_id', 'create')
            ->add('operating_system', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('operating_system', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['engine_id'], 'Engines'));
        return $rules;
    }
}
