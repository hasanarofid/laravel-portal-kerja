@php
    use App\BidangPerusahaan;
    $modBidang = BidangPerusahaan::get();
@endphp
<div class="box box-primary">
    <div class="box-header with-border">
        <b>
            <p style="font-size: 20px">Search Lowongan</p>
        </b>
    </div>
    <div class="box-body">
        <div class="form-group">
            <label for="nama">Nama Perusahaan</label>
            <input name="nama_perusahaan" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label for="nama">Nama Lowongan</label>
            <input name="nama_lowongan" class="form-control" id="nama_lowongan" placeholder="Nama Lowongan"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label for="nama">Bidang</label>
            <select name="bidang_id" class="form-control select2" style="width: 100%;" required>
                <option value="" selected disabled>--Pilih--</option>
                @foreach ($modBidang as $item)
                    <option value="{{ $item->bidang_id }}">{{ $item->nama_bidang }}</option>
                @endforeach
            </select>
        </div>
        <div style="text-align: right">
            <button onclick="refreshTabel()" class="btn btn-sm btn-primary"
                style="margin-right: 5px;">
                <span><i class="fa fa-search"></i>
                    <span>Cari</span>
                </span>
            </button>
        </div>
    </div>
</div>
