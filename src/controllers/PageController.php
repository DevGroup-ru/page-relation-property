<?php


namespace DotPlant\PageRelationProperty\controllers;


use app\backend\components\BackendController;
use app\modules\page\models\Page;
use Yii;
use yii\db\Query;
use yii\web\Response;

class PageController extends BackendController
{
    /**
     * @return array
     */
    public function actionAjaxRelatedPage()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $result = [
            'more' => false,
            'results' => []
        ];
        $search = Yii::$app->request->get('search');
        if (!empty($search['term'])) {
            $query = new Query();
            $query->select('id, name AS text')->from(Page::tableName())->andWhere(
                ['like', 'name', $search['term']]
            )->andWhere(['active' => 1])->orderBy(['sort_order' => SORT_ASC, 'name' => SORT_ASC]);
            $command = $query->createCommand();
            $data = $command->queryAll();

            $result['results'] = array_values($data);
        }

        return $result;
    }
}