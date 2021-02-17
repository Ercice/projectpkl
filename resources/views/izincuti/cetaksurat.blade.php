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

ol.a {list-style-type: lower-alpha;}
ol.n {list-style-type: lower-number;}


</style>
</head>
<body>

             <table  width="100%">
                <tbody>
                    <tr>
                        <td valign="top" align="left">
                            <p class="bold font align">KEJAKSAAN TINGGI <br><u>KALIMANTAN SELATAN</u></p>
                            <td>
                                
                            </td>
                        </td>
                        <td valign="top" width="80" align="left">
                            <p class="font">LAMPIRAN II</p>
                        </td>
                        <td valign="top" width="230" align="left">
                            <p class="font"> SURAT EDARAN KEPALA BADAN <br>
                                ADMINISTRASI KEPEGAWAIAN NEGARA <br>
                                NOMOR &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 01 / SE /1977 <br>
                                <u>TANGGAL &nbsp; &nbsp; &nbsp; &nbsp; : 25 FEBRUARI 1977</u>
                                <br><br>
                                <p class="font2">Banjarmasin, &nbsp; &nbsp; &nbsp; {{ Carbon\Carbon::parse()->translatedFormat('F Y') }}</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p class="bold align font2"><u><b>SURAT IZIN CUTI TAHUNAN</u><br>
                <b>NOMOR : SI-{{$izincuti->no_surat}}/O.3/Cp.3/11/2021</b></p>
            <br>

            <table width="100%">
                <tbody>
                    <tr class="font">
                        <td>1.</td>
                        <td>Diberikan Cuti Tahunan untuk Tahun 2021 kepada Pegawai Negeri Sipil :</td>
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
                        <td class="bold">{{ $izincuti->pegawai->nama_pegawai }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>N I P / N R P</td>
                        <td>:</td>
                        <td>{{ $izincuti->pegawai->nip }}</td>
                    </tr>
                    <tr>
                        <td width="6%"></td>
                        <td>Pangkat / Gol. Ruang</td>
                        <td width="4%">:</td>
                        <td>{{ $izincuti->pegawai->nip }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>J a b a t a n</td>
                        <td>:</td>
                        <td>{{ $izincuti->pegawai->jabatan }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Satuan Organisasi</td>
                        <td>:</td>
                        <td>{{ $izincuti->pegawai->pangkat }}</td>
                    </tr>
                
                </tbody>
            </table>

            <table width="100%">
                <tr>
                    <td width="6%"></td>
                    <td  class="align2 font">
                        <p>Selama {{ $izincuti->selama }} hari kerja terhitung mulai tanggal {{ Carbon\Carbon::parse( $izincuti->tglmulai )->translatedFormat('d F Y')}} sampai dengan {{ Carbon\Carbon::parse( $izincuti->tglakhir )->translatedFormat('d F Y')}}
                            dengan ketentuan sebagai berikut :
                        </p>
                    </td>
 
                </tr>
            </table>
            <table width="100%">
                <tbody >
                   
                    <tr>
                        
                        <td width="3%"></td>
                        <td class="font align2">
                            <ol class="a">
                                <li>Sebelum menjalankan Cuti Tahunan wajib menyerahkan pekerjaannya kepada atasannya langsung;</li>
                                <li>Setelah selesai menjalankan Cuti Tahunan wajib melaporkan diri kepada atasan langsungnya dan bekerja kembali sebagaimana biasa.</li>
                            
                              </ol>
                        
                        </td>
                    </tr>
                </tbody>
            </table>
            <table  width="100%">
                <tbody>
                    <tr  class="align2 font">
                        <td width="6%" >2.</td>
                        <td>Demikianlah surat Izin Cuti Tahunan ini dibuat untuk dapat digunakan sebagaimana mestinya.</td>
                        
                    </tr>
                </tbody>
            </table>
            <table width="100%">
                <tbody>
                    <tr  class="align font">
                        <td width="25%"></td>
                        <td>
                            <p><b>KEPALA KEJAKSAAN TINGGI KALIMANTAN SELATAN</b></u></p>
                            <br><br><br><br>
                            <p><b><u>ARIE ARIFIN, SH., MH</b></u><br> Jaksa Utama Madya NIP. 19601201 198503 1 004</p>
                        </td>
                </tbody>
            </table>

            <table width="100%">
                <tr>
                    <br>
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
