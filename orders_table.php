<?php echo $this->session->flashdata('upload'); ?>

<div class="col-md-12 mb-4">
  <h4>Carian</h4>
  <div class="card shadow">
    <div class="card-body">

      <div class="form-group row justify-content-center">
        <label class="col-md-4 col-xl-2 col-form-label">Jenis Carian</label>
        <div class="col-md-5 col-xl-3">
          <select class="form-control" id="carian">
            <option value="" selected>---Pilih---</option>
            <option value="1">Tarikh</option>
            <option value="2">Bulanan</option>
            <option value="3">Cawangan Sahaja</option>
            <option value="4">Status Sahaja</option>
          </select>
        </div>
      </div>

      <!-- carian cawangan -->
      <div class="form-group row justify-content-center" id="byCawangan" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Cawangan</label>
        <div class="col-md-5 col-xl-3">
          <select class="form-control" id="cawangan">
            <option value="">---Pilih---</option>
            <?php if($cawangan) {
              foreach ($cawangan as $key) { ?>
                <option value="<?= $key['id'] ?>"><?= $key['location_name'] ?></option>
            <?php } } ?>
          </select>
        </div>
      </div>

      <!-- carian status -->
      <div class="form-group row justify-content-center" id="byStatus" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Status</label>
        <div class="col-md-5 col-xl-3">
          <select class="form-control" id="status">
            <option value="">---Pilih---</option>
            <option value="1">Selesai</option>
            <option value="0">Deposit</option>
          </select>
        </div>
      </div>

      <!-- carian tarikh -->
      <div id="byDateAfter" class="form-group row justify-content-center" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Tarikh ( Selepas )</label>
        <div class="col-md-5 col-xl-3">
          <input type="text" id="date_min" class="form-control drgpicker">
        </div>
      </div>

      <div id="byDateBefore" class="form-group row justify-content-center" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Tarikh ( Sebelum )</label>
        <div class="col-md-5 col-xl-3">
          <input type="text" id="date_max" class="form-control drgpicker">
        </div>
      </div>
      <!-- ./carian tarikh -->

      <!-- carian bulan -->
      <div id="byMonth" class="form-group row justify-content-center" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Bulan</label>
        <input type="hidden" id="date_num" value="<?= date('m') ?>">
        <div class="col-md-5 col-xl-3">
          <select class="form-control" id="date_month">
            <option value="00">---Pilih---</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Mac</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Jun</option>
            <option value="07">Julai</option>
            <option value="08">Ogos</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Disember</option>
          </select>
        </div>
      </div>

      <div id="byYear" class="form-group row justify-content-center" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label">Tahun</label>
        <div class="col-md-5 col-xl-3">
          <select class="form-control" id="date_year"></select>
        </div>
      </div>
      <!-- ./carian bulan -->

      <div class="form-group row justify-content-center mb-1" id="button" style="display:none">
        <label class="col-md-4 col-xl-2 col-form-label"></label>
        <div class="col-md-5 col-xl-3">
          <button type="submit" id="filter" class="btn btn-block btn-primary">Cari</button>
        </div>
      </div>

    </div>
  </div>
</div>

<hr>

<div id="showTable">
  <?php $this->load->view('orders/ajax_orders_table', $this->data); ?>
</div>

<script>
  
$("#carian").change(function () {

  var carian = $("#carian").val();  

  if (carian == 1)  {

    document.getElementById('button').style.display = null;
    document.getElementById('byCawangan').style.display = null;
    document.getElementById('byStatus').style.display = null;
    document.getElementById('byDateAfter').style.display = null;
    document.getElementById('byDateBefore').style.display = null;
    document.getElementById('button').style.display = null;      
    document.getElementById('byYear').style.display = "none";
    document.getElementById('byMonth').style.display = "none";
    document.getElementById('byStaf').style.display = null;

  }else if (carian == 2) {

    document.getElementById('button').style.display = null;
    document.getElementById('byCawangan').style.display = null;
    document.getElementById('byStatus').style.display = null;
    document.getElementById('byYear').style.display = null;
    document.getElementById('byMonth').style.display = null;
    document.getElementById('button').style.display = null;
    document.getElementById('byDateAfter').style.display = "none";
    document.getElementById('byDateBefore').style.display = "none";
    document.getElementById('byStaf').style.display = null;

  }else if (carian == 3) {

    document.getElementById('button').style.display = null;
    document.getElementById('byCawangan').style.display = null;
    document.getElementById('byStatus').style.display = "none";
    document.getElementById('byYear').style.display = "none";
    document.getElementById('byMonth').style.display = "none";
    document.getElementById('byDateAfter').style.display = "none";
    document.getElementById('byDateBefore').style.display = "none";
    document.getElementById('byStaf').style.display = "none";

  }else if (carian == 4) {

    document.getElementById('button').style.display = null;
    document.getElementById('byCawangan').style.display = "none";
    document.getElementById('byStatus').style.display = null;
    document.getElementById('byYear').style.display = "none";
    document.getElementById('byMonth').style.display = "none";
    document.getElementById('byDateAfter').style.display = "none";
    document.getElementById('byDateBefore').style.display = "none";
    document.getElementById('byStaf').style.display = "none";

  }
});

$(document).ready(function () {

  var month = $('#date_num').val();
  var currentYear = new Date().getFullYear();

  $('#date_month').val(month).trigger("change");

  for (var i = currentYear;i > currentYear - 7 ; i--)
  {
    $("#date_year").append('<option value="'+ i.toString() +'">' +i.toString() +'</option>');
  }
  
});

$(document).on('click', '#filter',function(){

  const carian = $('#carian').val();
  const cawangan = $('#cawangan').val();
  const status = $('#status').val();
  const date_min = $('#date_min').val();
  const date_max = $('#date_max').val();
  const date_month = $('#date_month').val();
  const date_year = $('#date_year').val();

  $.ajax({
    url:"<?= base_url() ?>orders/filter_list_orders",
    method:"post",
    type:"text",
    data:{
      carian : carian,
      cawangan : cawangan,
      status : status,
      date_min : date_min,
      date_max : date_max,
      date_month : date_month,
      date_year : date_year,
    },
    beforeSend: function() {
      $('#loader').show();
    },
    success:function(data){
      $('#loader').hide();
      $('#showTable').html(data);
    }
  });
});

</script>
         
