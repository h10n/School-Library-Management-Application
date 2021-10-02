<div>
        <br>
        <table border="0" class="ttdTable">
          <tr>
            <td>
              <span>Mengetahui,</span>
              <span>Kepala Perpustakaan SMK N 7 Samarinda</span>
              <span style="margin-top: 10%"><u>{{ $kepala_perpustakaan }}</u></span>
              <span>{{ $nip_kepala_perpustakaan ? 'NIP.'.$nip_kepala_perpustakaan : '' }}</span>
            </td>
            <td class="tengah"></td>
            <td>
              <span>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</span>
              <span>Pustakawan</span>
              <span style="margin-top: 10%"><u>{{ $pustakawan }}</u></span>              
              <span>{{ $nip_pustakawan ? 'NIP.'.$nip_pustakawan : '' }}</span>
            </td>            
          </tr>    
        </table>
      </div>