<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_bookmarks".
 *
 * @property int $id
 * @property int $user_id
 * @property int $lesson_id
 * @property string $at_created
 *
 * @property Lesson $lesson
 * @property User $user
 */
class UserBookmarks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_bookmarks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'lesson_id'], 'required'],
            [['user_id', 'lesson_id'], 'integer'],
            [['at_created'], 'safe'],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'lesson_id' => 'Lesson ID',
            'at_created' => 'At Created',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


}
