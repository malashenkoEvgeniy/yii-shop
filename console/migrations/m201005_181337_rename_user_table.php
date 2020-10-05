<?php

use yii\db\Migration;

/**
 * Class m201005_181337_rename_user_table
 */
class m201005_181337_rename_user_table extends Migration
{ public function up()
{
    $this->renameTable('{{%user}}', '{{%users}}');
}

    public function down()
    {
        $this->renameTable('{{%users}}', '{{%user}}');
    }
}
