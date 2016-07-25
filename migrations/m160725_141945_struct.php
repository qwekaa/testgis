<?php

use yii\db\Migration;

class m160725_141945_struct extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull(),
            'id_building' => $this->integer()->notNull()->unsigned(),
        ]);
        
        $this->createTable('phone', [
            'id' => $this->primaryKey()->unsigned(),
            'id_company' => $this->integer()->notNull()->unsigned(),
            'number' => $this->string()->notNull(),
        ]);
        $this->createTable('building', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'address' => $this->string()->notNull(),
            'latitude' => $this->decimal(3, 7),
            'longitude' => $this->decimal(3, 7),
        ]);
        $this->createTable('companyrubrick', [
            'id_company',
            'id_rubrick',
        ]);
        $this->addPrimaryKey('pk-companyRubrick', 'companyrubrick', ['id_company','id_rubrick']);
        $this->createTable('rubrick', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(64)->notNull()->unique(),
            'parent_id' => $this->integer()->unsigned()->defaultValue(0),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('company');
        $this->dropTable('phone');
        $this->dropTable('building');
        $this->dropTable('companyrubrick');
        $this->dropTable('rubrick');
    }
    
}
