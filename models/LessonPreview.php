<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\web\UploadedFile;

/**
 * This is the model class for table "lesson_preview".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $photo
 * @property Lesson[] $lessons
 */
class LessonPreview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson_preview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
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
        ];
    }

    public function getLessons(): ActiveQuery
    {
        return $this->hasMany(Lesson::class, ['lesson_preview_id' => 'id']);
    }

    /**
     * Загружает файл на сервер и сохраняет путь к нему в модели.
     */
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


}
