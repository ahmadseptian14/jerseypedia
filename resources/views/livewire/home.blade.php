<div class="container">
    {{-- Banner --}}
    <div class="banner">
        <img src="{{ url('assets/slider/slider1.png') }}" alt="">
    </div>

    {{-- Liga --}}
    <section class="mt-4 pilih-liga">
        <h3><strong>Pilih Liga</strong></h3>
        <div class="mt-4 row">
            @foreach ($ligas as $liga)
            <div class="col-6 col-lg-3">
                <a href="{{route('products.liga',$liga->id)}}}">
                    <div class="shadow card">
                        <div class="text-center card-body">
                            <img src="{{url('assets/liga')}}/{{$liga->gambar}}" class="img-fluid" alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    {{-- Best Product --}}
    <section class="mt-5 mb-5 products">
        <h3>
            <strong>Best Product</strong>
            <a href="{{ route('products') }}" class="float-right btn btn-dark"><i
             class="mr-2 fas fa-eye"></i>LihatSemuaJersey</a>
        </h3>
        <div class="mt-4 row">
            @foreach ($products as $product)
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="text-center card-body">
                        <img src="{{ url('assets/jersey') }}/{{ $product->gambar }}" class="img-fluid">
                        <div class="mt-2 row">
                            <div class="col-12">
                                <h5><strong>{{ $product->nama }}</strong></h5>
                                <h5>Rp.{{ number_format($product->harga) }}</h5>
                            </div>
                        </div>
                        <div class="col-12">
                        <a href="{{route('products.detail', $product->id)}}" class="btn btn-dark btn-block"><i class="mr-2 fas fa-eye"></i>Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    
</div>