
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function tgl_indo2($tanggal)
{
    $bulan = array(
        1 =>   'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function tgl_romawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function hari($hari)
{

    switch ($hari) {
        case 'Sun':
            $hari = "Minggu";
            break;

        case 'Mon':
            $hari = "Senin";
            break;

        case 'Tue':
            $hari = "Selasa";
            break;

        case 'Wed':
            $hari = "Rabu";
            break;

        case 'Thu':
            $hari = "Kamis";
            break;

        case 'Fri':
            $hari = "Jumat";
            break;

        case 'Sat':
            $hari = "Sabtu";
            break;

        default:
            $hari = "Tidak di ketahui";
            break;
    }

    return  $hari;
}
?>