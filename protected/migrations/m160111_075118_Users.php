<?php

use yii\db\Schema;
use yii\db\Migration;
use yii\rbac\Role;

class m160111_075118_Users extends Migration
{
    public function up()
    {
        $tableOptions = null;
        $this->createTable('{{%users}}', [
            'id_user' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(64) NOT NULL',
            'status' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT TRUE',
        ], $tableOptions);

        $this->insert('{{%users}}', [
            'username' => 'superuser',
            'password_hash' => Yii::$app->security->generatePasswordHash('root'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 1,
        ]);

//        $this->insert('{{%auth_rule}}', [
//            'name' => 'all',
//            'data' => 'Полный доступ',
//            'created_at' => time(),
//            'updated_at' => time(),
//        ]);

        $auth = Yii::$app->authManager;

        // добавляем разрешение "fullAccess"
        $fullAccess = $auth->createPermission('fullAccess');
        $fullAccess->description = 'Полный доступ к ресурсам';
        $auth->add($fullAccess);

        // добавляем роль "superadmin" и даём роли разрешение "fullAccess"
        $superadmin = $auth->createRole('admin');
        $superadmin->description = 'Администратор';
        $superadmin->data = 'Администратор всего содержимого данной программы, с неограниченным доступом';
        $auth->add($superadmin);
        $auth->addChild($superadmin, $fullAccess);

        // Назначение роли пользователю superadmin
        $auth->assign($superadmin, 1);
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
        $auth = Yii::$app->authManager;
        $auth->removeAll();

    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
