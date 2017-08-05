<?php

use yii\db\Migration;

/**
 * Handles the creation for table `{{%unit}}`.
 */
class m170618_125456_create_table_unit extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('{{%unit}}', [

            'id' => $this->primaryKey()->unsigned()->notNull(),
            'name' => $this->string(255),
            'lvl' => $this->integer(10)->unsigned()->notNull()->defaultValue(1),
            'parent_id' => $this->integer(10)->unsigned(),
            'atk' => $this->integer(10)->unsigned()->notNull()->defaultValue(10),
            'hp' => $this->integer(10)->unsigned()->notNull()->defaultValue(100),

        ]);
 
        // creates index for column `parent_id`
        $this->createIndex(
            'unit_fk1',
            '{{%unit}}',
            'parent_id'
        );

        // add foreign key for table `unit`
        $this->addForeignKey(
            'unit_fk1',
            '{{%unit}}',
            'parent_id',
            '{{%unit}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        // drops foreign key for table `unit`
        $this->dropForeignKey(
            'unit_fk1',
            '{{%unit}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            'unit_fk1',
            '{{%unit}}'
        );

        $this->dropTable('{{%unit}}');
    }
}
