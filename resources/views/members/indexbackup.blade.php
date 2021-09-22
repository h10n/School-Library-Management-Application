@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
          <li class="active">Member</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Member</h2>
          </div>

          <div class="panel-body">
            <div class="table-responsive">
              {!! $html->table(['class' => 'table-striped']) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  {!! $html->scripts() !!}
@endsection
