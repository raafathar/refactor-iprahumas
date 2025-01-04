<?php

namespace App\DataTables;

use App\Models\Training;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TrainingDataTable extends DataTable
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
            ->rawColumns(["aksi", "number_registration", "p_start_date", "p_end_date", "created_at", "updated_at"])
            ->addColumn('aksi', "dashboard.datamaster.pelatihan.action")
            ->editColumn("number_registration", fn(Training $training) => $training->load("registration_training")->registration_training->count())
            ->editColumn("p_status", fn(Training $training) =>  `
            <a class="btn btn-primary" href="` . $training->p_status . `"/>
            `)
            ->editColumn("p_start_date", fn(Training $training) => \Carbon\Carbon::parse($training->p_start_date)->timezone('Asia/Jakarta')->isoFormat("D MMMM Y"))
            ->editColumn("p_end_date", fn(Training $training) => \Carbon\Carbon::parse($training->p_end_date)->timezone('Asia/Jakarta')->isoFormat("D MMMM Y"))
            ->editColumn("created_at", fn(Training $training) => \Carbon\Carbon::parse($training->created_at)->timezone('Asia/Jakarta')->format("d-m-Y H:i:s T"))
            ->editColumn("updated_at", fn(Training $training) => \Carbon\Carbon::parse($training->updated_at)->timezone('Asia/Jakarta')->format("d-m-Y H:i:s T"))
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Training $model): QueryBuilder
    {
        return $model->newQuery()->withCount("registration_training");
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('training-table')
            ->columns($this->getColumns())
            ->setTableAttributes([
                'class' => 'table table-striped table-bordered',
                'cellspacing' => '0',
            ])
            ->stateSave(true)
            // ->autoWidth(true)
            // ->scrollX(true)
            ->responsive(true)
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'training-table\'];

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
            Column::make('aksi'),
            Column::make('p_title')->title("Judul"),
            Column::make('number_registration'),
            Column::make('p_start_date')->title("Tanggal Pelaksanaan"),
            Column::make('p_end_date')->title("Tanggal Penutupan"),
            Column::make('p_status')->title("Status"),
            Column::make('created_at')->title("Dibuat pada"),
            Column::make('updated_at')->title("Modifikasi pada"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Training_' . date('YmdHis');
    }
}
