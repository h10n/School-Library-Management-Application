@extends('layouts.app')
@section('content')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="ion-ios-home"></i> Home</a></li>
        <li class="active">Settings</li>
    </ol>
</section>
<section class="content container-fluid">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Settings</h3>
            <div class="table-button-custom">
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <caption><span class="ion-ios-gear"> General</caption>
                        <tbody>
                            <tr>
                                <td class="text-muted">Name</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Address</td>
                                <td>{{ $item->address }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Website</td>
                                <td>{{ $item->website }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Email</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Management Institution</td>
                                <td>{{ $item->pengelola }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">About</td>
                                <td>{{ $item->about }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Head Librarian</td>
                                <td>{{ $item->kepala_perpustakaan }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Head Librarian Id</td>
                                <td>{{ $item->nip_kepala_perpustakaan }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Logo</td>
                                <td>
                                    @if ($item->logo)
                                    <p>{!! Html::image(asset('storage/uploads/logo/'.$item->logo),null,['class' =>
                                        'img-rounded cover-buku']) !!}
                                    </p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <caption><span class="ion-arrow-swap"> Transaction</caption>
                        <tbody>
                            <tr>
                                <td class="text-muted">Fine Amount</td>
                                <td>Rp.{{ $item->denda }}/Day</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Max Borrowing Duration</td>
                                <td>{{ $item->durasi }} Days</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Max Borrowing Amount</td>
                                <td>{{ $item->max_peminjaman }} Books</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{{ url('admin/settings/general/edit') }}"><span class="ion-edit">
                            Edit</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection