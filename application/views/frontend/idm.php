<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">Indeks Desa Mandiri (IDM)</h1>
            <ul class="bradcurmed">
                <li><a href="<?=base_url('welcome')?>" rel="noopener noreferrer">Home</a></li>
                <li>Indeks Desa Mandiri (IDM)</li>
            </ul>
        </div>
        <!-- /.page-title-wrapper -->
    </div>
    <!-- /.container -->


    <svg class="circle" data-parallax="{&quot;x&quot; : -200}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px" style="transform:translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); ">
        <path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt" stroke-linejoin="miter" opacity="0.051" fill="none" d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"></path>
    </svg>

    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>


<section class="about">
    <div class="container">
        
            <table id="dataTable_idm" class="table table-striped table-row-bordered gy-5 gs-7">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>No</th>
                        <th>Tahun Pendataan</th>
                        <th>Nama Desa</th>
                        <th>Status IDM</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                    <?php $no="1"; foreach ($idm as $data):?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$data->date_year?></td>
                            <td>
                                Desa : <?=$data->Nama_Desa?> 
                                <br>
                                <b> Kecamatan : <?=$data->Nama_Kecamatan?> </b>
                            </td>
                            <td><b><?=$data->idm?></b></td>
                        </tr>
                    <?php $no++; endforeach;?>

                </tbody>
            </table>
    </div>
    <!-- /.container -->
</section>

<br><br>