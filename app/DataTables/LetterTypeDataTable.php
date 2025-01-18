<?php

namespace App\DataTables;

use App\Models\LetterType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LetterTypeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (LetterType $lettertype) {
                return view('dashboard.datamaster.lettertype.action', compact('lettertype'));
            })
            ->rawColumns(['kode', 'name', 'created_at', 'updated_at'])
            ->editColumn('name', function (LetterType $lettertype) {
                return $lettertype->name;
            })
            ->editColumn('kode', function (LetterType $lettertype) {
                return $lettertype->kode;
            })
            ->editColumn('created_at', function (LetterType $lettertype) {
                return Carbon::parse($lettertype->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (LetterType $lettertype) {
                return Carbon::parse($lettertype->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LetterType $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('letter-type-table')
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
                'searching' => true,
            ])
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'letter-type-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val();
                    table.search(searchTerm).draw();
                });

                $(\'#letter-type-table_filter\').remove();
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
            Column::make('kode')
                ->searchable(true)
                ->orderable(true)
                ->title('Kode Jenis'),
            Column::make('name')
                ->searchable(true)
                ->orderable(true)
                ->title('Keterangan'),
            Column::make('created_at')
                ->width(150)
                ->searchable(true)
                ->orderable(true)
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
        return 'LetterType_' . date('YmdHis');
    }
}