<?php
/**
 * Created by PhpStorm.
 * User: west223
 * Date: 26.07.18
 * Time: 2:07
 */

return [
  'as globalAccess' => [
      'class' => \common\behaviors\GlobalAccessBehavior::class,
      'rules' => [
          [
              'controllers' => ['site', 'page', 'article'],
              'allow' => true,
              'roles' =>  ['?', "@"],

          ],
          [
              'controllers' => ['user/default', 'comment/default'],
              'allow' => 'true',
              'roles' => ['@'],
          ],
          [
              'controllers' => ['user/sign-in'],
              'allow' => true,
              'roles' => ['?'],
              'actions' => [
                  'signup', 'login', 'login-by-pass', 'request-password-reset', 'reset-password', 'oauth', 'activation'
              ]
          ],
          [
              'controllers'=>['user/sign-in'],
              'allow' => false,
              'roles' => ['@'],
              'actions' => [
                  'signup', 'login', 'request-password-reset', 'reset-password', 'oauth', 'activation'
              ],
              'denyCallback' => function () {
                  return Yii::$app->controller->redirect(['/user/default/index']);
              }
          ],
          [
              'controllers' => ['user/sign-in'],
              'allow' => true,
              'roles' => ['@'],
              'actions' => ['logout'],
          ],

         /* 'access' => [
              'class' => AccessControl::class,
              'only' => ['quick-edit', 'delete'],
              'rules' => [
                  [
                      'allow' => true,
                      'roles' => ['admin'],
                  ],
              ],
          ],*/
      ]
  ]
];