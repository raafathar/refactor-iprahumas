<?php

namespace App\DataTables;

use App\Models\Registration;
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

class RegistrationDataTable extends DataTable
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
                $users->form->payment_proof_url = $users->form->payment_proof
                    ? asset('storage/' . $users->form->payment_proof)
                    : null;
                return view('dashboard.datamaster.registration.action', compact('users'));
            })
            ->rawColumns(['payment_proof', 'name', 'nip', 'email', 'position_id', 'instance_id', 'golongan_id', 'work_unit', 'status', 'reason', 'skills', 'updated_by', 'created_at', 'updated_at'])
            ->editColumn('payment_proof', function (User $users) {
                $paymentProof = $users->form->payment_proof
                    ? asset('storage/' . $users->form->payment_proof)
                    : null;

                if ($paymentProof) {
                    return '
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#paymentProofModal-' . $users->id . '">
                            Lihat
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="paymentProofModal-' . $users->id . '" tabindex="-1" aria-labelledby="paymentProofLabel-' . $users->id . '" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentProofLabel-' . $users->id . '">Bukti Pembayaran ' . $users->name . '</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center" style="height: 600px; overflow-x: hidden; overflow-y: auto;">
                                        <img src="' . $paymentProof . '" alt="Bukti Pembayaran" class="img-fluid" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                } else {
                    return '<span class="text-danger">Belum Melakukan Pembayaran</span>';
                }
            })
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
            ->editColumn('status', function (User $users) {
                if ($users->form->status == 'approved') {
                    return '<span class="badge bg-primary">Diterima </span>';
                } else if ($users->form->status == 'rejected') {
                    return
                        '<span class="badge bg-danger">Ditolak</span>';
                } else if ($users->form->status == 'pending') {
                    return '<span class="badge bg-warning">Diproses</span>';
                }
            })
            ->editColumn('reason', function (User $users) {
                return $users->form->reason;
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
        $status = request()->segment(2);

        return $model->newQuery()
            ->where('role', 'user')
            ->whereHas('form', function ($query) use ($status) {
                $query->where('status', $status);
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('registration-table')
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
                var table = window.LaravelDataTables[\'registration-table\'];

                $(\'#input-search\').on(\'keyup\', function() {
                    var searchTerm = $(this).val();
                    table.search(searchTerm).draw();
                });

                $(\'#registration-table_filter\').remove();
            }')
            ->orderBy('10', 'asc')
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
        $status = request()->segment(2);

        $columns = [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('Aksi'),
            Column::computed('payment_proof')
                ->title('Bukti Pembayaran'),
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
            Column::computed('status')
                ->width(110)
                ->title('Status'),
        ];

        if ($status === 'rejected') {
            $columns[] = Column::computed('reason')
                ->width(150)
                ->title('Alasan');
        }

        $columns = array_merge($columns, [
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
        ]);

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Registration_' . date('YmdHis');
    }
}
