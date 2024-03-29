<div class="container">
    <div class="mb-4 row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section section-keranjang">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Gambar</td>
                                <td>Keterangan</td>
                                <td>Name Set</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td><strong>Total Harga</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1?>
                            @forelse ($pesanan_details as  $pesanan_detail)
                                <tr>
                                    <td>{{$no++ }}</td>
                                    <td> <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}" class="img-fluid" width="200"></td>
                                    <td>{{$pesanan_detail->product->nama}}</td>
                                    <td>
                                        @if ($pesanan_detail->nameset)
                                            Nama : {{$pesanan_detail->nama}} <br>
                                            Nomor: {{$pesanan_detail->nomor}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{$pesanan_detail->jumlah_pesanan}}</td>
                                    <td>Rp. {{number_format($pesanan_detail->product->harga)}}</td>
                                    <td><strong>Rp. {{number_format($pesanan_detail->total_harga)}}</strong></td>
                                    <td>
                                        <i wire:click="destroy({{$pesanan_detail->id}})"class="fas fa-trash text-danger"></i>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data Kosong</td>
                                </tr>
                            @endforelse
                            @if (!empty($pesanan))
                            <tr>
                                <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{number_format($pesanan->kode_unik)}}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6" align="right"><strong>Jumlah Yang Harus Dibayar :</strong></td>
                                <td align="right"><strong>Rp. {{number_format($pesanan->total_harga+$pesanan->kode_unik)}}</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td colspan="2">
                                    <a href="{{route('checkout')}}" class="btn btn-block btn-success">
                                        <i class="fas fa-arrow-right"></i> Checkout
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="row">
        <div class="col-12">
            <div>
                @if (!empty($pesanan_details))
                {{ $pesanan_details->links() }}
                @endif
               
            </div>
        </div>
    </div> --}}
    
</div>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });
</script>
