<?php
    return [
        'basic' => [
            'language' => [
                'url' => '/vendor/datatables/lang/zh_CN.json',
            ],
            'dom' =>  "<'row'<'col-md-12'f>><'table-responsive margin-bottom-10't><'row'<'col-md-12 col-sm-12'il<'table-group-actions pull-right'p>>r>",
            'bStateSave' => true,
            'pagingType' => "bootstrap_extended",
            'autoWidth' => false,
            'drawCallback' => 'function(){sJs.tableInit.apply(this,arguments);}',
        ]
    ];