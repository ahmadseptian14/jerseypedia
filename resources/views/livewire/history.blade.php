<div class="container">
    <div class="mb-4 row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </div>


    <section class="section section-history">
        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Tanggal Pesan</td>
                                <td>Kode Pemesanan</td>
                                <td>Pesanan</td>
                                <td>Status</td>
                                <td><strong>Total Harga</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1?>
                            @forelse ($pesanans as  $pesanan)
                                <tr>
                                    <td>{{$no++ }}</td>
                                    <td>{{$pesanan->created_at}}</td>
                                    <td>{{$pesanan->kode_pemesanan}}</td>
                                    <td align="left">
                                        <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                        @foreach ($pesanan_details as $pesanan_detail)
                                            <img src="{{url('assets/jersey')}}/{{$pesanan_detail->product->gambar}}" alt="" class="img-fluid" width="50">
                                            {{$pesanan_detail->product->nama}}
                                            <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($pesanan->status == 1)
                                            Belum Melakukan Pembayaran   
                                        @else
                                            Sudah Melakukan Pembayaran                                       
                                        @endif
                                    </td>
                                    <td><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                            @endforelse
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>Untuk pembayaran silahkan anda transfer ke nomor rekening dibawah ini :</p>
                        <div class="media">
                            <img class="mr-3" src="{{url('assets/bri.png')}}" alt="Bank BRI" width="60">
                            <div class="media-body">
                                <h5 class="mt-0">Bank BRI</h5>
                                NO Rekening : 12645-89735-12741 atas nama <strong>Ahmad Septian</strong> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
</div>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });
</script>
