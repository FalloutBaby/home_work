<?php
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <?=
        kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            'showOnEmpty' => true,
            'columns' => [
                ['class' => 'kartik\grid\SerialColumn', 'hidden' => true],
                [
                    'attribute' => 'dept.name',
                    'group' => true,
                    'groupedRow' => true,
                ],
                [
                    'attribute' => 'stand.name',
//                  'contentOptions' => ['style' => 'background-color: transparent !important;'],
                    'width' => '220px',
                    'group' => true,
                    'subGroupOf' => 1,
                    'filterInputOptions' => ['placeholder' => 'Any supplier'],
                    'groupOddCssClass' => 'kv-grouped-row',
                    'groupEvenCssClass' => 'kv-grouped-row',
                    'groupFooter' => function ($model, $key, $index, $widget) {
                        return [
                            'mergeColumns' => [[2, 4], [9, 11]], // columns to merge in summary
                            'content' => [// content to show in each summary cell
                                5 => 'Месяц',
                                6 => $model->getCurrentMonth($model->dept_id, $model->stand_id, 'goal'),
                                7 => $model->getCurrentMonth($model->dept_id, $model->stand_id, 'required'),
                                8 => $model->getCurrentMonth($model->dept_id, $model->stand_id, 'actual'),
                            ],
                            'contentOptions' => [// content html attributes for each summary cell
                                8 => ['class' => $model->getColor($model->actual, $model->required)],
                            ],
                            // html attributes for group summary row
                            'options' => ['style' => 'font-weight:bold;']
                        ];
                    }
                ],
                [
                    'attribute' => 'average',
                    'width' => '50px',
                    'value' => function($model) {
                        return $model->getAvg($model->dept_id, $model->stand_id);
                    },
                    'group' => true,
                    'subGroupOf' => 1,
                    'header' => 'Среднее <br> значение <br> за 2018г.',
//                  'contentOptions' => ['style' => 'background-color: transparent !important;'],
                ],
                [
                    'attribute' => 'stand.measure_unit',
                    'width' => '30px',
                    'group' => true,
                    'subGroupOf' => 1,
                    'header' => 'Ед. <br> изм.',
//                  'contentOptions' => ['style' => 'background-color: transparent !important;'],
                ],
                [
                    'attribute' => 'month',
                    'value' => function($model) {
                        return $model->getMonthName($model->month);
                    },
                ],
                [
                    'attribute' => 'goal',
                ],
                'required',
                [
                    'attribute' => 'actual',
                    'contentOptions' => function($model) {
                        return ['class' => $model->getColor($model->actual, $model->required),];
                    },
                ],
                [
                    'attribute' => 'reached',
                    'header' => 'Уровень <br>достижения<br> цели',
                    'width' => '50px',
                    'group' => true,
                    'subGroupOf' => 1,
                    'value' => function($model) {
                        return $model->getReached($model->dept_id, $model->stand_id);
                    },
                ],
                [
                    'attribute' => 'total_reached',
                    'header' => 'ИТОГО <br> уровень <br>достижения<br> цели',
                    'width' => '50px',
                    'group' => true,
                    'subGroupOf' => 1,
                    'value' => function($model) {
                        return $model->getReached($model->dept_id, $model->stand_id);
                    },
                ],
                [
                    'attribute' => 'dept.rank',
                ],
            ],
        ])
        ?>

    </div>
</div>
