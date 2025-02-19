<?php

declare(strict_types = 1);
use HDNET\Autoloader\Utility\ArrayUtility;
use HDNET\Autoloader\Utility\ModelUtility;
use HDNET\Faq\Domain\Model\Question;

$base = ModelUtility::getTcaInformation(Question::class);

$custom = [
    'ctrl' => [
        'sortby' => null,
    ],
    'columns' => [
        'title' => [
            'config' => [
                'eval' => 'trim,required',
            ],
        ],
        'answer' => [
            'config' => [
                'type' => 'text',
            ],
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts_css]',
        ],
        'categories' => [
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'tx_faq_domain_model_questioncategory',
                'maxitems' => '999',
                'minitems' => '1',
                'MM' => 'tx_faq_mm_question_questioncategory',
                'renderMode' => 'tree',
                'treeConfig' => [
                    'parentField' => 'parent',
                ],
            ],
        ],
    ],
];

return ArrayUtility::mergeRecursiveDistinct($base, $custom);
