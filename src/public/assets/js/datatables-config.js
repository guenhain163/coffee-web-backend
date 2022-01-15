$.extend($.fn.dataTable.defaults, {
    pageLength: 20,
    paging: true,
    responsive: false,
    autoWidth: false,
    fixedHeader: {
        header: false,
        footer: true
    },
    scrollX: true,
    scrollCollapse: false,
    searching: true,
    ordering: false,
    info: false,
    bPaginate: true,
    dom: 'rt<"bottom"p><"clear">',
    columnDefs: [
        {
            targets: "no-sort",
            orderable: false,
        },
    ],
    processing: true,
    language: {
        sSearch: '<i class="fa fa-search"></i> 検索',
        emptyTable: "データがございません",
        info: "_TOTAL_ 件中 _START_ から _END_ まで表示",
        infoEmpty: "0 件中 0 から 0 まで表示",
        infoPostFix: "",
        infoThousands: ",",
        loadingRecords: `読み込み中...`,
        infoFiltered: "",
        processing: `
                <div class="spinner-border" role="status">
                  <span class="sr-only">読み込み中...</span>
                </div>
              `,
        zeroRecords: "データがございません",
        paginate: {
            first: "先頭",
            last: "最終",
            next: "<i class=\"fas fa-chevron-right\"></i>",
            previous: "<i class=\"fas fa-chevron-left\"></i>"
        },
    },
    drawCallback: function (oSettings) {
        // if (oSettings._iDisplayLength >= oSettings.fnRecordsDisplay()) {
        //     $(oSettings.nTableWrapper).find(".dataTables_paginate").hide();
        // } else {
        //     $(oSettings.nTableWrapper).find(".dataTables_paginate").show();
        // }
    },
});
