<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment_courses".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $courses_id
 * @property string $description
 * @property string $date
 * @property int $likes_count
 *
 * @property Courses $courses
 * @property User $user
 */
class CommentCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'courses_id', 'likes_count'], 'integer'],
            [['courses_id', 'description', 'date', 'likes_count'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['courses_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::class, 'targetAttribute' => ['courses_id' => 'id']],
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
            'courses_id' => 'Courses ID',
            'description' => 'Description',
            'date' => 'Date',
            'likes_count' => 'Likes Count',
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasOne(Courses::class, ['id' => 'courses_id']);
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
