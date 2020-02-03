<div>
        <br>
        <table border="0" id="ttdTable">
          <tr>
            <td>Mengetahui,</td>
            <td class="tengah"></td>
            <td>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</td>            
          </tr>
          <tr>
            <td>Kepala Perpustakaan SMK N 7 Samarinda</td>
            <td class="tengah"></td>
            <td>Pustakawan</td>             
          </tr>
          <tr>            
            <td><u>{{ $kepala_perpustakaan }}</u></td>
            <td class="tengah ttd"></td>            
            <td><u>{{ $pustakawan }}</u></td>
          </tr>
          <tr>
            {{-- <td>NIP. {!! $identitas->nip_kepala_puskesmas !!} </td> --}}
            <td>NIP. {{ $nip_kepala_perpustakaan }} </td>
            <td class="tengah"></td>
            <td>NIP.  {!! $nip_pustakawan !!} </td>              
          </tr>
        </table>
      </div>