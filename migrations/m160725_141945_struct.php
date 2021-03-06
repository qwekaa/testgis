<?php

use yii\db\Migration;

class m160725_141945_struct extends Migration
{

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        
        $this->createTable('building', [
            'id' => $this->primaryKey()->notNull()->unsigned(),
            'address' => $this->string()->notNull(),
            'latitude' => $this->decimal(10, 7),
            'longitude' => $this->decimal(10, 7),
        ]);
        
        $this->createTable('company', [
            'id' => $this->primaryKey()->unsigned(),
            'title' => $this->string()->notNull(),
            'id_building' => $this->integer()->notNull()->unsigned(),
        ]);
        $this->addForeignKey('fk-id_building-building', 'company', 'id_building', 'building', 'id');
        $this->createIndex('uk-id_building-company', 'company', 'id_building');
        
        $this->createTable('phone', [
            'id' => $this->primaryKey()->unsigned(),
            'id_company' => $this->integer()->notNull()->unsigned(),
            'number' => $this->string()->notNull(),
        ]);
        $this->addForeignKey('fk-id_company-phone', 'phone', 'id_company', 'company', 'id');
        $this->createIndex('uk-id_company-phone', 'phone', 'id_company');
        
        
        $this->createTable('rubrick', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string(64)->notNull()->unique(),
            'parent_id' => $this->integer()->unsigned()->defaultValue(0),
        ]);
        
        $this->createTable('companyrubrick', [
            'id_company' => $this->integer()->unsigned(),
            'id_rubrick' => $this->integer()->unsigned(),
        ]);
        $this->addPrimaryKey('pk-companyRubrick', 'companyrubrick', ['id_company','id_rubrick']);
        $this->addForeignKey('fk-id_company-companyrubrick', 'companyrubrick', 'id_company', 'company', 'id');
        $this->addForeignKey('fk-id_rubrick-companyrubrick', 'companyrubrick', 'id_rubrick', 'rubrick', 'id');
        
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
