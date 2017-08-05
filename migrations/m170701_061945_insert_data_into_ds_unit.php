<?php

use yii\db\Migration;

/**
 * Handles the data insertion for table `{{%unit}}`.
 */
class m170701_061945_insert_data_into_ds_unit extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->batchInsert('{{%unit}}', ['id','name','lvl','atk','hp'], [
			['1','первый','1','10','100'],
			['2','второй','1','10','100']]);
        $this->update('{{%unit}}', [ 'parent_id' => '2' ],
            'id=1'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->truncateTable('{{%unit}}');
    }
}
