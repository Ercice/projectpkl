<!DOCTYPE html>
<html>
<head>
<style>
/* table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
} */

/* p{
    /* line-height: 5px; */
    /* font: 11pt arial, sans-serif; */
    /* text-align: left; */
    /* font-weight: bold; */
/* } */

/* td{
    font: 11pt arial, sans-serif;
} */

/* h6{
    font: 11pt arial, sans-serif;
    text-align: left;
    font-weight: normal;
} */

.border{
    border: 1;
}

.bold{
    font-weight: bold;
}

.align{
    text-align: center;
}

.align2{
    text-align: justify;
}

.font{
    font: arial, sans-serif; 
    font-size: 11pt; 
    
}

.font2{
    font: arial, sans-serif; 
    font-size: 12pt; 
    font-style: normal;
}

.font3{
    font: arial, sans-serif; 
    font-size: 10pt; 
    font-style: normal;
}

.font4{
    font-family: Tahoma, sans-serif; 
    font-size: 9pt; 
    font-style: normal;
    line-height: 10px;
}

.font6 {
  font: arial, sans-serif; 
  font-size: 12pt; 
}

.font7 {
  font: arial, sans-serif; 
  font-size: 9pt; 
}

font{
    font: arial, sans-serif;
}

</style>
</head>
<body>

<table  width="100%" border="0">
    <tbody>
        <tr>
            <td style="text-align:right">
                <img src="{{public_path('img/logo.png')}}"  width="70" height="70">
            </td>
            <td class="align" valign="top" width="430">
                <font size="12pt">KEJAKSAAN REPUBLIK INDONESIA</font> <br> 
                <font size="15pt"><b>KEJAKSAAN TINGGI KALIMANTAN SELATAN</b></font> <br> 
                <font size="9pt">Jl. D.I. Panjaitan No. 26 Kel. Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin (70114) <br>
                  Telp. (0511) 6741001 Fax. (0511) 4366274</font> <br> 
                {{-- <p class="font7"> KEJAKSAAN REPUBLIK INDONESIA <br>
                    <b class="font6">KEJAKSAAN TINGGI KALIMANTAN SELATAN</b> <br>
                    
                    Jl. D.I. Panjaitan No. 26 Kel. Antasan Besar Kec. Banjarmasin Tengah Kota Banjarmasin (70114) <br>
                    Telp. (0511) 6741001 Fax. (0511) 4366274
                </p>  --}}
                
            </td>
            <td></td>
            
        </tr>
        <tr>
        
            <hr width="100%" noshade="1">
          
        </tr>
    </tbody>
</table>
<br>
<p class="font" style="text-align: right">Banjarmasin, &nbsp; &nbsp; &nbsp; {{ Carbon\Carbon::parse()->translatedFormat('F Y') }}</p>
<br>
<p class="bold align font2"><u><b>SURAT IZIN CUTI PENTING</u><br>
    <b>NOMOR : B-{{$izinpenting->no_surat}}/O.3/Cp.5/11/2021</b></p>
<br>

<table width="100%">
    <tbody>
        <tr class="font">
            <td>Yang bertanda tangan dibawah ini :</td>
            <br>
        </tr>
    </tbody>
</table>

<table width="100%">
    <tbody class="font">                  
        <tr>
            <td width="3%"></td>
            <td width="30%">N a m a</td>
            <td width="2%">:</td>
            <td class="bold">{{ $izinpenting->pegawaiptg->nama_pegawai }}</td>
        </tr>
        <tr>
            <td></td>
            <td>N I P / N R P</td>
            <td>:</td>
            <td>{{ $izinpenting->pegawaiptg->nip }}</td>
        </tr>
        <tr>
            <td width="6%"></td>
            <td>Pangkat / Gol. Ruang</td>
            <td width="4%">:</td>
            <td>{{ $izinpenting->pegawaiptg->nip }}</td>
        </tr>
        <tr>
            <td></td>
            <td>J a b a t a n</td>
            <td>:</td>
            <td>{{ $izinpenting->pegawaiptg->jabatan }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Satuan Organisasi</td>
            <td>:</td>
            <td>{{ $izinpenting->pegawaiptg->pangkat }}</td>
        </tr>
    
    </tbody>
</table>

<table width="100%">
    <tr>
        <td width="6%"></td>
        <td  class="align2 font">
            <p>Dengan ini mengajukan permohonan Cuti Penting dengan alasan "{{$izinpenting->jenis_cuti}}" selama {{$izinpenting->selama}} Hari
            terhitung mulai tanggal {{Carbon\Carbon::parse( $izinpenting->tglmulai )->translatedFormat('d F Y')}} sampai dengan {{ Carbon\Carbon::parse( $izinpenting->tglakhir )->translatedFormat('d F Y')}}
            dengan ketentuan sebagai berikut : </p>
        </td>

    </tr>
</table>
<table width="100%">
    <tbody>
        <tr>
            <td width="3%"></td>
            <td class="font align2">
                <ol class="a">
                    <li>Sebelum menjalankan Cuti Penting wajib menyerahkan pekerjaannya kepada atasannya langsung;</li>
                    <li>Setelah selesai menjalankan Cuti Penting wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa.</li>
                  </ol>
            </td>
        </tr>
    </tbody>
</table>
<table  width="100%">
    <tbody>
        <tr  class="align2 font">
            <td>Demikianlah surat Izin Cuti Penting ini dibuat untuk dapat digunakan sebagaimana mestinya.</td>
        </tr>
    </tbody>
    <br>
</table>
<table width="100%">
    <tbody>
        <tr  class="align font">
            <td width="25%"></td>
            <td>
                <p><b>KEPALA KEJAKSAAN TINGGI KALIMANTAN SELATAN</b></u></p>
                <br><br>
                <p><b><u>ARIE ARIFIN, SH., MH</b></u><br> Jaksa Utama Madya NIP. 19601201 198503 1 004</p>
            </td>
    </tbody>
    <br>
</table>

<table width="100%">
    <tr>
        
        <td class="font3"><u>TEMBUSAN :</u>
            <ol>
                <li>Yth. Wakil Kepala Kejaksaan Tinggi Kalimantan Selatan (sebagai laporan);</li>
                <li>Yth. Asisten Pembinaan Kejaksaan Tinggi Kalimantan Selatan;</li>
                <li>Yth. Asisten Pengawasan Kejaksaan Tinggi Kalimantan Selatan;</li>
                <li>Yth. Kepala Bagian Tata Usaha Kejaksaan Tinggi Kalimantan Selatan;</li>
                <li>A r s i p.-</li>
            </ol>
        </td>
    </tr>
</table>


</body>
</html>
