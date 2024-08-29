<?php

namespace app\models;


use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 * @property string $brief
 * @property string $subtitle
 * @property string $description
 * @property string $date
 * @property string $video_url
 * @property string $video_name
 * @property int $visits_count
 *  @property int $lesson_preview_id
 * @property LessonPreview $lessonPreview
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'brief', 'subtitle', 'description', 'date', 'video_url', 'video_name', 'lesson_preview_id'], 'required'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['name', 'brief', 'subtitle', 'video_name'], 'string', 'max' => 255],
            [['video_url'], 'string', 'max' => 500],
            [['lesson_preview_id'], 'exist', 'skipOnError' => true, 'targetClass' => LessonPreview::class, 'targetAttribute' => ['lesson_preview_id' => 'id']],
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
            'brief' => 'Краткая информация о содержании урока',
            'subtitle' => 'Подзаголовок',
            'description' => 'Содержание',
            'date' => 'Дата',
            'video_url' => 'Url видео',
            'video_name' => 'Название видео',
            'visits_count' => 'Посещения',
            'lesson_preview_id' => 'Тема'
        ];
    }

    public function getLessonPreview()
    {
        return $this->hasOne(LessonPreview::className(), ['id' => 'lesson_preview_id']);
    }

    public function getUsersWhoBookmarked()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])
            ->viaTable('user_bookmarks', ['lesson_id' => 'id']);
    }
}
