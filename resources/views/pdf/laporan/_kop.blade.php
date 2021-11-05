@php
$logoImg = !empty($setting->logo) ? asset('storage/uploads/logo/'.$setting->logo) : asset('img/icons8-no-camera.svg');
@endphp
<table class="kop" width="100%" border="0">
    <tr>
        <td style="width: 102px">
            <img src="{{ $logoImg }}">
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