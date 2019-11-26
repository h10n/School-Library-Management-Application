<div>
  <br>
  <table border="0" class="ttdTable">
    <tr>
      <td></td>
      <td class="tengah"></td>
      <td>
        <span>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</span>
        <span>Head Librarian</span>
        <span style="margin-top: 80px"><u>{{ $kepala_perpustakaan }}</u></span>
        <span>{{ $nip_kepala_perpustakaan ? 'NIP.'.$nip_kepala_perpustakaan : '' }}</span>
      </td>
    </tr>
  </table>
</div>