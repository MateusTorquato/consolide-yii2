<?php

namespace app\models;

use yii\db\ActiveRecord;

class GenericModel extends ActiveRecord
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created_at = time();
            }

            $this->updated_at = time();
            return true;
        }

        return false;
    }
}
