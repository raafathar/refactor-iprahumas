<?php

namespace App\DataTables;

use App\Models\LetterHistory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LetterLogDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['letter_number', 'sender', 'recipient', 'letter_type', 'letter_date', 'created_at', 'updated_at'])
            ->editColumn('letter_number', function (LetterHistory $letter_log) {
                return $letter_log->letter_number;
            })
            ->editColumn('recipient', function (LetterHistory $letter_log) {
                return $letter_log->recipient;
            })
            ->editColumn('recipient', function (LetterHistory $letter_log) {
                return $letter_log->recipient;
            })
            ->editColumn('letter_type', function (LetterHistory $letter_log) {
                return $letter_log->letter_type;
            })
            ->editColumn('letter_date', function (LetterHistory $letter_log) {
                return Carbon::parse($letter_log->letter_date)->timezone('Asia/Jakarta')->translatedFormat('d F Y');
            })
            ->editColumn('created_at', function (LetterHistory $letter_log) {
                return Carbon::parse($letter_log->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (LetterHistory $letter_log) {
                return Carbon::parse($letter_log->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LetterHistory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('letterlog-table')
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
                var table = window.LaravelDataTables[\'letterlog-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val();
                    table.search(searchTerm).draw();
                });

                $(\'#letterlog-table_filter\').remove();
            }')
            ->orderBy('0', 'desc')
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
            Column::make('letter_number')
                ->searchable(true)
                ->orderable(true)
                ->title('Nomor Surat'),
            Column::make('sender')
                ->searchable(true)
                ->orderable(true)
                ->width(200)
                ->title('Pengirim'),
            Column::make('recipient')
                ->searchable(true)
                ->orderable(true)
                ->width(200)
                ->title('Penerima'),
            Column::make('letter_type')
                ->searchable(true)
                ->orderable(true)
                ->width(150)
                ->title('Jenis Surat'),
            Column::make('letter_date')
                ->searchable(true)
                ->orderable(true)
                ->width(150)
                ->title('Tanggal Surat'),
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
        return 'LetterLog_' . date('YmdHis');
    }
}