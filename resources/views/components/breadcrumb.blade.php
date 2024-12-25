<div>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $items[count($items) - 1] }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @foreach ($items as $index => $item)
                                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                                    @if ($loop->last) aria-current="page" @endif>
                                    @if ($loop->last)
                                        {{ $item }}
                                    @else
                                        <a class="text-muted text-decoration-none"
                                            href="javascript:void(0)">{{ $item }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('assets/images/breadcrumb/ChatBc.png') }}" alt="modernize-img"
                            class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
