<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2020-01-23 11:40
 */


namespace common\services;


use backend\models\search\CommentSearch;
use common\models\Comment;

class CommentService extends Service implements CommentServiceInterface
{

    public function getSearchModel(array $options=[])
    {
        return new CommentSearch();
    }

    public function getModel($id, array $options = [])
    {
        return Comment::findOne($id);
    }

    public function newModel(array $options = [])
    {
        return new Comment();
    }

    /**
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getRecentComments($limit = 10)
    {
        return $this->newModel()->find()->orderBy('created_at desc')->with('article')->limit($limit)->all();
    }
}