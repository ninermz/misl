<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $photo
 * @property int $comment_courses_id
 * @property string $price
 * @property CommentCourses $commentCourses
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'photo', 'price'], 'required'],
            [['description'], 'string'],
            [[ 'comment_courses_id'], 'integer'],
            [['name', 'price'], 'string', 'max' => 255],
            [['comment_courses_id'], 'exist', 'skipOnError' => true, 'targetClass' => CommentCourses::class, 'targetAttribute' => ['comment_courses_id' => 'id']],
            [['photo'],  'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'photo' => 'Фото',
            'comment_courses_id' => 'Comment Courses ID',
            'price' => 'Цена'
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $directory = 'uploads/';
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            $filePath = $directory . $this->photo->baseName . '.' . $this->photo->extension;
            if ($this->photo->saveAs($filePath)) {
                $this->photo = $filePath;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[CommentCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentCourses()
    {
        return $this->hasOne(CommentCourses::class, ['id' => 'comment_courses_id']);
    }
}
