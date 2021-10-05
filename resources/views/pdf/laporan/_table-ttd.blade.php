<div>
        <br>
        <table border="0" class="ttdTable">
          <tr>            
            <td></td>
            <td class="tengah"></td>
            <td>
              <span>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</span>
              <span>Kepala Perpustakaan</span>
              <span style="margin-top: 10%"><u>{{ $kepala_perpustakaan }}</u></span>
              <span>{{ $nip_kepala_perpustakaan ? 'NIP.'.$nip_kepala_perpustakaan : '' }}</span>
            </td>
            {{-- <td>
              <span>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</span>
              <span>Pustakawan</span>
              <span style="margin-top: 10%"><u>{{ auth()->user()->name }}</u></span>              
              <span>{{ auth()->user()->no_induk ? 'NIP.'.auth()->user()->no_induk : '' }}</span>
            </td>             --}}
          </tr>    
        </table>
      </div>