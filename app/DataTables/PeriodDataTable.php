<?php

namespace App\DataTables;

use App\Models\Period;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PeriodDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Period $period) {
                return view('dashboard.datamaster.period.action', compact('period'));
            })
            ->rawColumns(['name', 'start_date', 'end_date', 'status', 'created_at', 'updated_at'])
            ->editColumn('name', function (Period $period) {
                return $period->name;
            })
            ->editColumn('start_date', function (Period $period) {
                return Carbon::parse($period->start_date)->timezone('Asia/Jakarta')->translatedFormat('d F Y');
            })
            ->editColumn('end_date', function (Period $period) {
                return Carbon::parse($period->end_date)->timezone('Asia/Jakarta')->translatedFormat('d F Y');
            })
            ->editColumn('status', function (Period $period) {
                if ($period->status == 'active') {
                    return '<span class="badge bg-primary">Aktif</span>';
                } else if ($period->status == 'inactive') {
                    return
                        '<span class="badge bg-danger">Tidak Aktif</span>';
                }
            })
            ->editColumn('created_at', function (Period $period) {
                return Carbon::parse($period->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (Period $period) {
                return Carbon::parse($period->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Period $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('period-table')
            ->setTableAttributes([
                'class' => 'table table-striped table-bordered',
                'cellspacing' => '0',
            ])
            ->stateSave(true)
            ->autoWidth(true)
            ->scrollX(true)
            ->responsive(true)
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->parameters([
                'searching' => true,
            ])
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'period-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val();
                    table.search(searchTerm).draw();
                });

                $(\'#period-table_filter\').remove();
            }')
            ->orderBy('6', 'desc')
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
                ->searchable(true)
                ->orderable(true)
                ->width(200)
                ->title('Nama Periode'),
            Column::computed('start_date')
                ->width(150)
                ->title('Tanggal Mulai'),
            Column::computed('end_date')
                ->width(150)
                ->title('Tanggal Berakhir'),
            Column::computed('status')
                ->width(110)
                ->title('Status'),
            Column::make('created_at')
                ->searchable(true)
                ->orderable(true)
                ->width(150)
                ->title('Dibuat Pada'),
            Column::make('updated_at')
                ->searchable(true)
                ->orderable(true)
                ->width(150)
                ->title('Diperbarui Pada'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Period_' . date('YmdHis');
    }
}