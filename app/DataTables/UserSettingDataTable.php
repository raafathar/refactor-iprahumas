<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\UserSetting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserSettingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (User $users) {
                return view('dashboard.setting.user.action', compact('users'));
            })
            ->rawColumns(['name', 'email', 'role', 'created_at', 'updated_at'])
            ->editColumn('name', function (User $users) {
                $profilePicture = $users->profile_picture
                    ? asset('storage/' . $users->profile_picture)
                    : asset('assets/images/profile/user-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <img src="' . $profilePicture . '" class="rounded-circle object-fit-fill me-2" width="40" height="40" alt="Profile Picture" />
                        <div>
                            <div class="fw-bold">' . e($users->name) . '</div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('email', function (User $users) {
                return '<a href="mailto:' . e($users->email) . '">' . e($users->email) . '</a>';
            })
            ->editColumn('role', function (User $users) {
                if ($users->role == 'superadmin') {
                    return '<span class="badge bg-primary">Super Admin</span>';
                } else if ($users->role == 'admin') {
                    return '<span class="badge bg-success">Admin</span>';
                } else if ($users->role == 'user') {
                    return '<span class="badge bg-info">User</span>';
                }
            })
            ->editColumn('created_at', function (User $users) {
                return Carbon::parse($users->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (User $users) {
                return Carbon::parse($users->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('usersetting-table')
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
                        var table = window.LaravelDataTables[\'usersetting-table\'];

                        $(\'#input-search\').on(\'keyup\', function() {
                            var searchTerm = $(this).val();
                            table.search(searchTerm).draw();
                        });

                        $(\'#usersetting-table_filter\').remove();
                    }')
                    ->orderBy(5, 'desc')
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
                ->title('Nama Lengkap'),
            Column::computed('email')
                ->width(110)
                ->title('Email'),
            Column::computed('role')
                ->width(110)
                ->title('Role'),
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
        return 'UserSetting_' . date('YmdHis');
    }
}
