<?php

namespace App\DataTables;

use App\Models\Banner;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class BannerDataTable extends DataTable
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
            ->addColumn('Aksi', fn(Banner $banner) => view('dashboard.tampilan.banner.action', compact("banner")))
            ->rawColumns(["b_image", "aktif"])
            ->editColumn("b_image", fn(Banner $banner) => "<img class='img-fluid img-thumbnail' src='" . Storage::url($banner->b_image) . "' alt='banner' />")
            ->editColumn("aktif", fn(Banner $banner) => $banner->b_is_active == 1 ? "Aktif" : "Non Aktif")
            ->editColumn("created_at", fn(Banner $banner) => \Carbon\Carbon::parse($banner->created_at)->setTimezone("Asia/Jakarta")->isoFormat("dddd, d MMMM Y , HH:mm") . " WIB")
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Banner $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('banner-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'users-table\'];

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
            Column::computed('Aksi')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('b_title')->title("Judul"),
            Column::make('b_image')->title("Gambar"),
            Column::make('aktif')->title("Status"),
            Column::make('created_at')->title("Dibuat Pada"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Banner_' . date('YmdHis');
    }
}
