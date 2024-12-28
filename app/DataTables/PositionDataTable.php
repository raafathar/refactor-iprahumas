<?php

namespace App\DataTables;

use App\Models\Position;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PositionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Position $position) {
                return view('dashboard.datamaster.position.action', compact('position'));
            })
            ->rawColumns(['name', 'sort_order', 'created_at', 'updated_at'])
            ->editColumn('name', function (Position $position) {
                return $position->name;
            })
            ->editColumn('sort_order', function (Position $position) {
                return $position->sort_order;
            })
            ->editColumn('created_at', function (Position $position) {
                return Carbon::parse($position->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (Position $position) {
                return Carbon::parse($position->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Position $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('position-table')
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
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'position-table\'];

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
            ->orderBy('2', 'asc')
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
                ->title('Aksi'),
            Column::make('name')
                ->title('Nama Jabatan'),
            Column::make('sort_order')
                ->title('Urutan'),
            Column::make('created_at')
                ->width(150)
                ->title('Dibuat Pada'),
            Column::make('updated_at')
                ->width(150)
                ->title('Diperbarui Pada'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Position_' . date('YmdHis');
    }
}