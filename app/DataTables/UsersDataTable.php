<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
                return view('dashboard.datamaster.user.action', compact('users'));
            })
            ->rawColumns(['name', 'nip', 'email', 'position_id', 'instance_id', 'golongan_id', 'work_unit', 'updated_by', 'created_at', 'updated_at'])
            ->editColumn('name', function (User $users) {
                $profilePicture = $users->profile_picture
                    ? asset('storage/' . $users->profile_picture)
                    : asset('assets/images/profile/user-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <img src="' . $profilePicture . '" class="rounded-circle object-fit-fill me-2" width="40" height="40" alt="Profile Picture" />
                        <div>
                            <div class="fw-bold">' . e($users->name) . '</div>
                            <div class="text-muted small">' . e($users->form->new_member_number) . '</div>
                        </div>
                    </div>
                ';
            })
            ->editColumn('nip', function (User $users) {
                return $users->form->nip;
            })
            ->editColumn('email', function (User $users) {
                return '<a href="mailto:' . e($users->email) . '">' . e($users->email) . '</a>';
            })
            ->editColumn('position_id', function (User $users) {
                return $users->form->position->name;
            })
            ->editColumn('instance_id', function (User $users) {
                return $users->form->instance->name;
            })
            ->editColumn('golongan_id', function (User $users) {
                return $users->form->golongan->name;
            })
            ->editColumn('work_unit', function (User $users) {
                return $users->form->work_unit;
            })
            ->editColumn('skills', function (User $users) {
                return $users->form->skills->pluck('name')->join(', ');
            })
            ->editColumn('updated_by', function (User $users) {
                return $users->form->updatedBy->name;
            })
            ->editColumn('province_id', function (User $users) {
                return $users->form->province->name;
            })
            ->editColumn('district_id', function (User $users) {
                return $users->form->district->name;
            })
            ->editColumn('subdistrict_id', function (User $users) {
                return $users->form->subdistrict->name;
            })
            ->editColumn('village_id', function (User $users) {
                return $users->form->village->name;
            })
            ->editColumn('created_at', function (User $users) {
                return Carbon::parse($users->form->created_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->editColumn('updated_at', function (User $users) {
                return Carbon::parse($users->form->updated_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y H:i:s T');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('role', 'user')
            ->whereHas('form', function ($query) {
                $query->where('status', 'approved');
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
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
            // ->dom('Bfrtip')
            ->parameters([
                'searching' => true,
            ])
            ->initComplete('function(settings, json) {
                var table = window.LaravelDataTables[\'users-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val();
                    table.search(searchTerm).draw();
                });

                $(\'#users-table_filter\').remove();
            }')
            ->orderBy(10, 'desc')
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
            Column::computed('nip')
                ->width(110)
                ->title('NIP'),
            Column::computed('email')
                ->width(110)
                ->title('Email'),
            Column::computed('position_id')
                ->width(110)
                ->title('Jabatan'),
            Column::computed('instance_id')
                ->width(200)
                ->title('Instansi'),
            Column::computed('golongan_id')
                ->width(110)
                ->title('Pangkat/Golongan'),
            Column::computed('work_unit')
                ->width(110)
                ->title('Unit Kerja'),
            Column::computed('updated_by')
                ->width(110)
                ->title('Diperbarui Oleh'),
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
        return 'Users_' . date('YmdHis');
    }
}
