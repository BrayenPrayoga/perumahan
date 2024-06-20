<?php

    if(!function_exists('tgl_indo')){
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

            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    }

    if(!function_exists('getUser')){
        function getUser($id)
        {
            $user = DB::table('users')->where('id', $id)->first();

            return $user;
        }
    }

    if(!function_exists('getDayInDate')){
        function getDayInDate($day)
        {
            switch($day){
                case 1: {
                    $day = 'Senin';
                    }break;
                case 2: {
                    $day = 'Selasa';
                    }break;
                case 3: {
                    $day = 'Rabu';
                    }break;
                case 4: {
                    $day = 'Kamis';
                    }break;
                case 5: {
                    $day = 'Jumat';
                    }break;
                case 6: {
                    $day = 'Sabtu';
                    }break;
                case 7: {
                    $day = 'Minggu';
                    }break;
            }

            return $day;
        }
    }

    if(!function_exists('getDataCovid')){
        function getDataCovid()
        {
            $kota = [];
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://data.covid19.go.id/public/api/prov.json",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYPEER => 0,
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $res = json_decode($response, true);
                $collection =  $res["list_data"];
                foreach($collection as $key => $val)
                {
                    // array_push($kota, $val['key']);
                    array_push($kota, [
                        'kota' =>  $val['key'],
                        'jumlah_kasus' => $val['jumlah_kasus'],
                        'jumlah_sembuh' => $val['jumlah_sembuh'],
                        'jumlah_meninggal' => $val['jumlah_meninggal'],
                        'jumlah_dirawat' => $val['jumlah_dirawat']
                    ]);

                    $data = [
                        'label'             => $val['key'],
                        'jumlah_kasus'      => $val['jumlah_kasus'],
                        'jumlah_sembuh'     => $val['jumlah_sembuh'],
                        'jumlah_meninggal'  => $val['jumlah_meninggal'],
                        'jumlah_dirawat'    => $val['jumlah_dirawat']
                    ];
                    $data_covid = DB::table('data_covid')->where('label', $val['key'])->first();
                    if(!empty($data_covid)){
                        DB::table('data_covid')->where('label', $val['key'])->update($data);
                    }else{
                        DB::table('data_covid')->insert($data);
                    }
                }

                return $kota;
            }

        }
    }
?>