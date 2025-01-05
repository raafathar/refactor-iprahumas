<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Berita;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BeritaDataTable extends DataTable
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
            ->addColumn('action', function (Berita $berita) {
                return view("dashboard.datamaster.berita.action", compact("berita"));
            })
            ->rawColumns(['updated_by', 'created_at', "b_date", "aktif"])
            ->editColumn('b_date', function (Berita $berita) {
                return \Carbon\Carbon::parse($berita->b_date)->isoFormat("D MMMM Y");
            })
            ->editColumn('created_at', function (Berita $berita) {
                return $berita->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s T');
            })
            ->editColumn('updated_at', function (Berita $berita) {
                return $berita->updated_at->timezone('Asia/Jakarta')->format('d-m-Y H:i:s T');
            })
            ->editColumn("aktif", function (Berita $berita) {
                return $berita->b_is_active == 0 ? "Non Aktif" : "Aktif";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Berita $model): QueryBuilder
    {
        return $model->newQuery()->select('users.name', "beritas.*")
            ->join('users', 'users.id', '=', 'beritas.user_id');;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('beritas-table')
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
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'berita-table\'];

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
            }')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
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
                ->addClass('text-center')
                ->title("Aksi"),
            Column::make('name')->title("Penulis"),
            Column::make('b_title')->title("Judul"),
            Column::make('b_date')->title("Dibuat Pada"),
            Column::make('aktif')->title("Aktif")->searchable(false)->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Berita_' . date('YmdHis');
    }
}
