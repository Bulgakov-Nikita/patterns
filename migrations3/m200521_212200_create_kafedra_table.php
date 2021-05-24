<?php

use \yii\db\Migration;

class m200521_212200_create_kafedra_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('kafedra', [
            'id' => $this->primaryKey()->notNull()->comment('Первичный ключ'),
            'name' => $this->text()->notNull()->unique()->comment('Название института'),
            'facultet_id' => $this->integer(11)->notNull()->comment('внешний ключ'),
            'create_at' => $this->integer(11)->notNull()->comment('дата создания'),
            'create_by' => $this->integer(11)->notNull()->comment('кем создано'),
            'update_at' => $this->integer(11)->notNull()->comment('дата обновления'),
            'update_by' => $this->integer(11)->notNull()->comment('кем создано'),
            'delete_at' => $this->integer(11)->comment('дата удаления'),
            'delete_by' => $this->integer(11)->comment('кем удалено'),
            'active' => $this->tinyInteger(1)->notNull()->comment('статус'),
            'lock' => $this->integer(11)->notNull()->comment('блокировка')
        ]);
        $this->addCommentOnTable('kafedra', 'Таблица для хранения информации о кафедре');
        $this->addForeignKey(
            'FK_facultet_id',
            'kafedra',
            'facultet_id',
            'facultet',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropTable('kafedra');
        $this->dropForeigenKey('FK_facultet_id');
    }
}
