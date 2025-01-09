<?php

namespace App\DataTables;

use App\Models\PageProfile;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PageProfileDataTable extends DataTable
{

    public function __construct()
    {
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (PageProfile $page) {
                return view("dashboard.tampilan.pageprofile.action", compact("page"));
            })
            ->rawColumns(['updated_by','created_at', "b_date", "aktif"])
            ->editColumn('b_date', function (PageProfile $page) {
                return \Carbon\Carbon::parse($page->b_date)->isoFormat("D MMMM Y");
            })
            ->editColumn('created_at', function (PageProfile $page) {
                return $page->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s T');
            })
            ->editColumn('updated_at', function (PageProfile $page) {
                return $page->updated_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s T');
            })
            ->editColumn("aktif", function (PageProfile $page) {
                return $page->p_is_active == 0 ? "Non Aktif" : "Aktif";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PageProfile $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('page-profile-table')
            ->setTableAttributes([
                'class' => 'table table-striped table-bordered',
                'cellspacing' => '0',
            ])
            ->stateSave(true)
            ->autoWidth(false)
            ->scrollX(true)
            ->responsive(true)
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->parameters([
                'searching' => false,
            ])
            ->orderBy(1)
            ->selectStyleSingle()
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'page-profile-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val().toLowerCase();

                    table.rows().every(function() {
                        var row = this.node();
                        var rowText = row.textContent.toLowerCase();

                        if (rowText.indexOf(searchTerm) === -1) {
                            $(row).hide();
                        } else {
                            $(row).show();
                        }
                    });
                });
            }');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('p_title')->title("Halaman"),
            Column::make('aktif')->title("Status")
            ->orderable(false),
            Column::make('created_at')->title("Dibuat Pada"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PageProfile_' . date('YmdHis');
    }
}
