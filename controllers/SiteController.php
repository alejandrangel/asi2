<?php

namespace app\controllers;


use Yii;
use app\models\LoginForm;
use app\models\ContactForm;
use util\Log;
use util\Acf;


class SiteController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('main');
    }

    public function actionMain(){
        return $this->render('main');
    }
    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->actionMain();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Log::log(Log::LOGIN);
            return $this->goHome();
        }
        $this->layout ='login';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Log::log(Log::LOGOUT);
        Yii::$app->user->logout();

        return $this->goHome();
    }


    function defineRules(){
    }



}
