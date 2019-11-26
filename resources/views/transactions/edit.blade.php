
            {!! Form::model($transaction,[
              'url' => route('transactions.update', $transaction->transaction_code),
              'method' => 'PUT',
              'class' => 'form-horizontal'
              ])
            !!}
yakin nih ?? <--pesan sementara

  {!! Form::submit('Proses',['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
