@php
$logoImg = !empty($setting->logo) ? $setting->logo : '';
@endphp
<table class="kop" width="100%" border="0">
    <tr>
        <td style="width: 102px">
            <img src="{{ asset('img/logo/'.$logoImg) }}">
        </td>
        <td>
            @foreach ($setting->pengelola_kop as $pengelola)
            <p class='kop1'><b>{{ $pengelola }}</b></p>
            @endforeach
            <p class='kop2'><b>{{ $setting->name }}</b></p>
            <p class='kop3'>{{ $setting->address }}</p>
            <p class='kop3'>Website : {{ $setting->website }}</span></p>
            <p class='kop3'>Email : {{ $setting->email }}</span></p>
        </td>
    </tr>
</table>