<div class="container">
    <div class="mb-4 row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
             <a href="{{route('keranjang')}}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left mr-2"></i>Kembali</a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <h4>Informasi Pembayaran</h4>
            <hr>
                <p>Untuk pembayaran silahkan anda transfer ke nomor rekening dibawah ini sebesar : <strong>Rp.{{number_format($total_harga)}}</strong></p>
                <div class="media">
                    <img class="mr-3" src="{{url('assets/bri.png')}}" alt="Bank BRI" width="60">
                    <div class="media-body">
                        <h5 class="mt-0">Bank BRI</h5>
                        NO Rekening : 12645-89735-12741 atas nama <strong>Ahmad Septian</strong> 
                    </div>
                </div>
        </div>
        <div class="col-6">
            <h4>Informasi Pengiriman</h4>
            <hr>
          <form wire:submit.prevent="checkout">
            <div class="form-group">
                <label for="">No.HP</label>
                <input id="nohp" type="text" class="form-control @error('nohp') is-invalid @enderror" wire:model="nohp" value="{{ old('nohp') }}" autocomplete="nohp" autofocus>

            @error('nohp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success btn-block">Checkout<i class="fas fa-arrow-right ml-2"></i></button>
          </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div>
                @if (!empty($pesanan_details))
                {{ $pesanan_details->links() }}
                @endif
               
            </div>
        </div>
    </div>
    
</div>

<script>
    window.livewire.on('alert', param => {
        toastr[param['type']](param['message']);
    });
</script>
