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
    font-size: 10pt; 
    
}

.font2{
    font: arial, sans-serif; 
    font-size: 12pt; 
    font-style: normal;
}

.font3{
    font: arial, sans-serif; 
    font-size: 8pt; 
    font-style: normal;
}

.font4{
    font-family: Tahoma, sans-serif; 
    font-size: 9pt; 
    font-style: normal;
    line-height: 10px;
}

.font5{
    font-size: 9pt;
    line-height: 15px;
}

.font6 {
  font: arial, sans-serif; 
  font-size: 12pt; 
}

.font7 {
  font: arial, sans-serif; 
  font-size: 9pt; 
}


.line{
    line-height: 1px;
}

font{
    font:arial, sans-serif;
}
ol.a {list-style-type: lower-alpha;}
ol.n {list-style-type: lower-number;}


</style>
</head>
<body>

<table  width="100%" border="0">
    <tbody>
        <tr>
            <td style="text-align:right">
                <img src="{{public_path('img/logo.png')}}"  width="70" height="70">
            </td>
            <td class="align" valign="top" width="400">
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

<p class="align font"><u><b>SURAT IZIN BELAJAR / KULIAH</u><br>
    NOMOR : B-{{$izinbelajar->no_surat}}/O.3/Cp.2/10/2021</p>

<p class="font">Yang bertanda tangan di bawah ini :</p>

<table width="100%" border="0">
    <tbody class="font">
        <tr>
            <td width="3%"></td>
            <td width="30%">Nama</td>
            <td width="2%">:</td>
            <td class="bold">ARIE ARIFIN, SH., MH.</td>
        </tr>
        <tr>
            <td></td>
            <td>NIP / NRP</td>
            <td>:</td>
            <td>19601201 198503 1 004 / 48560123</td>
        </tr>
        <tr>
            <td width="6%"></td>
            <td>Pangkat / Gol</td>
            <td width="4%">:</td>
            <td>Jaksa Utama Madya (IV/d)</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>Kepala Kejaksaan Tinggi Kalimantan Selatan</td>
        </tr>
    </tbody>
</table>
<table border="0" class="font">
    <p class="font">Dengan ini menerangkan Pegawai Negeri Sipil tersebut dibawah ini :</p>
</table>
<table width="100%" border="0">
    <tbody class="align2 font">
        <tr>
            <td width="3%"></td>
            <td width="30%">Nama</td>
            <td width="2%">:</td>
            <td class="bold">{{ $izinbelajar->pegawaibk->nama_pegawai }}</td>
        </tr>
        <tr>
            <td></td>
            <td>NIP / NRP</td>
            <td>:</td>
            <td>{{ $izinbelajar->pegawaibk->nip }}</td>
        </tr>
        <tr>
            <td width="6%"></td>
            <td>Pangkat / Gol</td>
            <td width="4%">:</td>
            <td>{{ $izinbelajar->pegawaibk->pangkat }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>{{ $izinbelajar->pegawaibk->jabatan }}</td>
        </tr>
    </tbody>
</table>

{{-- <table border="0" width="100%">
    <tbody class="align2">
        <tr>
        <td width="6%"></td>
        <td>
            <p class="font3">Untuk mengikuti belajar / kuliah pada Universitas di Semarang cabang Banjarmasin di Sekolah Tinggi Banjarmasin Program
                Doktor (S3) Ilmu Hukum, dengan ketentuan sebagai berikut :
            </p>
        </td>
        </tr>
    </tbody>
</table> --}}

<table border="0" width="100%">
    <tbody class="align2">
        <tr>
            <td width="3.5%"> </td>
            <td>
                <p class="font">Untuk mengikuti belajar / kuliah pada {{$izinbelajar->nama_kampus}} di {{$izinbelajar->kota}} cabang {{$izinbelajar->cabang}} Program
                    {{$izinbelajar->fakultas}} ({{$izinbelajar->gelar}}), dengan ketentuan sebagai berikut :
                </p>
            </td>
            
        </tr>
        <tr>
        <td width="3.5%"> </td>
        <td>
            <ol class="font">
                <li>Bahwa Kuliah tidak pada jam kerja / kantor</li>
                <li>Diwajibkan untuk membuat jadwal mengikuti kuliah selama 1 (satu) semester dan diserahkan
                    pada atasan langsung;
                </li>
                <li>Jika sewaktu-waktu diperlukan, senantiasa siap mengutamakan kepentingan dinas dari pada kuliah;</li>
                <li>Berjanji untuk mematuhi segala petunjuk serta kebijakan dari Kepala Kejaksaan Tinggi Kalimantan Selatan.</li>
            </ol>
        </td>
        <p class="font">Demikian agar dapat diindahkan dan dipatuhi sebagaimana mestinya.</p>
        </tr>
    </tbody>
</table>

{{-- <table border="0" class="font3">
    <p>Demikian agar dapat diindahkan dan dipatuhi sebagaimana mestinya.</p>
</table> --}}

<table width="100%" border="0">
    <tbody class="font">
        <tr>
            <td width="40%"></td>
            <td>
                <p>Dikeluarkan di &nbsp;: Banjarmasin <br>
                Pada Tanggal &nbsp; : {{ Carbon\Carbon::parse()->translatedFormat('d F Y') }}</p>
            </td>
        </tr>    
        <tr  class="align">
            <td></td>
            <td>
                <p><b>KEPALA KEJAKSAAN TINGGI KALIMANTAN SELATAN</b></u></p>
                <br>
                <p><b><u>ARIE ARIFIN, SH., MH</b></u><br> Jaksa Utama Madya NIP. 19601201 198503 1 004</p>
            </td>
        </tr>    
    </tbody>
    <table width="100%">
        <tr>
            <td class="font5"><u>Tembusan :</u>
                <ol>
                    <li>Yth. Jaksa Agung Muda Pembinaan Kejaksaan Agung;</li>
                    <li>Yth. Jaksa Agung Muda Pengawasan Kejaksaan Agung;</li>
                    <li>Yth. Kepala Biro Kepegawaian Kejaksaan Agung;</li>
                    <li>Yth. Asisten Pengawasan Kejaksaan Tinggi Kalimantan Selatan;</li>
                    <li>A r s i p.-</li>
                </ol>
                {{-- <hr width="100%" noshade="1" line-height="10px"> --}}
            </td>
        </tr>
    </table>
</table>



{{-- <p class="align bold line font"><u>PERNYATAAN</u></p>

<p class="align2 font3">Yang bertanda di bawah ini / dalam surat izin ini menyatakan sanggup memenuhi
    segala ketentuan-ketentuan di atas dan apabila tidak memenuhi ketentuan tersebut,
    bersedia untuk dikenakan pelanggaran disiplin yang berlaku.
</p>

<table width="100%" border="0">
<tr  class="align font3">
    <td width="40%"></td>
    <td>
        <p>Banjarmasin, &nbsp; &nbsp; &nbsp; &nbsp; Oktober 2021 <br>
        Yang menyatakan</p>
        <br><br><br>
        <p><b><u>ARIE ARIFIN, SH., MH</b></u><br> Jaksa Utama Madya NIP. 19601201 198503 1 004</p>
    </td>
</tr>  
</table> --}}




            
            {{-- <p class="bold align font2"><u><b>SURAT IZIN CUTI TAHUNAN</u><br>
                <b>NOMOR : SI-&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; /O.3/Cp.3/11/2021</b></p>
            <br>
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
                        <p>Selama {{ $izincuti->selama }} (tujuh) hari kerja terhitung mulai tanggal {{ date('d M Y', strtotime( $izincuti->tglmulai ) )}} sampai dengan {{ date('d M Y', strtotime( $izincuti->tglakhir ) )}}
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
            </table> --}}

            

</body>
</html>
