<div class="card card-stretch mb-5 mb-xxl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-dark fs-3"></span>
        </h3>
        
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-2 pb-0 mt-n3">
        <div class="tab-content mt-5" id="myTabTables1">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table id="dataTable_kecamatan" class="table table-striped table-row-bordered gy-5 gs-7">
                    <thead>
                                             <tr
                                                 class="border-bottom-1 border-bottom-gray-100 fw-bolder text-muted fs-6 text-uppercase">
                                                 <th class="pt-5 pb-10 text-center">NIK,KK</th>
                                                 <th class="pt-5 pb-10 text-center">No.Reg</th>
                                                 <th class="pt-5 pb-10 text-center">Nama</th>
                                                 <th class="pt-5 pb-10 text-center">Jenis Kelamin</th>
                                                 <th class="pt-5 pb-10 text-center">Tempat,Tgl Lahir</th>
                                                 <th class="pt-5 pb-10 text-center">Kedudukan Fungsi</th>
                                                 <th class="pt-5 pb-10 text-center">Aksi</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php foreach ($anggota as $value): ?>
                                             <tr>
                                                 <td class="text-end pt-10"><?='NIK : '.$value->nik.'<br> KK : '.$value->kk?></td>
                                                 <td class="text-end pt-10"><?=$value->no_reg_tp_pkk?></td>
                                                 <td class="text-end pt-10">
                                                     <b><?=$value->nama?></b><br><?=$value->status?>
                                                 </td>
                                                 <td class="text-end pt-10"><?=$value->jenis_kelamin?></td>
                                                 <td class="text-end pt-10">
                                                     <?=$value->tempat_lahir?>,<?=date_format(date_create($value->tanggal_lahir), "d-m-Y")?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                     <b><?=$value->kedudukan_fungsi?></b><br><?=$value->jabatan?>
                                                 </td>
                                                 <td class="text-end pt-10">
                                                    <a href ="<?=site_url('desa/anggota/edit/').$value->id?>" class="me-5 " >
                                                        <span class="svg-icon svg-icon-success svg-icon-2hx"  title="Edit Data">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <a href="#" onclick="deleteItem('<?= $value->id ?>')" class="me-5">
                                                        <span class="svg-icon svg-icon-danger svg-icon-2hx"  title="Hapus Data">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                    <path d="M10.5857864,13 L9.17157288,11.5857864 C8.78104858,11.1952621 8.78104858,10.5620972 9.17157288,10.1715729 C9.56209717,9.78104858 10.1952621,9.78104858 10.5857864,10.1715729 L12,11.5857864 L13.4142136,10.1715729 C13.8047379,9.78104858 14.4379028,9.78104858 14.8284271,10.1715729 C15.2189514,10.5620972 15.2189514,11.1952621 14.8284271,11.5857864 L13.4142136,13 L14.8284271,14.4142136 C15.2189514,14.8047379 15.2189514,15.4379028 14.8284271,15.8284271 C14.4379028,16.2189514 13.8047379,16.2189514 13.4142136,15.8284271 L12,14.4142136 L10.5857864,15.8284271 C10.1952621,16.2189514 9.56209717,16.2189514 9.17157288,15.8284271 C8.78104858,15.4379028 8.78104858,14.8047379 9.17157288,14.4142136 L10.5857864,13 Z" fill="#000000"/>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>

                                                    
                                                 </td>
                                             </tr>
                                             <?php endforeach;?>
                                         </tbody>
                    </table>
                </div>
                <!--end::Table-->
        </div>
    </div>
</div>

<?php $this->load->view('delete-modal'); ?>

<script>

</script>
